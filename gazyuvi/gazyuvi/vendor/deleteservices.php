<!-- Удаление услуги  -->
<?php
// Подключение к базе 
session_start();
require_once('connect.php');

$id = $_GET["id"];
$sql = "DELETE FROM services WHERE id = $id";
mysqli_query($connect, $sql);

header("Location: ../updateservices.php");
exit;

mysqli_close($connect);
?>