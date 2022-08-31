<?php
/**
 * en_us language for the ClouDNS module.
 */
// Basics
$lang['Cloudns.name'] = 'ClouDNS';
$lang['Cloudns.description'] = 'Easily provision DNS Zones using ClouDNS, DNS Hosting service';
$lang['Cloudns.module_row'] = 'Account';
$lang['Cloudns.module_row_plural'] = 'Accounts';
$lang['Cloudns.module_group'] = 'Account Group';


// Module management
$lang['Cloudns.add_module_row'] = 'Add Account';
$lang['Cloudns.add_module_group'] = 'Add Account Group';
$lang['Cloudns.manage.module_rows_title'] = 'Accounts';

$lang['Cloudns.manage.module_rows_heading.api_id'] = 'API User ID';
$lang['Cloudns.manage.module_rows_heading.api_password'] = 'API User Password';
$lang['Cloudns.manage.module_rows_heading.options'] = 'Options';
$lang['Cloudns.manage.module_rows.edit'] = 'Edit';
$lang['Cloudns.manage.module_rows.delete'] = 'Delete';
$lang['Cloudns.manage.module_rows.confirm_delete'] = 'Are you sure you want to delete this Account';

$lang['Cloudns.manage.module_rows_no_results'] = 'There are no Accounts.';

$lang['Cloudns.manage.module_groups_title'] = 'Groups';
$lang['Cloudns.manage.module_groups_heading.name'] = 'Name';
$lang['Cloudns.manage.module_groups_heading.module_rows'] = 'Accounts';
$lang['Cloudns.manage.module_groups_heading.options'] = 'Options';

$lang['Cloudns.manage.module_groups.edit'] = 'Edit';
$lang['Cloudns.manage.module_groups.delete'] = 'Delete';
$lang['Cloudns.manage.module_groups.confirm_delete'] = 'Are you sure you want to delete this Account';

$lang['Cloudns.manage.module_groups.no_results'] = 'There is no Account Group';


// Add row
$lang['Cloudns.add_row.box_title'] = 'ClouDNS - Add Account';
$lang['Cloudns.add_row.add_btn'] = 'Add Account';


// Edit row
$lang['Cloudns.edit_row.box_title'] = 'ClouDNS - Edit Account';
$lang['Cloudns.edit_row.edit_btn'] = 'Update Account';


// Row meta
$lang['Cloudns.row_meta.api_id'] = 'API User ID';
$lang['Cloudns.row_meta.api_password'] = 'API User Password';


// Errors
$lang['Cloudns.!error.api_id.valid'] = 'Invalid API User ID';
$lang['Cloudns.!error.api_password.valid'] = 'Invalid API User Password';
$lang['Cloudns.!error.module_row.missing'] = 'An internal error occurred. The module row is unavailable.';

$lang['Cloudns.!error.domain.valid'] = 'Domain is not valid!';

// Manage Records
$lang['Cloudns.tabClientRecords'] = 'Manage Records';
$lang['Cloudns.tabClientRecords.header'] = 'Manage Records';
$lang['Cloudns.tabClientRecords.submit'] = 'Submit';

// Manage Records
$lang['Cloudns.tabStaffRecords'] = 'Manage Records';
$lang['Cloudns.tabStaffRecords.header'] = 'Manage Records';
$lang['Cloudns.tabStaffRecords.submit'] = 'Submit';

// Service info
$lang['Cloudns.service_info.domain'] = 'Domain';
$lang['Cloudns.service_info.records'] = 'Records';

$lang['Cloudns.service_info.records.unknown'] = 'Unknown';
$lang['Cloudns.service_info.format.records'] = '%1$s / %2$s';
$lang['Cloudns.service_info.format.records_unlimited'] = '%1$s';


// Service Fields
$lang['Cloudns.service_fields.domain'] = 'Domain';


// Package Fields
$lang['Cloudns.package_fields.record_limit'] = 'Record Limit (0 for unlimited)';


// TTL
$lang['Cloudns.ttl.60'] = '1 Minute';
$lang['Cloudns.ttl.300'] = '5 Minutes';
$lang['Cloudns.ttl.900'] = '15 Minutes';
$lang['Cloudns.ttl.1800'] = '30 Minutes';
$lang['Cloudns.ttl.3600'] = '1 Hour';
$lang['Cloudns.ttl.21600'] = '6 Hours';
$lang['Cloudns.ttl.43200'] = '12 Hours';
$lang['Cloudns.ttl.86400'] = '1 Day';
$lang['Cloudns.ttl.172800'] = '2 Days';
$lang['Cloudns.ttl.259200'] = '3 Days';
$lang['Cloudns.ttl.604800'] = '1 Week';
$lang['Cloudns.ttl.1209600'] = '2 Weeks';
$lang['Cloudns.ttl.2592000'] = '1 Month';


// Redirect Types
$lang['Cloudns.redirectType.301'] = '301 Moved Premanently';
$lang['Cloudns.redirectType.302'] = '302 Temporary Redirect';


// Algorithms
$lang['Cloudns.algotihm.1'] = 'RSA';
$lang['Cloudns.algotihm.2'] = 'DSA';
$lang['Cloudns.algotihm.3'] = 'ECDSA';
$lang['Cloudns.algotihm.4'] = 'Ed25519';


// Fingerprint Types
$lang['Cloudns.fingerprintType.1'] = 'SHA-1';
$lang['Cloudns.fingerprintType.2'] = 'SHA-256';


// CAA Flags
$lang['Cloudns.caaFlag.0'] = 'Non Critical';
$lang['Cloudns.caaFlag.128'] = 'Critical';


// CAA Types
$lang['Cloudns.caaType.issue'] = 'issue';
$lang['Cloudns.caaType.issuewild'] = 'issuewild';
$lang['Cloudns.caaType.iodef'] = 'iodef';


// TLSA Usages
$lang['Cloudns.tlsaUsage.0'] = 'PKIX-TA: Certificate Authority Constraint';
$lang['Cloudns.tlsaUsage.1'] = 'PKIX-EE: Service Certificate Constraint';
$lang['Cloudns.tlsaUsage.2'] = 'DANE-TA: Trust Anchor Assertion';
$lang['Cloudns.tlsaUsage.3'] = 'DANE-EE: Domain Issued Certificate';


// TLSA Selectors
$lang['Cloudns.tlsaSelector.0'] = 'Cert: Use full certificate';
$lang['Cloudns.tlsaSelector.1'] = 'SPKI: Use subject public key';


// TLSA Matching Types
$lang['Cloudns.tlsaMatchingType.0'] = 'Full: No Hash';
$lang['Cloudns.tlsaMatchingType.1'] = 'SHA-256: SHA-256 hash';
$lang['Cloudns.tlsaMatchingType.2'] = 'SHA-512: SHA-512 hash';


// Cert Types
$lang['Cloudns.certType.1'] = 'PKIX';
$lang['Cloudns.certType.2'] = 'SPKI';
$lang['Cloudns.certType.3'] = 'PGP';
$lang['Cloudns.certType.4'] = 'IPKIX';
$lang['Cloudns.certType.5'] = 'ISPKI';
$lang['Cloudns.certType.6'] = 'IPGP';
$lang['Cloudns.certType.7'] = 'ACPKIX';
$lang['Cloudns.certType.8'] = 'IACPKIX';
$lang['Cloudns.certType.253'] = 'URI';
$lang['Cloudns.certType.254'] = 'OID';


// Cert Algorithms
$lang['Cloudns.certAlgorithm.2'] = 'Diffie-Hellman';
$lang['Cloudns.certAlgorithm.3'] = 'DSA-SHA1';
$lang['Cloudns.certAlgorithm.4'] = 'Elliptic Curve (ECC)';
$lang['Cloudns.certAlgorithm.5'] = 'RSA-SHA1';
$lang['Cloudns.certAlgorithm.6'] = 'DSA-SHA1-NSEC3';
$lang['Cloudns.certAlgorithm.7'] = 'RSA-SHA1-NSEC3';
$lang['Cloudns.certAlgorithm.8'] = 'RSA-SHA256';
$lang['Cloudns.certAlgorithm.10'] = 'RSA-SHA512';
$lang['Cloudns.certAlgorithm.13'] = 'ECDSA Curve P-256 with SHA-256';
$lang['Cloudns.certAlgorithm.14'] = 'ECDSA Curve P-384 with SHA-384';
$lang['Cloudns.certAlgorithm.15'] = 'Ed25519';
$lang['Cloudns.certAlgorithm.16'] = 'Ed448';
$lang['Cloudns.certAlgorithm.252'] = 'Indirect';
$lang['Cloudns.certAlgorithm.253'] = 'Private [PRIVATEDNS]';
$lang['Cloudns.certAlgorithm.254'] = 'Private [PRIVATEOID]';


// Digest Types
$lang['Cloudns.digestType.1'] = 'SHA-1';
$lang['Cloudns.digestType.2'] = 'SHA-256';
$lang['Cloudns.digestType.3'] = 'GOST R 34.11-94';
$lang['Cloudns.digestType.4'] = 'SHA-384';


// Flags
$lang['Cloudns.flag.empty'] = 'Empty Flag';
$lang['Cloudns.flag.U'] = 'U';
$lang['Cloudns.flag.S'] = 'S';
$lang['Cloudns.flag.A'] = 'A';
$lang['Cloudns.flag.P'] = 'P';


// Directions
$lang['Cloudns.direction.N'] = 'North';
$lang['Cloudns.direction.E'] = 'East';
$lang['Cloudns.direction.S'] = 'South';
$lang['Cloudns.direction.W'] = 'West';


// Tab Client Records
$lang['Cloudns.tabClientRecords.heading'] = 'Manage Records';
$lang['Cloudns.tabClientRecords.heading.add'] = 'Add a Record';
$lang['Cloudns.tabClientRecords.heading.existing'] = 'Edit Existing Records';
$lang['Cloudns.tabClientRecords.heading.record_type'] = 'Type';
$lang['Cloudns.tabClientRecords.heading.host'] = 'Host';
$lang['Cloudns.tabClientRecords.heading.record'] = 'Record';
$lang['Cloudns.tabClientRecords.heading.ttl'] = 'TTL';
$lang['Cloudns.tabClientRecords.heading.options'] = 'Options';

$lang['Cloudns.tabClientRecords.heading.priority'] = 'Priority';
$lang['Cloudns.tabClientRecords.heading.weight'] = 'Weight';
$lang['Cloudns.tabClientRecords.heading.port'] = 'Port';
$lang['Cloudns.tabClientRecords.heading.redirect-type'] = 'Redirect Type';
$lang['Cloudns.tabClientRecords.heading.mail'] = 'Responsible Person (Email)';
$lang['Cloudns.tabClientRecords.heading.txt'] = 'TXT Record';
$lang['Cloudns.tabClientRecords.heading.algorithm'] = 'Algorithm';
$lang['Cloudns.tabClientRecords.heading.fptype'] = 'Fingerprint Type';
$lang['Cloudns.tabClientRecords.heading.caa_flag'] = 'Flag';
$lang['Cloudns.tabClientRecords.heading.caa_type'] = 'Type';
$lang['Cloudns.tabClientRecords.heading.caa_value'] = 'Value';
$lang['Cloudns.tabClientRecords.heading.tlsa_usage'] = 'Usage';
$lang['Cloudns.tabClientRecords.heading.tlsa_selector'] = 'Selector';
$lang['Cloudns.tabClientRecords.heading.tlsa_matching_type'] = 'Matching Type';
$lang['Cloudns.tabClientRecords.heading.cert-type'] = 'Type';
$lang['Cloudns.tabClientRecords.heading.cert-key-tag'] = 'Key Tag';
$lang['Cloudns.tabClientRecords.heading.cert-algorithm'] = 'Algorithm';
$lang['Cloudns.tabClientRecords.heading.key-tag'] = 'Key Tag';
$lang['Cloudns.tabClientRecords.heading.algorithm'] = 'Algorithm';
$lang['Cloudns.tabClientRecords.heading.digest-type'] = 'Digest Type';
$lang['Cloudns.tabClientRecords.heading.order'] = 'Order';
$lang['Cloudns.tabClientRecords.heading.pref'] = 'Preference';
$lang['Cloudns.tabClientRecords.heading.flag'] = 'Flag';
$lang['Cloudns.tabClientRecords.heading.params'] = 'Protocol+Resolution Service';
$lang['Cloudns.tabClientRecords.heading.regexp'] = 'Regular Expression';
$lang['Cloudns.tabClientRecords.heading.replace'] = 'Replacement';
$lang['Cloudns.tabClientRecords.heading.cpu'] = 'CPU';
$lang['Cloudns.tabClientRecords.heading.os'] = 'OS';
$lang['Cloudns.tabClientRecords.heading.lat-deg'] = 'Latitude Degrees';
$lang['Cloudns.tabClientRecords.heading.lat-min'] = 'Latitude Minutes';
$lang['Cloudns.tabClientRecords.heading.lat-sec'] = 'Latitude Seconds';
$lang['Cloudns.tabClientRecords.heading.lat-dir'] = 'Latitude Direction';
$lang['Cloudns.tabClientRecords.heading.long-deg'] = 'Longitude Degrees';
$lang['Cloudns.tabClientRecords.heading.long-min'] = 'Longitude Minutes';
$lang['Cloudns.tabClientRecords.heading.long-sec'] = 'Longitude Seconds';
$lang['Cloudns.tabClientRecords.heading.long-dir'] = 'Longitude Direction';
$lang['Cloudns.tabClientRecords.heading.altitude'] = 'Precision Altitude';
$lang['Cloudns.tabClientRecords.heading.size'] = 'Precision Size';
$lang['Cloudns.tabClientRecords.heading.h-precision'] = 'Precision Horizontal';
$lang['Cloudns.tabClientRecords.heading.v-precision'] = 'Precision Vertical';

$lang['Cloudns.tabClientRecords.no_results'] = 'There are no records for this zone.';
$lang['Cloudns.tabClientRecords.no_options'] = 'This record type does not have additional options.';
$lang['Cloudns.tabClientRecords.record_limit'] = 'You have reached the amount of records allowed on this package.';


// Tab Staff Records
$lang['Cloudns.tabStaffRecords.heading'] = 'Manage Records';
$lang['Cloudns.tabStaffRecords.heading.add'] = 'Add a Record';
$lang['Cloudns.tabStaffRecords.heading.existing'] = 'Edit Existing Records';
$lang['Cloudns.tabStaffRecords.heading.record_type'] = 'Type';
$lang['Cloudns.tabStaffRecords.heading.host'] = 'Host';
$lang['Cloudns.tabStaffRecords.heading.record'] = 'Record';
$lang['Cloudns.tabStaffRecords.heading.ttl'] = 'TTL';
$lang['Cloudns.tabStaffRecords.heading.options'] = 'Options';

$lang['Cloudns.tabStaffRecords.heading.priority'] = 'Priority';
$lang['Cloudns.tabStaffRecords.heading.weight'] = 'Weight';
$lang['Cloudns.tabStaffRecords.heading.port'] = 'Port';
$lang['Cloudns.tabStaffRecords.heading.redirect-type'] = 'Redirect Type';
$lang['Cloudns.tabStaffRecords.heading.mail'] = 'Responsible Person (Email)';
$lang['Cloudns.tabStaffRecords.heading.txt'] = 'TXT Record';
$lang['Cloudns.tabStaffRecords.heading.algorithm'] = 'Algorithm';
$lang['Cloudns.tabStaffRecords.heading.fptype'] = 'Fingerprint Type';
$lang['Cloudns.tabStaffRecords.heading.caa_flag'] = 'Flag';
$lang['Cloudns.tabStaffRecords.heading.caa_type'] = 'Type';
$lang['Cloudns.tabStaffRecords.heading.caa_value'] = 'Value';
$lang['Cloudns.tabStaffRecords.heading.tlsa_usage'] = 'Usage';
$lang['Cloudns.tabStaffRecords.heading.tlsa_selector'] = 'Selector';
$lang['Cloudns.tabStaffRecords.heading.tlsa_matching_type'] = 'Matching Type';
$lang['Cloudns.tabStaffRecords.heading.cert-type'] = 'Type';
$lang['Cloudns.tabStaffRecords.heading.cert-key-tag'] = 'Key Tag';
$lang['Cloudns.tabStaffRecords.heading.cert-algorithm'] = 'Algorithm';
$lang['Cloudns.tabStaffRecords.heading.key-tag'] = 'Key Tag';
$lang['Cloudns.tabStaffRecords.heading.algorithm'] = 'Algorithm';
$lang['Cloudns.tabStaffRecords.heading.digest-type'] = 'Digest Type';
$lang['Cloudns.tabStaffRecords.heading.order'] = 'Order';
$lang['Cloudns.tabStaffRecords.heading.pref'] = 'Preference';
$lang['Cloudns.tabStaffRecords.heading.flag'] = 'Flag';
$lang['Cloudns.tabStaffRecords.heading.params'] = 'Protocol+Resolution Service';
$lang['Cloudns.tabStaffRecords.heading.regexp'] = 'Regular Expression';
$lang['Cloudns.tabStaffRecords.heading.replace'] = 'Replacement';
$lang['Cloudns.tabStaffRecords.heading.cpu'] = 'CPU';
$lang['Cloudns.tabStaffRecords.heading.os'] = 'OS';
$lang['Cloudns.tabStaffRecords.heading.lat-deg'] = 'Latitude Degrees';
$lang['Cloudns.tabStaffRecords.heading.lat-min'] = 'Latitude Minutes';
$lang['Cloudns.tabStaffRecords.heading.lat-sec'] = 'Latitude Seconds';
$lang['Cloudns.tabStaffRecords.heading.lat-dir'] = 'Latitude Direction';
$lang['Cloudns.tabStaffRecords.heading.long-deg'] = 'Longitude Degrees';
$lang['Cloudns.tabStaffRecords.heading.long-min'] = 'Longitude Minutes';
$lang['Cloudns.tabStaffRecords.heading.long-sec'] = 'Longitude Seconds';
$lang['Cloudns.tabStaffRecords.heading.long-dir'] = 'Longitude Direction';
$lang['Cloudns.tabStaffRecords.heading.altitude'] = 'Precision Altitude';
$lang['Cloudns.tabStaffRecords.heading.size'] = 'Precision Size';
$lang['Cloudns.tabStaffRecords.heading.h-precision'] = 'Precision Horizontal';
$lang['Cloudns.tabStaffRecords.heading.v-precision'] = 'Precision Vertical';

$lang['Cloudns.tabStaffRecords.no_results'] = 'There are no records for this zone.';
$lang['Cloudns.tabStaffRecords.no_options'] = 'This record type does not have additional options.';
$lang['Cloudns.tabStaffRecords.record_limit'] = 'You have reached the amount of records allowed on this package.';