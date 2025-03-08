<!-- Добавление новостей  -->
<?php
session_start();
require_once('connect.php');

if (isset($_POST['heading']) && isset($_POST['text'])) {
  $heading = filter_var($_POST['heading'], FILTER_SANITIZE_STRING);
  $text = filter_var($_POST['text'], FILTER_SANITIZE_STRING);

    $query = $connect->prepare("INSERT INTO news (heading, text) values (?,?)");
    $query->bind_param("ss", $heading, $text);
    $query->execute();
}

header('Location:../news.php');
?>

