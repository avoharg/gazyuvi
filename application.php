<!-- Создание заявки на услугу  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создание заявки</title>
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

  if (!isset($_SESSION['user'])) {
    header('Location: enter.php');
  };
?>
<body>
    <div class="application">
  <h1 class = "applicationheading">Создание заявки</h1>
    <form action="vendor/applicationrequest.php" method = "post" class = "add">
        <label for="name"><span class = "labelnumber">1. </span>Введите ФИО</label><br>
        <input type="text" name = "name" placeholder = "Иванов Иван Иванович"><br>
        <label for="phone"><span class = "labelnumber">2. </span>Введите номер телефона для связи</label><br>
        <input type="tel" name = "phone" placeholder = "+7 999 999 99-99"><br>
        <label for="auto"><span class = "labelnumber">3. </span>Какой у Вас автомобиль?</label><br>
        <input type="text" name = "auto" placeholder = "Марка, модель, год, пробег"><br>
        <label for="time"><span class = "labelnumber">4. </span>Выберите удобное для Вас время</label><br>
        <input type="datetime-local" value="<?php echo date_default_timezone_set(date_default_timezone_get())? date('Y-m-d\TH:i') : '';?>" name="time"/><br>
        
</div>
<div class="checkboxinput">
    <fieldset>
        <legend><h2>Выберите интересующие услуги</h2></legend>
        <div><input type="checkbox" name = "ecu"> Работа с ЭБУ</div>
        <div><input type="checkbox" name = "calibration"> Калибровки</div>
        <div><input type="checkbox" name = "installation"> Установка ГБО</div>
        <div><input type="checkbox" name = "montageballon"> Монтаж/демонтаж баллона</div>
        <div><input type="checkbox" name = "mainworks"> Магистральные работы</div>
        <div><input type="checkbox" name = "tightness"> Проверка на герметичность ГБО</div>
        <div><input type="checkbox" name = "hoses"> Замена шлангов ГБО</div>
        <div><input type="checkbox" name = "demontage"> Монтаж/демонтаж</div>
        <div><input type="checkbox" name = "repair"> Ремонт/замена ГБО</div>
        <div><input type="checkbox" name = "registration"> Регистрация</div>
        <div><input type="checkbox" name = "maintenance"> Техническое обслуживание</div>
        
    </fieldset>
    <button type = "submit" class = "submitbutton">Создать</button>
    </form>
</div>
<!-- Подвал -->

<?php require "blocks/footer.php"?>
</body>
</html>
