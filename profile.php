<!-- Профиль пользователя -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль</title>
    <script src="//code.jivo.ru/widget/NQgsbte73Q" async></script>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg">    

</head>
<?php session_start();
            require_once("vendor/connect.php");

  // выбор шапки 

  if (isset($_SESSION['user'])) {
    require "blocks/loginheader.php";
  } else {
    require "blocks/header.php";
  };

  if (!isset($_SESSION['user']['user_id'])) {
    header('Location: enter.php');
    exit();
  };
  
?>
<body>
<div class="profile">

  <!-- Профиль пользователя -->

  <div class="user">
      <h1>Личный кабинет</h1>
      <h2><?= $_SESSION['user']['full_name']?></h2>
      <p><?= $_SESSION['user']['email']?></p>
      
  </div>    
</div>
<div class="cabinet">
  <a href="application.php">Вы можете записаться на услугу!</a>
</div>
<div class="applications">
<h2>Ваши заявки:</h2>

        <?php
            $user_id = $_SESSION['user']['user_id'];
            $sql = "SELECT * FROM `application_requests` WHERE user_id='$user_id'";
            $result = mysqli_query($connect, $sql);
            if($result -> num_rows>0){
                while($row = $result -> fetch_assoc())
                echo '<div class="application_card">
                        <h3>Автомобиль: '.$row["auto"].'</h3>
                        <p>Время: '.$row["time"].'</p>
                        <p>Услуги: '.$row["services"].' </p>
                        <p>Статус: '.$row["status"].'</p>
                    </div>';
            }else{
              echo '<div class="userservices">
              <p>Пока здесь ничего нет, но Вы можете записаться на интересующую услугу!</p>
          </div>';
            }
        ?>
    </div>
</div>


<!-- История услуг -->


<div class="logout">
        <a href="vendor/logout.php" class = "logout">Выход</a>
    </div>

<!-- Подвал -->

<?php require "blocks/footer.php"?>
</body>
</html>
