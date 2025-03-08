<!-- Обновление услуг  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновление услуг</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg">    

</head>
<?php 
session_start();
require "blocks/adminheader.php";

  if (!isset($_SESSION['admin'])) {
    header('Location: admin.php');
  };
?>

<body>
<div class="update">
<?php
// Подключение к базе
session_start();
require_once('vendor/connect.php');

$sql = "SELECT * FROM services";
$result = mysqli_query($connect, $sql);

// Записи в блоге
echo "<h1>Услуги</h1>";
echo "<table>";
echo "<tr><th>ID</th><th>Категория</th><th>Название</th><th>Цена</th><th>Действие</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>". $row["id"]. "</td>";
    echo "<td>". $row["category"]. "</td>";
    echo "<td>". $row["name"]. "</td>";
    echo "<td>". $row["price"]. "</td>";
    echo "<td>";
    echo "<a href='editservices.php?id=". $row["id"]. "'>Изменить</a> | ";
    echo "<a href='vendor/deleteservices.php?id=". $row["id"]. "'>Удалить</a>";
    echo "</td>";
    echo "</tr>";
}
echo "</table>";

mysqli_close($connect);
?>
</div>
<?php require "blocks/footer.php"?>
</body>
</html>