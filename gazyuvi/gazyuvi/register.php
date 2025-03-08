<!-- Регистрация -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg">    

</head>
<?php session_start();
  // выбор шапки 
  if (isset($_SESSION['user'])) {
    require "blocks/loginheader.php";
  } else {
    require "blocks/header.php";
  };

    if (isset($_SESSION['user'])) {
        header('Location: profile.php');
      };
?>

<body>
<div class="enter">
    <!-- Форма регистрации -->
<form action="vendor/signup.php" method = "post">
    <label>ФИО</label>
    <input type="text" name = "full_name" placeholder = "Введите полное имя" required>
    <label>Номер телефона</label>
    <input type="tel" name = "tel" minlength = "11"  maxlength = "12" placeholder = "Введите номер телефона" required>
    <label>Email</label>
    <input type="email" name = "email" placeholder = "Введите адрес эл. почты" required>
    <label>Пароль</label>
    <input type="password" name = "password" placeholder = "Введите пароль" required>
    <label>Повтор пароля</label>
    <input type="password" name = "password_confirm" placeholder = "Повторите пароль" required>
    <button type = "submit" class = "enterbutton">Войти</button>
    <p>Уже зарегистрированы? <a href="enter.php">Войдите</a>!</p>

    <!-- Сообщение -->
    <?php 
        if (isset($_SESSION['message'])){
            echo '<p class = "message">' . $_SESSION['message'] . '</p>';
        }
        unset($_SESSION['message']);
    ?>
    
</form>
</div>

<!-- Подвал -->
<?php require "blocks/footer.php"?>


