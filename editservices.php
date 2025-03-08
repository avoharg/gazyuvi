<!-- Изменение услуг  -->


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обновление новостей</title>
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

$id = $_GET["id"];
$sql = "SELECT id, category, name, price FROM `services` WHERE `id` = '$id'";


$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

// Форма изменения
echo "<h1>Изменить услугу</h1>";
echo "<form action='editservices.php' method='post' class = 'editnews'>";
echo "<input type='hidden' name='id' value='". $row["id"]. "'>";
echo "<label for='heading'>Категория:</label><br>";
echo "<input type='text' name='category' value='". $row["category"]. "'>";
echo "<br>";
echo "<label for='text'>Текст:</label><br>";
echo "<input type='text' name='name' value='". $row["name"]. "'>";
echo "<br>";
echo "<label for='text'>Цена:</label><br>";
echo "<input type='text' name='price' value='". $row["price"]. "'><br>";
echo "<input type='submit' value='Сохранить'>";
echo "</form>";

// Изменение записи
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $category = $_POST["category"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $sql = "UPDATE services SET category = '$category', name = '$name', price = '$price' WHERE id = $id";
    mysqli_query($connect, $sql);
    header("Location: ../updateservices.php");
    exit;
}

mysqli_close($connect);
?>


</div>
<?php require "blocks/footer.php"?>
</body>
</html>