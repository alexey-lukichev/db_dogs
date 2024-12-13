<?php

include 'db.php';
$dog_id = $_GET['id'];
$db->query("DELETE FROM dogs WHERE id='$dog_id'");
header('Location: index.php');
