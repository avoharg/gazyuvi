<!-- Удаление записей  -->
<?php
// Подключение к базе 
session_start();
require_once('connect.php');

$id = $_GET["id"];
$sql = "DELETE FROM news WHERE id = $id";
mysqli_query($connect, $sql);

header("Location: ../updatenews.php");
exit;

mysqli_close($connect);
?>