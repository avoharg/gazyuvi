<?php 

session_start();

require_once('connect.php');

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$tel = $_POST['tel'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if (empty($full_name) || empty($email) || empty($tel) || empty($password) || empty($password_confirm) ) {
    $_SESSION['message'] = "Заполните все поля";
    
} else {
    if ($password!= $password_confirm) {
        $_SESSION['message'] = "Пароли не совпадают";
        header('Location: ../register.php');

    } else {
        $hashed_password = md5($password);

        $stmt = $connect->prepare("INSERT INTO `client`(`full_name`, `email`, `tel`, `password`) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $full_name, $email, $tel, $hashed_password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $_SESSION['message'] = "Регистрация прошла успешно";
            header("Location:../enter.php");
        } else {
        $_SESSION['message'] = "Ошибка регистрации";
            
        }
    }
}

?>