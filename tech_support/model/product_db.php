
<?php
function get_products() {
    global $db;

    $query = 'SELECT * FROM products ORDER BY name';
    $statement = $db->prepare($query);
    $statement->execute();

    $products = $statement->fetchAll(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    return $products;
}

function delete_product($product_code) {
    global $db;

    $query = 'DELETE FROM products
              WHERE productCode = :product_code';

    $statement = $db->prepare($query);
    $statement->bindValue(':product_code', $product_code);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($code, $name, $version, $releaseDate) {
    global $db;

    $query = 'INSERT INTO products
              (productCode, name, version, releaseDate)
              VALUES
              (:code, :name, :version, :releaseDate)';

    $statement = $db->prepare($query);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':version', $version);
    $statement->bindValue(':releaseDate', $releaseDate);
    $statement->execute();
    $statement->closeCursor();
}
