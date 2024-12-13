<?php

    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $breed = $_POST['breed'];
        $sound = ($breed === 'plush labrador' || $breed === 'rubber dachshund') ? 0 : ($_POST['sound']);
        $can_hunt = ($breed === 'pug' || $breed === 'plush labrador' || $breed === 'rubber dachshund') ? 0 : ($_POST['can_hunt'] ? 1 : 0);

        $db->query("UPDATE dogs SET name='$name', breed='$breed', sound='$sound', can_hunt='$can_hunt' WHERE id='$id'");
        header('Location: index.php');
    }

    $dog_id = $_GET['id'];
    $dog = $db->query("SELECT * FROM dogs WHERE id='$dog_id'")->fetch();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Dog</title>
</head>
<body>
    <h1>Edit Dog</h1>
    <form action="./edit.php" method="POST" accept-charset="UTF-8">
        <input type="hidden" name="id" value="<?php echo $dog['id']; ?>">
        <label>Name: <input type="text" name="name" value="<?php echo $dog['name']; ?>" required></label><br>
        <label>Breed:
            <select name="breed" required>
                <option value="shiba inu" <?php if($dog['breed'] === 'shiba inu') echo 'selected'; ?>>Shiba Inu</option>
                <option value="pug" <?php if($dog['breed'] === 'pug') echo 'selected'; ?>>Pug</option>
                <option value="dachshund" <?php if($dog['breed'] === 'dachshund') echo 'selected'; ?>>Dachshund</option>
                <option value="plush labrador" <?php if($dog['breed'] === 'plush labrador') echo 'selected'; ?>>Plush Labrador</option>
                <option value="rubber dachshund" <?php if($dog['breed'] === 'rubber dachshund') echo 'selected'; ?>>Rubber Dachshund</option>
            </select>
        </label><br>
        <label>Sound:
            <select name="sound" required>
                <option value="bark" <?php if($dog['sound'] === 'bark') echo 'selected'; ?>>Bark</option>
                <option value="squeak" <?php if($dog['sound'] === 'squeak') echo 'selected'; ?>>Squeak</option>
            </select>
        </label><br>
        <label>Can Hunt:
            <input type="checkbox" name="can_hunt" value="1" <?php if($dog['can_hunt']) echo 'checked'; ?>> Yes
        </label><br>
        <button type="submit">Update Dog</button>
    </form>
    <a href="index.php">Back to list</a>
</body>
</html>
