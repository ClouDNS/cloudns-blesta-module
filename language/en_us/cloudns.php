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


// Tab Client Records
$lang['Cloudns.tabClientRecords.heading'] = 'Manage Records';
$lang['Cloudns.tabClientRecords.heading.add'] = 'Add a Record';
$lang['Cloudns.tabClientRecords.heading.existing'] = 'Edit Existing Records';
$lang['Cloudns.tabClientRecords.heading.record_type'] = 'Type';
$lang['Cloudns.tabClientRecords.heading.host'] = 'Host';
$lang['Cloudns.tabClientRecords.heading.record'] = 'Record';
$lang['Cloudns.tabClientRecords.heading.ttl'] = 'TTL';
$lang['Cloudns.tabClientRecords.heading.options'] = 'Options';

$lang['Cloudns.tabClientRecords.no_results'] = 'There are no records for this zone.';
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

$lang['Cloudns.tabStaffRecords.no_results'] = 'There are no records for this zone.';
$lang['Cloudns.tabStaffRecords.record_limit'] = 'You have reached the amount of records allowed on this package.';