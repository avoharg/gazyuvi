<!-- Удаление записей  -->
<?php
// Подключение к базе 
session_start();
require_once('connect.php');

$id = $_GET["id"];
$sql = "DELETE FROM contacts WHERE id = $id";
mysqli_query($connect, $sql);

header("Location: ../updatecontacts.php");
exit;

mysqli_close($connect);
?>