<!-- Вход в аккаунт  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg">    

</head>
<?php session_start();
//  выбор шапки 
  if (isset($_SESSION['user'])) {
    require "blocks/loginheader.php";
  } 
  else if (isset($_SESSION['admin'])){
    require "blocks/adminheader.php";
  }
    else {
    require "blocks/header.php";
  };

  if (isset($_SESSION['user'])) {
    header('Location: profile.php');
  };
?>
<body>
<div class="enter">

  <!-- Авторизация -->

<form action="vendor/signin.php" method = "post">
  <label>Email</label>
  <input type="email" name = "email" placeholder = "Введите адрес эл. почты">
  <label>Пароль</label>
  <input type="password" name = "password" placeholder = "Введите пароль">
  <button type = "submit" class = "enterbutton">Войти</button>
  <p>Нет аккаунта? <a href="register.php">Зарегистрируйтесь</a>!</p>

  <!-- Сообщение  -->

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
</body>
</html>