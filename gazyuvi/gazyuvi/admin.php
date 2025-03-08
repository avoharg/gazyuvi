<!-- Вход администратора  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <script src = "/js/script.js"></script>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg"> 
</head>
<?php session_start();
  
  if (isset($_SESSION['admin'])) {
    require "blocks/loginheader.php";
  } else {
    require "blocks/header.php";
  };

  
  if (isset($_SESSION['user'])) {
    header('Location: adminpanel.php');
  };
?>
<body>
<div class="enter">

  <!-- Вход в админ панель -->

<form action="vendor/adminsignin.php" method = "post">
  <label>Логин</label>
  <input type="text" name = "login" placeholder = "Введите логин">
  <label>Пароль</label>
  <input type="password" name = "password" placeholder = "Введите пароль">
  <button type = "submit" class = "enterbutton">Войти</button>

  <!-- Сообщение  -->

  <?php 
        if (isset($_SESSION['message'])){
            echo '<p class = "message">' . isset($_SESSION['message']) . '</p>';
        }
        unset($_SESSION['message']);
    ?>
</form>

</div>

<!-- Подвал -->

<?php require "blocks/footer.php"?>
</body>
</html>

