
<?php include(__DIR__ . '/../../view/header.php'); ?>

<h2>Technician List</h2>

<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Password</th>
        <th>&nbsp;</th>
    </tr>

    <?php foreach ($technicians as $technician) : ?>
    <tr>
        <td><?= htmlspecialchars($technician['firstName']) ?></td>
        <td><?= htmlspecialchars($technician['lastName']) ?></td>
        <td><?= htmlspecialchars($technician['email']) ?></td>
        <td><?= htmlspecialchars($technician['phone']) ?></td>
        <td><?= htmlspecialchars($technician['password']) ?></td>

<td>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="delete_technician">
        <input type="hidden" name="tech_id"
               value="<?= htmlspecialchars($technician['techID']) ?>">
        <button type="submit">Delete</button>
    </form>
</td>

    </tr>
    <?php endforeach; ?>
</table>

<p>
    <a href="index.php?action=show_add_form">Add Technician</a>
</p>

<?php include(__DIR__ . '/../../view/footer.php'); ?>

