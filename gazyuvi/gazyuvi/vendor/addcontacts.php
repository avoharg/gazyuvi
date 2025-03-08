<!-- Добавление новостей  -->
<?php
session_start();
require_once('connect.php');

if (isset($_POST['name']) && isset($_POST['href'])) {
  $heading = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $text = filter_var($_POST['href'], FILTER_SANITIZE_STRING);

    $query = $connect->prepare("INSERT INTO contacts (name, href) values (?,?)");
    $query->bind_param("ss", $heading, $text);
    $query->execute();
}

header('Location:../contacts.php');
?>

