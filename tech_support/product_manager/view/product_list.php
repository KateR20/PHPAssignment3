
<?php include(__DIR__ . '/../../view/header.php'); ?>

<h2>Product List</h2>

<table>
    <tr>
        <th>Code</th>
        <th>Name</th>
        <th>Version</th>
        <th>Release Date</th>
        <th>&nbsp;</th>
    </tr>

    <?php foreach ($products as $product) : ?>
    <tr>
        <td><?= htmlspecialchars($product['productCode']) ?></td>
        <td><?= htmlspecialchars($product['name']) ?></td>
        <td><?= htmlspecialchars($product['version']) ?></td>
 <td><?= date('m-d-Y', strtotime($product['releaseDate'])) ?></td>

<td>
    <form action="." method="post">
        <input type="hidden" name="action" value="delete_product">
        <input type="hidden" name="product_code"
               value="<?= htmlspecialchars($product['productCode']) ?>">
        <button type="submit">Delete</button>
    </form>
</td>

 
    </tr>
    <?php endforeach; ?>
</table>

<p><a href="index.php?action=show_add_form">Add Product</a></p>

<?php include(__DIR__ . '/../../view/footer.php'); ?>