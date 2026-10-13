
<?php
require('../model/database.php');
require('../model/technician_db.php');

$action = filter_input(INPUT_POST, 'action');

if ($action === null) {
    $action = filter_input(INPUT_GET, 'action');

    if ($action === null) {
        $action = 'list_technicians';
    }
}



if ($action == 'list_technicians') {
    $technicians = get_technicians();
    include('view/technician_list.php');

} else if ($action == 'show_add_form') {
    include('view/technician_add.php');

} else if ($action == 'add_technician') {
    $firstName = trim(filter_input(INPUT_POST, 'firstName') ?? '');
    $lastName = trim(filter_input(INPUT_POST, 'lastName') ?? '');
    $email = trim(filter_input(INPUT_POST, 'email') ?? '');
    $phone = trim(filter_input(INPUT_POST, 'phone') ?? '');
    $password = trim(filter_input(INPUT_POST, 'password') ?? '');

    if ($firstName !== '' && $lastName !== '' &&
        $email !== '' && $phone !== '' && $password !== '') {

        add_technician($firstName, $lastName, $email, $phone, $password);

        header('Location: index.php?action=list_technicians');
        exit();
    } else {
        $error = 'Please enter all required technician information.';
        include('../errors/error.php');
    }

} else if ($action == 'delete_technician') {
    $tech_id = filter_input(INPUT_POST, 'tech_id');

    if ($tech_id !== null && $tech_id !== false) {
        delete_technician($tech_id);
    }

    header('Location: index.php?action=list_technicians');
    exit();
}
?>
