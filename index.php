<?php

    include 'db.php';
    $result = $db->query("SELECT * FROM dogs");

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Dogs</title>
    <script defer src="script.js"></script>
</head>
<body>
    <h1>Dogs List</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Breed</th>
            <th>Sound</th>
            <th>Can Hunt</th>
            <th>Actions</th>
        </tr>
        <?php while($dog = $result->fetch()): ?>
            <tr>
                <td><?php echo $dog['name']; ?></td>
                <td><?php echo $dog['breed']; ?></td>
                <td><?php echo $dog['sound']; ?></td>
                <td><?php echo $dog['can_hunt'] ? 'Yes' : 'No'; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $dog['id']; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $dog['id']; ?>" class="delete">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="add.php">Add Dog</a>
</body>
</html>
