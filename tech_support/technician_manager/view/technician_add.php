
<?php include(__DIR__ . '/../../view/header.php'); ?>

<h2>Add Technician</h2>

<form action="index.php" method="post">
    <input type="hidden" name="action" value="add_technician">

    <p>
        <label for="firstName">First Name:</label>
        <input type="text" id="firstName" name="firstName" required>
    </p>

    <p>
        <label for="lastName">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required>
    </p>

    <p>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </p>

    <p>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
    </p>

    <p>
        <label for="password">Password:</label>
        <input type="text" id="password" name="password" required>
    </p>

    <button type="submit">Add Technician</button>
</form>

<p>
    <a href="index.php?action=list_technicians">View Technician List</a>
</p>

<?php include(__DIR__ . '/../../view/footer.php'); ?>
