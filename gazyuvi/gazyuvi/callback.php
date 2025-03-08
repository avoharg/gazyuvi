<!-- Заявка на звонок  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обратная связь</title>
    <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg">    

    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
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

?>

<body>

    <!-- Форма обратной связи -->
            
<div class="callback" id = "callback">
        <div class="callbackheading">
            <div class="headingblock">
        <h1>Оставьте заявку на обратный звонок</h1>
        <h2>Наш менеджер свяжется с Вами</h2>    </div>
    </div> 

   <form action="vendor/sendmail.php" method = "POST">

   <!-- ФИО  -->

   <label for="name">ФИО</label>
   <input type="text" name = "name" placeholder = "Иванов Иван Иванович" maxlength = "355" required class = "input"> 

    <!-- Номер телефона  -->

   <label for="number">Номер телефона</label>
   <input type="tel" name = "number" minlength = "11"  maxlength = "12" placeholder = "+7 (999) 999 99-99" required class = "input">
</div>
    <!-- Выбор услуги  -->
    <div class="radio">
        <h2>К какой услуге получить консультацию?</h2>
        <div>
            <input type="radio" value = "installation" name = "callback">
            <label for="installation">Установка ГБО</label>
        </div>
            
        <div>
            <input type="radio" value = "instalment" name = "callback">
            <label for="instalment">ГБО в рассрочку</label>
        </div>
            
        <div>
            <input type="radio" value = "repair" name = "callback">
            <label for="repair">Ремонт ГБО</label>
        </div>
            
        <div>
            <input type="radio" value = "maintenance" name = "callback">
            <label for="maintenance">Тех. обслуживание ГБО</label>
        </div>
            
        <div>
            <input type="radio" value = "dismantling" name = "callback">
            <label for="dismantling">Демонтаж ГБО</label>
        </div>
            
        <div>
            <input type="radio" value = "diagnostics" name = "callback">
            <label for="diagnostics">Диагностика ГБО</label>
        </div>
            
        <div>
            <input type="radio" value = "registration" name = "callback">
            <label for="registration">Регистрация ГБО</label>
        </div>
            
        <div>
            <input type="radio" value = "crimping" name = "callback">
            <label for="crimping">Опрессовка баллона</label>
        </div>
            
        <div>
            <input type="radio" value = "accessories" name = "callback">
            <label for="accessories">Покупка комплектующих</label>
        </div>
            
        <div>
            <input type="radio" value = "other" name = "callback">
            <label for="other">Другое</label>
        </div>

        <!-- Кнопка отправки  -->

    <div class="submitbuttonblock">
        <input type="submit" value = "Оставить заявку" class = "submitbutton">
    </div>
   </form>
</div>

<!-- Подвал  -->

<?php require "blocks/footer.php"?>
</body>
</html>







