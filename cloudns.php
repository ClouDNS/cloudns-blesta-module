<?php

use Blesta\Core\Util\Validate\Server;

/**
 * ClouDNS Module
 *
 * @link https://aleksa.tf Aleksa Đorđić
 * @link https://code-cats.com Code Cats
 */
class Cloudns extends Module
{
    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        // Load the language required by this module
        Language::loadLang('cloudns', null, dirname(__FILE__) . DS . 'language' . DS);

        // Load components required by this module
        Loader::loadComponents($this, ['Input']);

        // Load module config
        $this->loadConfig(dirname(__FILE__) . DS . 'config.json');

        Configure::load('cloudns', dirname(__FILE__) . DS . 'config' . DS);
    }

    /**
     * {@inheritdoc}
     */
    public function install()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function upgrade($current_version)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function uninstall($module_id, $last_instance)
    {
    }

    /**
     * {@inheritdoc}
     */
    public function manageModule($module, array &$vars)
    {
        // Load the view into this object, so helpers can be automatically added to the view
        $this->view = new View('manage', 'default');
        $this->view->base_uri = $this->base_uri;
        $this->view->setDefaultView('components' . DS . 'modules' . DS . 'cloudns' . DS);

        // Load the helpers required for this view
        Loader::loadHelpers($this, ['Form', 'Html', 'Widget']);

        $this->view->set('module', $module);

        return $this->view->fetch();
    }

    /**
     * {@inheritdoc}
     */
    public function manageAddRow(array &$vars)
    {
        // Load the view into this object, so helpers can be automatically added to the view
        $this->view = new View('add_row', 'default');
        $this->view->base_uri = $this->base_uri;
        $this->view->setDefaultView('components' . DS . 'modules' . DS . 'cloudns' . DS);

        // Load the helpers required for this view
        Loader::loadHelpers($this, ['Form', 'Html', 'Widget']);

        if (!empty($vars)) {
            // Set unset checkboxes
            $checkbox_fields = [];

            foreach ($checkbox_fields as $checkbox_field) {
                if (!isset($vars[$checkbox_field])) {
                    $vars[$checkbox_field] = 'false';
                }
            }
        }

        $this->view->set('vars', (object) $vars);

        return $this->view->fetch();
    }

    /**
     * {@inheritdoc}
     */
    public function manageEditRow($module_row, array &$vars)
    {
        // Load the view into this object, so helpers can be automatically added to the view
        $this->view = new View('edit_row', 'default');
        $this->view->base_uri = $this->base_uri;
        $this->view->setDefaultView('components' . DS . 'modules' . DS . 'cloudns' . DS);

        // Load the helpers required for this view
        Loader::loadHelpers($this, ['Form', 'Html', 'Widget']);

        if (empty($vars)) {
            $vars = $module_row->meta;
        } else {
            // Set unset checkboxes
            $checkbox_fields = [];

            foreach ($checkbox_fields as $checkbox_field) {
                if (!isset($vars[$checkbox_field])) {
                    $vars[$checkbox_field] = 'false';
                }
            }
        }

        $this->view->set('vars', (object) $vars);

        return $this->view->fetch();
    }

    /**
     * {@inheritdoc}
     */
    public function addModuleRow(array &$vars)
    {
        $meta_fields = ['api_id','api_password'];
        $encrypted_fields = [];

        // Set unset checkboxes
        $checkbox_fields = [];

        foreach ($checkbox_fields as $checkbox_field) {
            if (!isset($vars[$checkbox_field])) {
                $vars[$checkbox_field] = 'false';
            }
        }

        $this->Input->setRules($this->getRowRules($vars));

        // Validate module row
        if ($this->Input->validates($vars)) {
            // Build the meta data for this row
            $meta = [];
            foreach ($vars as $key => $value) {
                if (in_array($key, $meta_fields)) {
                    $meta[] = [
                        'key' => $key,
                        'value' => $value,
                        'encrypted' => in_array($key, $encrypted_fields) ? 1 : 0
                    ];
                }
            }

            return $meta;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function editModuleRow($module_row, array &$vars)
    {
        $meta_fields = ['api_id','api_password'];
        $encrypted_fields = [];

        // Set unset checkboxes
        $checkbox_fields = [];

        foreach ($checkbox_fields as $checkbox_field) {
            if (!isset($vars[$checkbox_field])) {
                $vars[$checkbox_field] = 'false';
            }
        }

        $this->Input->setRules($this->getRowRules($vars));

        // Validate module row
        if ($this->Input->validates($vars)) {
            // Build the meta data for this row
            $meta = [];
            foreach ($vars as $key => $value) {
                if (in_array($key, $meta_fields)) {
                    $meta[] = [
                        'key' => $key,
                        'value' => $value,
                        'encrypted' => in_array($key, $encrypted_fields) ? 1 : 0
                    ];
                }
            }

            return $meta;
        }
    }

    /**
     * {@inheritdoc}
     */
    private function getRowRules(&$vars)
    {
        $rules = [
            'api_id' => [
                'valid' => [
                    'rule' => ['matches', "/^[0-9]+$/"],
                    'message' => Language::_('Cloudns.!error.api_id.valid', true)
                ]
            ],
            'api_password' => [
                'valid' => [
                    'rule' => 'isEmpty',
                    'negate' => true,
                    'message' => Language::_('Cloudns.!error.api_password.valid', true)
                ]
            ]
        ];

        return $rules;
    }

    /**
     * {@inheritdoc}
     */
    public function getPackageFields($vars = null)
    {
        Loader::loadHelpers($this, ['Html']);

        $fields = new ModuleFields();

        // Set the Record Limit (0 for unlimited) field
        $record_limit = $fields->label(Language::_('Cloudns.package_fields.record_limit', true), 'cloudns_record_limit');
        $record_limit->attach(
            $fields->fieldText(
                'meta[record_limit]',
                (isset($vars->meta['record_limit']) ? $vars->meta['record_limit'] : null),
                ['id' => 'cloudns_record_limit']
            )
        );
        $fields->setField($record_limit);

        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    public function addService(
        $package,
        array $vars = null,
        $parent_package = null,
        $parent_service = null,
        $status = 'pending'
    ) {
        $row = $this->getModuleRow();

        if (!$row) {
            $this->Input->setErrors(
                ['module_row' => ['missing' => Language::_('Cloudns.!error.module_row.missing', true)]]
            );

            return;
        }

        $api = $this->getApi($row->meta->api_id, $row->meta->api_password);

        $this->validateService($package, $vars);

        if ($this->Input->errors()) {
            return;
        }

        // Only provision the service if 'use_module' is true
        if ($vars['use_module'] == 'true') {
            $response = $api->registerZone($vars['domain']);

            $errors = $response->errors();
            if ($errors) {
                $this->Input->setErrors(['error' => $errors]);
                return;
            }
        }

        // Return service fields
        return [
            [
                'key' => 'domain',
                'value' => $vars['domain'],
                'encrypted' => 0
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function editService($package, $service, array $vars = null, $parent_package = null, $parent_service = null)
    {
        /*$row = $this->getModuleRow();

        if (!$row) {
            $this->Input->setErrors(
                ['module_row' => ['missing' => Language::_('Cloudns.!error.module_row.missing', true)]]
            );

            return;
        }

        $api = $this->getApi($row->meta->host_name, $row->meta->user_name, $row->meta->password, $row->meta->use_ssl);*/

        $service_fields = $this->serviceFieldsToObject($service->fields);

        $this->validateService($package, $vars, true);

        if ($this->Input->errors()) {
            return;
        }

        // Only update the service if 'use_module' is true
        if ($vars['use_module'] == 'true') {
            // ClouDNS does not support changing domains on dns zones
        }

        // Return all the service fields
        $encrypted_fields = [];
        $return = [];
        $fields = ['domain'];
        foreach ($fields as $field) {
            if (isset($vars[$field]) || isset($service_fields[$field])) {
                $return[] = [
                    'key' => $field,
                    'value' => $vars[$field] ?? $service_fields[$field],
                    'encrypted' => (in_array($field, $encrypted_fields) ? 1 : 0)
                ];
            }
        }

        return $return;
    }

    /**
     * {@inheritdoc}
     */
    public function cancelService($package, $service, $parent_package = null, $parent_service = null)
    {
        if (($row = $this->getModuleRow())) {
            $api = $this->getApi(
                $row->meta->api_id,
                $row->meta->api_password
            );

            $service_fields = $this->serviceFieldsToObject($service->fields);
            $response = $api->deleteZone($service_fields->domain);

            $errors = $response->errors();
            if ($errors) {
                $this->Input->setErrors(['error' => $errors]);
                return;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function renewService($package, $service, $parent_package = null, $parent_service = null)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function validateService($package, array $vars = null)
    {
        $this->Input->setRules($this->getServiceRules($vars));
        return $this->Input->validates($vars);
    }

    /**
     * {@inheritdoc}
     */
    public function validateServiceEdit($service, array $vars = null)
    {
        $this->Input->setRules($this->getServiceRules($vars, true));
        return $this->Input->validates($vars);
    }

    /**
     * {@inheritdoc}
     */
    private function getServiceRules(array $vars = null, $edit = false)
    {
        // Validate the service fields
        $rules = [
            'domain' => [
                'valid' => [
                    'if_set' => $edit,
                    'rule' => [[$this, 'validateDomain']],
                    'message' => Language::_('Cloudns.!error.domain.valid', true)
                ]
            ]
        ];

        // Unset irrelevant rules when editing a service
        if ($edit) {
            $edit_fields = [];

            foreach ($rules as $field => $rule) {
                if (!in_array($field, $edit_fields)) {
                    unset($rules[$field]);
                }
            }
        }

        return $rules;
    }

    /**
     * Validates that the given domain is valid.
     *
     * @param string $domain The domain to validate
     * @return bool True if the domain is valid, false otherwise
     */
    public function validateDomain($domain)
    {
        $validator = new Server();
        return $validator->isDomain($domain);
    }

    /**
     * {@inheritdoc}
     */
    public function changeServicePackage(
        $package_from,
        $package_to,
        $service,
        $parent_package = null,
        $parent_service = null
    ) {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getAdminServiceInfo($service, $package)
    {
        // Load the view into this object, so helpers can be automatically added to the view
        $this->view = new View('admin_service_info', 'default');
        $this->view->base_uri = $this->base_uri;
        $this->view->setDefaultView('components' . DS . 'modules' . DS . 'cloudns' . DS);

        // Load the helpers required for this view
        Loader::loadHelpers($this, ['Form', 'Html']);

        $service_fields = $this->serviceFieldsToObject($service->fields);
        if (($row = $this->getModuleRow())) {
            $api = $this->getApi(
                $row->meta->api_id,
                $row->meta->api_password
            );

            $response = $api->listRecords($service_fields->domain);
            if (!$response->errors()) {
                $this->view->set('records', (array)$response->response());
            }
        }
        $this->view->set('package', $package);
        $this->view->set('service_fields', $service_fields);

        return $this->view->fetch();
    }

    /**
     * {@inheritdoc}
     */
    public function getClientServiceInfo($service, $package)
    {
        // Load the view into this object, so helpers can be automatically added to the view
        $this->view = new View('client_service_info', 'default');
        $this->view->base_uri = $this->base_uri;
        $this->view->setDefaultView('components' . DS . 'modules' . DS . 'cloudns' . DS);

        // Load the helpers required for this view
        Loader::loadHelpers($this, ['Form', 'Html']);

        $service_fields = $this->serviceFieldsToObject($service->fields);
        if (($row = $this->getModuleRow())) {
            $api = $this->getApi(
                $row->meta->api_id,
                $row->meta->api_password
            );

            $response = $api->listRecords($service_fields->domain);
            if (!$response->errors()) {
                $this->view->set('records', (array)$response->response());
            }
        }
        $this->view->set('package', $package);
        $this->view->set('service_fields', $service_fields);

        return $this->view->fetch();
    }

    /**
     * {@inheritdoc}
     */
    public function getClientTabs($package)
    {
        return [
            'tabClientRecords' => Language::_('Cloudns.tabClientRecords', true)
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getAdminTabs($package)
    {
        return [
            'tabStaffRecords' => Language::_('Cloudns.tabStaffRecords', true)
        ];
    }

    /**
     * Returns a view to manage records for a DNS Zone
     *
     * @param stdClass $package A stdClass object representing the current package
     * @param stdClass $service A stdClass object representing the current service
     * @param array $get Any GET parameters
     * @param array $post Any POST parameters
     * @param array $files Any FILES parameters
     * @return string The string representing the contents of this tab
     */
    public function tabClientRecords(
        $package,
        $service,
        array $get = null,
        array $post = null,
        array $files = null
    ) {
        return $this->tabRecords('tabClientRecords', $service, $post);
    }

    /**
     * Returns a view to manage records for a DNS Zone
     *
     * @param stdClass $package A stdClass object representing the current package
     * @param stdClass $service A stdClass object representing the current service
     * @param array $get Any GET parameters
     * @param array $post Any POST parameters
     * @param array $files Any FILES parameters
     * @return string The string representing the contents of this tab
     */
    public function tabStaffRecords(
        $package,
        $service,
        array $get = null,
        array $post = null,
        array $files = null
    ) {
        return $this->tabRecords('tabStaffRecords', $service, $post);
    }

    /**
     * Returns a template for tabClientRecords and tabStaffRecords since they share the same logic
     * 
     * @param string $type tabClientRecords or tabStaffRecords
     * @param stdClass $service A stdClass object representing the current service
     * @param array $post Any POST parameters
     * @return string The string representing the contents of this tab
     */
    public function tabRecords($type, $service, $post) 
    {
        $this->view = new View($type, 'default');
        $this->view->base_uri = $this->base_uri;
        // Load the helpers required for this view
        Loader::loadHelpers($this, ['Form', 'Html']);
        
        $service_fields = $this->serviceFieldsToObject($service->fields);
        if (($row = $this->getModuleRow())) {
            $api = $this->getApi(
                $row->meta->api_id,
                $row->meta->api_password
            );
        } else {
            $this->Input->setErrors(['error' => ['module_row' => Language::_('Cloudns.!error.module_row.missing', true)]]);
            $this->view->setDefaultView('components' . DS . 'modules' . DS . 'cloudns' . DS);
            return $this->view->fetch();
        }

        if (!empty($post)) {
            // Input validation seems to be handled by ClouDNS and we can just use that, 
            // aka fetch if there are any errors from the response

            if (isset($post['add'])) {
                if ($service->package->meta->record_limit != '0') {
                    // Check if we can add more records or reached the limit
                    $response = $api->listRecords($service_fields->domain);
                    $errors = $response->errors();
                    if ($errors) {
                        $this->Input->setErrors(['error' => $errors]);
                    } else {
                        if (count((array)$response->response()) >= intval($service->package->meta->record_limit)) {
                            $this->Input->setErrors(['error' => ['record_limit' => Language::_('Cloudns.' . $type . '.record_limit', true)]]);
                        }
                    }
                }

                if ($this->Input->errors() == false) {
                    $response = $api->addRecord($service_fields->domain, $post);
                }
            } else if (isset($post['save'])) {
                $response = $api->modifyRecord($service_fields->domain, $post['id'], $post);
            } else if (isset($post['delete'])) {
                $response = $api->deleteRecord($service_fields->domain, $post['id']);
            }

            if (isset($response) && $this->Input->errors() == false) {
                $errors = $response->errors();
                if ($errors) {
                    $this->Input->setErrors(['error' => $errors]);
                    $vars = $post;
                }
            }
        }

        $this->view->set('record_types', $this->getRecordTypes());
        $this->view->set('ttl_values', $this->getTTLValues());
        $this->view->set('redirect_types', $this->getRedirectTypes());
        $this->view->set('algorithms', $this->getAlgorithms());
        $this->view->set('fingerprint_types', $this->getFingerprintTypes());
        $this->view->set('caa_flags', $this->getCAAFlags());
        $this->view->set('caa_types', $this->getCAATypes());
        $this->view->set('tlsa_usages', $this->getTLSAUsages());
        $this->view->set('tlsa_selectors', $this->getTLSASelectors());
        $this->view->set('tlsa_matching_types', $this->getTLSAMatchingTypes());
        $this->view->set('cert_types', $this->getCertTypes());
        $this->view->set('cert_algorithms', $this->getCertAlgorithms());
        $this->view->set('digest_types', $this->getDigestTypes());
        $this->view->set('flags', $this->getFlags());
        $this->view->set('lat_directions', $this->getLatDirections());
        $this->view->set('long_directions', $this->getLongDirections());
        $this->view->set('service_fields', $service_fields);
        $this->view->set('service_id', $service->id);
        $this->view->set('client_id', $service->client_id);
        $this->view->set('vars', (isset($vars) ? $vars : []));
        $response = $api->listRecords($service_fields->domain);
        if (!$response->errors()) {
            $this->view->set('records', (array)$response->response());
        }

        $this->view->setDefaultView('components' . DS . 'modules' . DS . 'cloudns' . DS);
        return $this->view->fetch();
    }

    /**
     * {@inheritdoc}
     */
    public function getAdminAddFields($package, $vars = null)
    {
        Loader::loadHelpers($this, ['Html']);

        $fields = new ModuleFields();

        // Set the Domain field
        $domain = $fields->label(Language::_('Cloudns.service_fields.domain', true), 'cloudns_domain');
        $domain->attach(
            $fields->fieldText(
                'domain',
                (isset($vars->domain) ? $vars->domain : null),
                ['id' => 'cloudns_domain']
            )
        );
        $fields->setField($domain);

        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    public function getAdminEditFields($package, $vars = null)
    {
        Loader::loadHelpers($this, ['Html']);

        $fields = new ModuleFields();

        // Set the Domain field
        $domain = $fields->label(Language::_('Cloudns.service_fields.domain', true), 'cloudns_domain');
        $domain->attach(
            $fields->fieldText(
                'domain',
                (isset($vars->domain) ? $vars->domain : null),
                ['id' => 'cloudns_domain']
            )
        );
        $fields->setField($domain);

        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    public function getClientAddFields($package, $vars = null)
    {
        Loader::loadHelpers($this, ['Html']);

        $fields = new ModuleFields();

        // Set the Domain field
        $domain = $fields->label(Language::_('Cloudns.service_fields.domain', true), 'cloudns_domain');
        $domain->attach(
            $fields->fieldText(
                'domain',
                (isset($vars->domain) ? $vars->domain : null),
                ['id' => 'cloudns_domain']
            )
        );
        $fields->setField($domain);

        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    public function getClientEditFields($package, $vars = null)
    {
        Loader::loadHelpers($this, ['Html']);

        $fields = new ModuleFields();

        // Set the Domain field
        $domain = $fields->label(Language::_('Cloudns.service_fields.domain', true), 'cloudns_domain');
        $domain->attach(
            $fields->fieldText(
                'domain',
                (isset($vars->domain) ? $vars->domain : null),
                ['id' => 'cloudns_domain']
            )
        );
        $fields->setField($domain);

        return $fields;
    }

    /**
     * {@inheritdoc}
     */
    private function getApi($api_id, $api_password)
    {
        Loader::load(dirname(__FILE__) . DS . 'apis' . DS . 'cloudns_api.php');
        $api = new CloudnsApi($api_id,$api_password);
        return $api;
    }

    /**
     * Returns all of the supported ClouDNS record types
     * 
     * @return array Array of supported record types
     */
    private function getRecordTypes()
    {
        return [
            'A' => 'A',
            'AAAA' => 'AAAA',
            'MX' => 'MX',
            'CNAME' => 'CNAME',
            'TXT' => 'TXT',
            'SPF' => 'SPF',
            'NS' => 'NS',
            'SRV' => 'SRV',
            'WR' => 'WR',
            'RP' => 'RP',
            'SSHFP' => 'SSHFP',
            'ALIAS' => 'ALIAS',
            'CAA' => 'CAA',
            'TLSA' => 'TLSA',
            'CERT' => 'CERT',
            'DS' => 'DS',
            'PTR' => 'PTR',
            'NAPTR' => 'NAPTR',
            'HINFO' => 'HINFO',
            'LOC' => 'LOC',
            'DNAME' => 'DNAME',
            'SMIMEA' => 'SMIMEA',
            'OPENPGPKEY' => 'OPENPGPKEY'
        ];
    }

    /**
     * Returns all of the supported ClouDNS TTL values
     * 
     * @return array Array of supported values
     */
    private function getTTLValues()
    {
        return [
            '60' => Language::_('Cloudns.ttl.60', true),
            '300' => Language::_('Cloudns.ttl.300', true),
            '900' => Language::_('Cloudns.ttl.900', true),
            '1800' => Language::_('Cloudns.ttl.1800', true),
            '3600' => Language::_('Cloudns.ttl.3600', true),
            '21600' => Language::_('Cloudns.ttl.21600', true),
            '43200' => Language::_('Cloudns.ttl.43200', true),
            '86400' => Language::_('Cloudns.ttl.86400', true),
            '172800' => Language::_('Cloudns.ttl.172800', true),
            '259200' => Language::_('Cloudns.ttl.259200', true),
            '604800' => Language::_('Cloudns.ttl.604800', true),
            '1209600' => Language::_('Cloudns.ttl.1209600', true),
            '2592000' => Language::_('Cloudns.ttl.2592000', true),
        ];
    }

    private function getRedirectTypes()
    {
        return [
            '301' => Language::_('Cloudns.redirectType.301', true),
            '302' => Language::_('Cloudns.redirectType.302', true)
        ];
    }

    private function getAlgorithms()
    {
        return [
            '1' => Language::_('Cloudns.algotihm.1', true),
            '2' => Language::_('Cloudns.algotihm.2', true),
            '3' => Language::_('Cloudns.algotihm.3', true),
            '4' => Language::_('Cloudns.algotihm.4', true)
        ];
    }

    private function getFingerprintTypes()
    {
        return [
            '1' => Language::_('Cloudns.fingerprintType.1', true),
            '2' => Language::_('Cloudns.fingerprintType.2', true)
        ];
    }

    private function getCAAFlags()
    {
        return [
            '0' => Language::_('Cloudns.caaFlag.0', true),
            '128' => Language::_('Cloudns.caaFlag.128', true)
        ];
    }

    private function getCAATypes()
    {
        return [
            'issue' => Language::_('Cloudns.caaType.issue', true),
            'issuewild' => Language::_('Cloudns.caaType.issuewild', true),
            'iodef' => Language::_('Cloudns.caaType.iodef', true)
        ];
    }

    private function getTLSAUsages()
    {
        return [
            '0' => Language::_('Cloudns.tlsaUsage.0', true),
            '1' => Language::_('Cloudns.tlsaUsage.1', true),
            '2' => Language::_('Cloudns.tlsaUsage.2', true),
            '3' => Language::_('Cloudns.tlsaUsage.3', true)
        ];
    }

    private function getTLSASelectors()
    {
        return [
            '0' => Language::_('Cloudns.tlsaSelector.0', true),
            '1' => Language::_('Cloudns.tlsaSelector.1', true)
        ];
    }

    private function getTLSAMatchingTypes()
    {
        return [
            '0' => Language::_('Cloudns.tlsaMatchingType.0', true),
            '1' => Language::_('Cloudns.tlsaMatchingType.1', true),
            '2' => Language::_('Cloudns.tlsaMatchingType.2', true)
        ];
    }

    private function getCertTypes()
    {
        return [
            '1' => Language::_('Cloudns.certType.1', true),
            '2' => Language::_('Cloudns.certType.2', true),
            '3' => Language::_('Cloudns.certType.3', true),
            '4' => Language::_('Cloudns.certType.4', true),
            '5' => Language::_('Cloudns.certType.5', true),
            '6' => Language::_('Cloudns.certType.6', true),
            '7' => Language::_('Cloudns.certType.7', true),
            '8' => Language::_('Cloudns.certType.8', true),
            '253' => Language::_('Cloudns.certType.253', true),
            '254' => Language::_('Cloudns.certType.254', true)
        ];
    }

    private function getCertAlgorithms()
    {
        return [
            '2' => Language::_('Cloudns.certAlgorithm.2', true),
            '3' => Language::_('Cloudns.certAlgorithm.3', true),
            '4' => Language::_('Cloudns.certAlgorithm.4', true),
            '5' => Language::_('Cloudns.certAlgorithm.5', true),
            '6' => Language::_('Cloudns.certAlgorithm.6', true),
            '7' => Language::_('Cloudns.certAlgorithm.7', true),
            '8' => Language::_('Cloudns.certAlgorithm.8', true),
            '10' => Language::_('Cloudns.certAlgorithm.10', true),
            '13' => Language::_('Cloudns.certAlgorithm.13', true),
            '14' => Language::_('Cloudns.certAlgorithm.14', true),
            '15' => Language::_('Cloudns.certAlgorithm.15', true),
            '16' => Language::_('Cloudns.certAlgorithm.16', true),
            '252' => Language::_('Cloudns.certAlgorithm.252', true),
            '253' => Language::_('Cloudns.certAlgorithm.253', true),
            '254' => Language::_('Cloudns.certAlgorithm.254', true)
        ];
    }

    private function getDigestTypes()
    {
        return [
            '1' => Language::_('Cloudns.digestType.1', true),
            '2' => Language::_('Cloudns.digestType.2', true),
            '3' => Language::_('Cloudns.digestType.3', true),
            '4' => Language::_('Cloudns.digestType.4', true)
        ];
    }

    private function getFlags()
    {
        return [
            '' => Language::_('Cloudns.flag.empty', true),
            'U' => Language::_('Cloudns.flag.U', true),
            'S' => Language::_('Cloudns.flag.S', true),
            'A' => Language::_('Cloudns.flag.A', true),
            'P' => Language::_('Cloudns.flag.P', true)
        ];
    }

    private function getLatDirections()
    {
        return [
            'N' => Language::_('Cloudns.direction.N', true),
            'S' => Language::_('Cloudns.direction.S', true),
        ];
    }

    private function getLongDirections()
    {
        return [
            'W' => Language::_('Cloudns.direction.W', true),
            'E' => Language::_('Cloudns.direction.E', true),
        ];
    }
}
