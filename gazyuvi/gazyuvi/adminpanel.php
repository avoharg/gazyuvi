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
    <div class="usersapplication">
      <h2>Новые заявки:</h2>
      
<?php
require_once('vendor/connect.php');

$sqlapplications = "SELECT id, name, phone, auto, time, services, status FROM `application_requests` WHERE position != 'hidden'";
$result = $connect->query($sqlapplications);

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
        echo '<div class = "userapplication"><div id="record-' . $row['id'] . '">
        <p>' . $row['name'] . '</p>
        <p>' . $row['phone'] . '</p>
        <p>' . $row['auto'] . '</p>
        <p>' . $row['time'] . '</p>
        <p>' . $row['services'] . '</p>
        <p>' . $row['status'] . '</p>';
        if($row['status'] == 'Новая'){
            echo "<form action = 'vendor/updatestatus.php' method = 'post' class = 'hidebutton'>
            <input type = 'hidden' name = 'state_id' value = '" . $row['id']. "'>
            <select name = 'new_status'>
                <option value = 'Отклонена'>Отклонить</option>
                <option value = 'Выполнена'>Выполнена</option>
            </select>
            <button type = 'submit'>Отправить</button>
            </form>";
        }
        echo "<form class = 'hidebutton'><button onclick='hideRecord(" . $row['id'] . ")'>Скрыть</button></form>";
        echo '</div></div>';
    }
}
?>
<form action="allapplication.php" class = "add">
        <button>Все заявки</button>
      </form>
    </div>

<script>
function hideRecord(id) {
  var elem = document.getElementById('record-' + id);
  elem.parentNode.removeChild(elem);
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'vendor/hiderecord.php', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.send('id=' + id);
  xhr.onload = function() {
    if (xhr.status === 200) {
      window.location.reload();
    }
  };
}
</script>
    <div class="panel">

      <!-- Форма добавления новостей  -->

      <h2>Добавление новостей</h2>
      <form action="updatenews.php" class = "add">
        <button>Изменить/удалить</button>
      </form>

      <form method="POST" action="vendor/addnews.php" class = "add">
      <label>Тема</label><br><br>
      <input name="heading" type="text" placeholder="Тема" required><br><br>
      <label>Текст новости</label><br><br>
      <textarea name="text" cols="30" rows="10" required></textarea><br><br>
      <button type="submit">Добавить</button>
    </form> 

      <!-- Форма добавления услуг  -->
      <h2>Добавление услуг</h2>

    <form action="updateservices.php" class = "add">
            <button>Изменить/удалить</button>
        </form>
      <form method = "POST" action = "vendor/addservices.php" id = "addnews" class = "add">
        
        <label for="category">Категория</label><br><br>
        <select name="category" class = "selectcategory">
          <option value="Работа с ЭБУ">Работа с ЭБУ</option>
          <option value="Калибровки">Калибровки</option>
          <option value="Монтаж/демонтаж баллона">Монтаж/демонтаж баллона</option>
          <option value="Магистральные работы">Магистральные работы</option>
          <option value="Установка ГБО">Установка ГБО</option>
          <option value="Проверка на герметичность ГБО">Проверка на герметичность ГБО</option>
          <option value="Замена шлангов ГБО">Замена шлангов ГБО</option>
          <option value="Монтаж/демонтаж">Монтаж/демонтаж</option>
          <option value="Ремонт/замена ГБО">Ремонт/замена ГБО</option>
          <option value="Регистрация">Регистрация</option>
          <option value="Техническое обслуживание">Техническое обслуживание</option>
        </select><br><br>
        <label for = "name">Название услуги</label><br><input type="text" name = "name" required><br><br>
        <label for = "name">Цена</label><br><input type="text" name = "price" required><br><br>

        <button type = "submit">Добавить</button>
      </form>

      <h2>Добавление контактов</h2>

      <form method="POST" action="vendor/addcontacts.php" class = "add">
      <label>Название</label><br><br>
      <input name="name" type="text" placeholder="Тема" required><br><br>
      <label>Ссылка</label><br><br>
      <input name="href" type="text" placeholder="Тема" required><br><br>
      <button type="submit">Добавить</button>
    </form> 
      <form method="POST" action="updatecontacts.php" class = "add">
      <button type="submit">Изменить контактную информацию</button>
    </form> 
      <!-- Список пользователей  -->

      <div class="clientlist">
        <h2>Список пользователей</h2>
        <table><thead><tr><th>ФИО</th><th>Номер телефона</th><th>Эл. почта</th></tr></thead><tbody>
        <?php 
        $connect = mysqli_connect('localhost', 'root', '', 'gazyuvi_db');
        $sql = mysqli_query($connect, 'SELECT * FROM `client`');
        while ($result = mysqli_fetch_array($sql)) {
            echo "<tr><td>{$result['full_name']}</td> <td>{$result['tel']}</td><td>{$result['email']}</td></tr>";
        }
        ?>
        </tbody></table>
      </div>
    </div>
</div>    
</div>

<!-- Кнопка выхода из аккаунта  -->

<div class="logout">
        <a href="vendor/adminlogout.php" class = "logout">Выход</a>
    </div>

<!-- Подвал -->

<?php require "blocks/footer.php"?>
</body>
</html>