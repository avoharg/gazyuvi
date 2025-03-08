<!-- Изменение новостей  -->

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
$sql = "SELECT id, name, href FROM `contacts` WHERE `id` = '$id'";


$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);

// Форма изменения
echo "<h1>Изменить запись</h1>";
echo "<form action='editcontacts.php' method='post' class = 'editnews'>";
echo "<input type='hidden' name='id' value='". $row["id"]. "'>";
echo "<label for='name'>Название:</label><br>";
echo "<input type='text' name='name' value='". $row["name"]. "'>";
echo "<br>";
echo "<label for='href'>Ссылка:</label><br>";
echo "<input type='text' name='href' value='". $row["href"]. "'>";
echo "<br>";
echo "<input type='submit' value='Сохранить'>";
echo "</form>";

// Изменение записи
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $href = $_POST["href"];
    $sql = "UPDATE contacts SET name = '$name', href = '$href' WHERE id = $id";
    mysqli_query($connect, $sql);
    header("Location: updatecontacts.php");
    exit;
}

mysqli_close($connect);
?>


</div>
<?php require "blocks/footer.php"?>
</body>
</html>