Для того, чтобы проверить работоспособность кода, а именно то, как отправляются, изменяются и удаляются данные в базе данных phpmyadmin вам нужно:

1.В phpmyadmin создать БД dogs , а так же таблицу dogs.

sql-запрос:
CREATE TABLE dogs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    breed ENUM('shiba inu', 'pug', 'dachshund', 'plush labrador', 'rubber dachshund') NOT NULL,
    sound ENUM('bark', 'squeak') NOT NULL,
    can_hunt TINYINT(1) NOT NULL DEFAULT 0
);

2. В файле db.php в строке 4 заполнить ваши данные для подключения к БД.
$db = new PDO("mysql:your_host;dbname=dogs;charset=utf8", 'your_username', 'your_password');

ПРИЯТНОГО ИСПОЛЬЗОВАНИЯ!
