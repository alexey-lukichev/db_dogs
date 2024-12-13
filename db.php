<?php

try {
    $db = new PDO("mysql:your_host;dbname=dogs;charset=utf8", 'your_username', 'your_password');
} catch (\PDOException $e) {
    echo $e->getMessage();
}
