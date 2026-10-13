
<?php
function get_technicians() {
    global $db;

    $query = 'SELECT * FROM technicians
              ORDER BY lastName, firstName';

    $statement = $db->prepare($query);
    $statement->execute();

    $technicians = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $technicians;
}

function delete_technician($tech_id) {
    global $db;

    $query = 'DELETE FROM technicians
              WHERE techID = :tech_id';

    $statement = $db->prepare($query);
    $statement->bindValue(':tech_id', $tech_id);
    $statement->execute();
    $statement->closeCursor();
}

function add_technician($firstName, $lastName, $email, $phone, $password) {
    global $db;

    $query = 'INSERT INTO technicians
              (firstName, lastName, email, phone, password)
              VALUES
              (:firstName, :lastName, :email, :phone, :password)';

    $statement = $db->prepare($query);
    $statement->bindValue(':firstName', $firstName);
    $statement->bindValue(':lastName', $lastName);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':phone', $phone);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $statement->closeCursor();
}
