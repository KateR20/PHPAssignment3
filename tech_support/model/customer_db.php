
<?php
function search_customers($last_name) {
    global $db;

    $query = 'SELECT * FROM customers
              WHERE lastName LIKE :last_name
              ORDER BY lastName, firstName';

    $statement = $db->prepare($query);
    $statement->bindValue(':last_name', '%' . $last_name . '%');
    $statement->execute();

    $customers = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $customers;
}

function get_customer($customer_id) {
    global $db;

    $query = 'SELECT * FROM customers
              WHERE customerID = :customer_id';

    $statement = $db->prepare($query);
    $statement->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
    $statement->execute();

    $customer = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $customer;
}

function update_customer($customer_id, $data) {
    global $db;

    $fields = [
        'firstName', 'lastName', 'address', 'city',
        'state', 'postalCode', 'countryCode',
        'phone', 'email', 'password'
    ];

    $updates = [];

    foreach ($fields as $field) {
        $updates[] = "$field = :$field";
    }

    $query = 'UPDATE customers SET ' .
             implode(', ', $updates) .
             ' WHERE customerID = :customer_id';

    $statement = $db->prepare($query);

    foreach ($fields as $field) {
        $statement->bindValue(':' . $field, $data[$field]);
    }

    $statement->bindValue(':customer_id', $customer_id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}
