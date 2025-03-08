<!-- Добавление услуг  -->
<?php
session_start();
require_once('connect.php');

if (isset($_POST['category']) && isset($_POST['name']) && isset($_POST['price'])) {
  $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $price = filter_var($_POST['price'], FILTER_VALIDATE_FLOAT);

    $query = $connect->prepare("INSERT INTO services (category, name, price) values (?, ?, ?)");
    $query->bind_param("sss", $category, $name, $price);
    $query->execute();
}

header('Location: ../services.php');
?>
