<!-- Вход в аккаунт  -->
<?php
session_start();
require_once('connect.php');

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $connect->prepare("SELECT id, full_name, email FROM `client` WHERE `email` =? AND `password` =?");
$stmt->bind_param("ss", $email, md5($password));
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $_SESSION['user'] = [
        "user_id" => $user['id'],
        "full_name" => $user['full_name'],
        "email" => $user['email']
    ];
    header('Location:../profile.php');
    exit();
} else {
    $_SESSION['message'] = 'Не верная почта или пароль';
    header('Location:../enter.php');
    exit();
}
?>