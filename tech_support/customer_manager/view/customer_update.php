
<?php include(__DIR__ . '/../../view/header.php'); ?>

<h2>View/Update Customer</h2>

<form action="index.php" method="post">
    <input type="hidden" name="action" value="update_customer">
    <input type="hidden" name="customer_id"
           value="<?= (int)$customer['customerID'] ?>">

    <?php
    foreach ($customer as $field => $value) :
        if ($field === 'customerID') continue;
    ?>
        <p>
            <label for="<?= htmlspecialchars($field) ?>">
                <?= htmlspecialchars($field) ?>:
            </label>
            <input type="text"
                   id="<?= htmlspecialchars($field) ?>"
                   name="<?= htmlspecialchars($field) ?>"
                   value="<?= htmlspecialchars((string)($value ?? '')) ?>">
        </p>
    <?php endforeach; ?>

    <button type="submit">Update Customer</button>
</form>

<p>
    <a href="index.php">Search Customers</a>
</p>

<?php include(__DIR__ . '/../../view/footer.php'); ?>
