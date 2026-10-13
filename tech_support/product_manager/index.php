<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);#
require('../model/database.php');
 require('../model/product_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action === NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action === NULL) {
        $action = 'list_products';
    }
}


if ($action == 'list_products') {
    $products = get_products();
    include('view/product_list.php');

} else if ($action == 'show_add_form') {
    include('view/product_add.php');

} else if ($action == 'add_product') {
    $code = trim(filter_input(INPUT_POST, 'code') ?? '');
    $name = trim(filter_input(INPUT_POST, 'name') ?? '');
    $version = filter_input(INPUT_POST, 'version');
    $releaseDate = filter_input(INPUT_POST, 'releaseDate');

    if ($code !== '' && $name !== '' &&
        is_numeric($version) && $releaseDate) {
        add_product($code, $name, $version, $releaseDate);
        header('Location: index.php?action=list_products');
        exit();
    
} else {
    $error = 'Required fields were not entered. Please enter a product code, name, version, and release date.';
    include('../errors/error.php');
}

    

} else if ($action == 'delete_product') {
    $product_code = filter_input(INPUT_POST, 'product_code');
    if ($product_code !== null && $product_code !== false) {
        delete_product($product_code);
    }
    header('Location: index.php?action=list_products');
    exit();
} else if ($action == 'under_construction') {
    include('../under_construction.php');
}



?>