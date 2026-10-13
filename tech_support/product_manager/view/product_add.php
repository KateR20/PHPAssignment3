
<?php include(__DIR__ . '/../../view/header.php'); ?>

<h2>Add Product</h2>


<form action="index.php" method="post">
    <input type="hidden" name="action" value="add_product">

    <p>
        <label for="code">Code:</label>
        <input type="text" id="code" name="code" required>
    </p>

    <p>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </p>

    <p>
        <label for="version">Version:</label>
        <input type="number" id="version" name="version"
               step="0.1" required>
    </p>

    <p>
        <label for="releaseDate">Release Date:</label>
        <input type="date" id="releaseDate"
               name="releaseDate" required>
    </p>

    <button type="submit">Add Product</button>
</form>


<p><a href="index.php?action=list_products">View Product List</a></p>

<?php include(__DIR__ . '/../../view/footer.php'); ?>
