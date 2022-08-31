<?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'cloudns_response.php';

/**
 * ClouDNS API
 *
 * @link https://aleksa.tf Aleksa Đorđić
 * @link https://code-cats.com Code Cats
 */
class CloudnsApi
{
    /**
     * @var array Acceptable record add/edit parameters
     */
    private $fields = ['record-type', 'host', 'record', 'ttl', 'priority', 'weight', 'port', 'redirect-type', 'mail', 'txt', 'algorithm', 'fptype', 'caa_flag', 'caa_type', 'caa_value', 'tlsa_usage', 'tlsa_selector', 'tlsa_matching_type', 'cert-type', 'cert-key-tag', 'cert-algorithm', 'key-tag', 'algorithm', 'digest-type', 'order', 'pref', 'flag', 'params', 'regexp', 'replace', 'cpu', 'os', 'lat-deg', 'lat-min', 'lat-sec', 'lat-dir', 'long-deg', 'long-min', 'long-sec', 'long-dir', 'altitude', 'size', 'h-precision', 'v-precision'];

    /**
     * @var string The API URL
     */
    private $apiUrl = 'https://api.cloudns.net';

    /**
     * @var string Placeholder description
     */
    private $api_id;

    /**
     * @var string Placeholder description
     */
    private $api_password;

    // The data sent with the last request served by this API
    private $lastRequest = [];

    /**
     * Initializes the request parameter
     *
     * @param string $api_id Placeholder description
     * @param string $api_password Placeholder description
     */
    public function __construct($api_id, $api_password)
    {
        $this->api_id = $api_id;
        $this->api_password = $api_password;
    }

    /**
     * Send an API request to Cloudns
     *
     * @param string $route The path to the API method
     * @param array $body The data to be sent
     * @param string $method Data transfer method (POST, GET, PUT, DELETE)
     * @return CloudnsResponse
     */
    public function apiRequest($route, array $body, $method)
    {
        $url = $this->apiUrl . '/' . $route;
        $curl = curl_init();

        $body['auth-id'] = $this->api_id;
        $body['auth-password'] = $this->api_password;
        switch (strtoupper($method)) {
            case 'DELETE':
                // Set data using get parameters
            case 'GET':
                $url .= empty($body) ? '' : '?' . http_build_query($body);
                break;
            case 'POST':
                curl_setopt($curl, CURLOPT_POST, 1);
                // Use the default behavior to set data fields
            default:
                curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($body));
                break;
        }

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, strtoupper($method));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HEADER, 1);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($curl, CURLOPT_SSLVERSION, 1);

        $headers = [];
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $this->lastRequest = ['content' => $body, 'headers' => $headers];
        $result = curl_exec($curl);
        if (curl_errno($curl)) {
            $error = [
                'error' => 'Curl Error',
                'message' => 'An internal error occurred, or the server did not respond to the request.',
                'status' => 500
            ];

            return new CloudnsResponse(['content' => json_encode($error), 'headers' => []]);
        }
        curl_close($curl);

        $data = explode("\n", $result);

        // Return request response
        return new CloudnsResponse([
            'content' => $data[count($data) - 1],
            'headers' => array_splice($data, 0, count($data) - 1)]
        );
    }

    /**
     * Register a DNS Zone inside of ClouDNS
     *
     * @param string $domain Domain to register with
     * @return CloudnsResponse
     */
    public function registerZone($domain)
    {
        return $this->apiRequest('dns/register.json', 
        [
            'domain-name' => $domain, 
            'zone-type' => 'master'
        ], 'GET');
    }

    /**
     * Deletes a DNS Zone inside of ClouDNS
     *
     * @param string $domain Domain of the zone to be deleted
     * @return CloudnsResponse
     */
    public function deleteZone($domain)
    {
        return $this->apiRequest('dns/delete.json', 
        [
            'domain-name' => $domain
        ], 'GET');
    }

    /**
     * List Records of a DNS Zone
     *
     * @param string $domain Domain of the zone to get records of
     * @return CloudnsResponse
     */
    public function listRecords($domain)
    {
        return $this->apiRequest('dns/records.json', 
        [
            'domain-name' => $domain
        ], 'GET');
    }

    /**
     * Add a new Record to a DNS Zone
     * 
     * @param string $domain Domain of the zone to add a record to
     * @param array $data Record data
     */
    public function addRecord($domain, $data)
    {
        $sent_data = ['domain-name' => $domain];

        foreach ($data as $key => $value) {
            if (in_array($key, $this->fields)) {
                $sent_data[$key] = $value;
            }
        }

        return $this->apiRequest('dns/add-record.json', $sent_data, 'GET');
    }

    /**
     * Modofied a new Record on a DNS Zone
     * 
     * @param string $domain Domain of the zone to add a record to
     * @param int $record_id Record Identifier received from List Records
     * @param array $data Record data
     */
    public function modifyRecord($domain, $record_id, $data)
    {
        $sent_data = ['domain-name' => $domain, 'record-id' => $record_id];

        foreach ($data as $key => $value) {
            if (in_array($key, $this->fields)) {
                $sent_data[$key] = $value;
            }
        }

        return $this->apiRequest('dns/mod-record.json', $sent_data, 'GET');
    }

    /**
     * Delete a Record from a DNS Zone
     * 
     * @param string $domain Domaon of the zone from which to delete a record
     * @param int $record_id Record Identifier received from List Records
     * @see CloudnsAPI::listRecords()
     */
    public function deleteRecord($domain, $record_id)
    {
        return $this->apiRequest('dns/delete-record.json', 
        [
            'domain-name' => $domain,
            'record-id' => $record_id 
        ], 'GET');
    }
}
