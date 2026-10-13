
<?php include(__DIR__ . '/../../view/header.php'); ?>

<h2>Customer Search</h2>

<form action="index.php" method="post">
    <input type="hidden" name="action" value="search_customers">

    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name"
           value="<?= htmlspecialchars($last_name ?? '') ?>">

    <button type="submit">Search</button>
</form>

<?php if (!empty($customers)) : ?>
    <h3>Results</h3>

    <table>
        <tr>
            <th>Name</th>
            <th>Email Address</th>
            <th>City</th>
            <th>&nbsp;</th>
        </tr>

        <?php foreach ($customers as $customer) : ?>
        <tr>
            <td>
                <?= htmlspecialchars($customer['firstName'] . ' ' . $customer['lastName']) ?>
            </td>
            <td><?= htmlspecialchars($customer['email']) ?></td>
            <td><?= htmlspecialchars($customer['city']) ?></td>
            <td>
                <form action="index.php" method="post">
                    <input type="hidden" name="action" value="select_customer">
                    <input type="hidden" name="customer_id"
                           value="<?= (int)$customer['customerID'] ?>">
                    <button type="submit">Select</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php include(__DIR__ . '/../../view/footer.php'); ?>
