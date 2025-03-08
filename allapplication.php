<!-- Панель администратора  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg">    

</head>
<?php 
  session_start();
  require "blocks/adminheader.php";

  if (!isset($_SESSION['admin'])) {
    header('Location: admin.php');
  };
?>

<body>
<div class="profile">

  <!-- Админ. панель -->

<div class="user">
    
    <h1>Панель администратора</h1>
    <h2>Добро пожаловать</h2>
    <div class="usersapplication"><br>
    <form action="adminpanel.php" class = "add">
        <button>Назад</button>
    </form>
    <h2>Все заявки:</h2>
    
      <?php
      // require_once('vendor/connect.php');
      
      // $sqlapplications = "SELECT id,  name, phone, auto, time, services, status FROM `application_requests`";
      // $result = $connect -> query($sqlapplications);

      // if($result -> num_rows > 0){
      //   while($row = $result -> fetch_assoc()){
      //     echo '<div class = "userapplication"><div id="record-' . $row['id'] . '">
      //     <p>' . $row['name'] . '</p>
      //     <p>' . $row['phone'] . '</p>
      //    <p>' . $row['auto'] . '</p>
      //    <p>' . $row['time'] . '</p>
      //    <p>' . $row['services'] . '</p>
      //    <p>' . $row['status'] . '</p>';
      //    if($row['status'] == 'Новая'){
      //     echo "<form action = 'vendor/updatestatus.php' method = 'post'>
      //     <input type = 'hidden' name = 'state_id' value = '" . $row['id']. "'>
      //     <select name = 'new_status'>
      //       <option value = 'Отклонена'>Отклонить</option>
      //       <option value = 'Выполнена'>Выполнена</option>
      //     </select>
      //     <input type = 'submit'>
      //     </form>";
      //    }
      //    echo "<button onclick='hideRecord(" . $row['id'] . ")'>Скрыть</button>";
      //    echo '</div></div>';
      //   }
      // }
      // ?>
      <?php
require_once('vendor/connect.php');

$sqlapplications = "SELECT id, name, phone, auto, time, services, status FROM `application_requests`";
$result = $connect->query($sqlapplications);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '<div class = "userapplication"><div id="record-' . $row['id'] . '">
        <p>Идентификатор: ' . $row['id'] . '</p>
        <p>Имя: ' . $row['name'] . '</p>
        <p>Телефон: ' . $row['phone'] . '</p>
        <p>Автомобиль: ' . $row['auto'] . '</p>
        <p>Время: ' . $row['time'] . '</p>
        <p>Услуги: ' . $row['services'] . '</p>
        <p>Статус: ' . $row['status'] . '</p></div></div>';
    }
}
?>
<form action="adminpanel.php" class = "add">
    <button>Назад</button>
</form>
        </div>
    </div>
</div>

<!-- Подвал -->

<?php require "blocks/footer.php"?>
</body>
</html>