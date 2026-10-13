
<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require('../model/database.php');
require('../model/customer_db.php');

$action = filter_input(INPUT_POST, 'action');

if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');
}

if ($action === null) {
    $action = 'search_customers';
}

if ($action === 'search_customers') {
    $last_name = trim(filter_input(INPUT_POST, 'last_name') ?? '');

    $customers = [];

    if ($last_name !== '') {
        $customers = search_customers($last_name);
    }

    include('view/customer_search.php');
}

else if ($action === 'select_customer') {
    $customer_id = filter_input(
        INPUT_POST,
        'customer_id',
        FILTER_VALIDATE_INT
    );

    if ($customer_id) {
        $customer = get_customer($customer_id);

        if ($customer) {
            include('view/customer_update.php');
        } else {
            $error = 'Customer not found.';
            include('../errors/error.php');
        }
    } else {
        $error = 'Invalid customer selected.';
        include('../errors/error.php');
    }
}

else if ($action === 'update_customer') {
    $customer_id = filter_input(
        INPUT_POST, 'customer_id', FILTER_VALIDATE_INT
    );

    $fields = [
        'firstName', 'lastName', 'address', 'city',
        'state', 'postalCode', 'countryCode',
        'phone', 'email', 'password'
    ];

    $data = [];

    foreach ($fields as $field) {
        $data[$field] = trim($_POST[$field] ?? '');
    }

    if ($customer_id && !in_array('', $data, true)) {
        update_customer($customer_id, $data);

        header('Location: index.php?action=search_customers');
        exit();
    } else {
        $error = 'Please enter all required customer information.';
        include('../errors/error.php');
    }
}

?>
