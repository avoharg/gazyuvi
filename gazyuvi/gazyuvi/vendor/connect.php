<!-- Подключение к базе  -->
<?php
$connect = mysqli_connect('localhost', 'root', '', 'gazyuvi_db');

if (!$connect) {
    die('Ошибка подключения к базе данных');
}
?>