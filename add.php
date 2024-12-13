<?php

    include 'db.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $name = $_POST['name'];
        $breed = $_POST['breed'];
        $sound = ($breed === 'plush labrador' || $breed === 'rubber dachshund') ? 0 : ($_POST['sound']);
        $can_hunt = ($breed === 'pug' || $breed === 'plush labrador' || $breed === 'rubber dachshund') ? 0 : ($_POST['can_hunt'] ? 1 : 0); 

        $db->query("INSERT INTO dogs (name, breed, sound, can_hunt) VALUES ('$name', '$breed', '$sound', '$can_hunt')");
        header('Location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Dog</title>
</head>
<body>
    <h1>Add Dog</h1>
    <form action="./add.php" method="POST" accept-charset="UTF-8">
        <label>Name: <input type="text" name="name" required></label><br>
        <label>Breed:
            <select name="breed" required>
                <option value="shiba inu">Shiba Inu</option>
                <option value="pug">Pug</option>
                <option value="dachshund">Dachshund</option>
                <option value="plush labrador">Plush Labrador</option>
                <option value="rubber dachshund">Rubber Dachshund</option>
            </select>
        </label><br>
        <label>Sound:
            <select name="sound">
                <option value="bark">Bark</option>
                <option value="squeak">Squeak</option>
            </select>
        </label><br>
        <label>Can Hunt:
            <input type="checkbox" name="can_hunt" value="1"> Yes
        </label><br>
        <button type="submit">Add Dog</button>
    </form>
    <a href="index.php">Back to list</a>
</body>
</html>
