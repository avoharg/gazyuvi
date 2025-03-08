<!-- Контакты  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg">    

</head>
<?php session_start();
require_once('vendor/connect.php');

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
<form action="calculator.php">
    <button id="floating-button">Рассчитать стоимость услуг</button>
</form>

    <!-- Контакты -->
    
<div class="contactblock">
     <div class="headingcontacts">
            <h1>Контакты</h1>
        <p>Для консультации свяжитесь удобным для вас способом:</p></div>
        <div class="contacts">
<ul class = "contact">
<?php
         $contacts = mysqli_query($connect, 'SELECT * FROM `contacts`');

             while ($contact = mysqli_fetch_array($contacts)) {
                
             echo "<li>
                 <div>
                     <a href = " . $contact['href'] . ">" . $contact['name'] . "</a>
                 </div>
             </li>";
             }
?>
        </ul>
    </div><div class="buttonincontacts">
            <form action="callback.php" class = "contactbuttons">
                <button class = "contactbutton">Оставить заявку на обратный звонок</button>
            </form>
    </div>
</div> 
</div>

<!-- Карта и адрес  -->

<div class="map" id = "map">
    <h1>Адрес</h1>
    <p>Город Курган, Проспект Маршала Голикова, 28</p>
    <div class="mapapi">
    <a class="dg-widget-link" href="http://2gis.ru/kurgan/firm/70000001080754849/center/65.32567262649538,55.48229467376305/zoom/16?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=bigMap">Посмотреть на карте Кургана</a><div class="dg-widget-link"><a href="http://2gis.ru/kurgan/firm/70000001080754849/photos/70000001080754849/center/65.32567262649538,55.48229467376305/zoom/17?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=photos">Фотографии компании</a></div><div class="dg-widget-link"><a href="http://2gis.ru/kurgan/center/65.325676,55.481621/zoom/16/routeTab/rsType/bus/to/65.325676,55.481621╎Автолюкс Газ Юви, автосервис?utm_medium=widget-source&utm_campaign=firmsonmap&utm_source=route">Найти проезд до Автолюкс Газ Юви, автосервис</a></div><script charset="utf-8" src="https://widgets.2gis.com/js/DGWidgetLoader.js"></script><script charset="utf-8">new DGWidgetLoader({"width":"100%","height":300,"pos":{"lat":55.48229467376305,"lon":65.32567262649538,"zoom":16},"opt":{"city":"kurgan"},"org":[{"id":"70000001080754849"}]});</script><noscript style="font-size:16px;font-weight:bold;"></noscript>
    </div>
</div>

<!-- Время работы  -->

<script>
jQuery(document).ready(function(){
var date = new Date(); 
var weekdays = ["7", "1", "2", "3", "4", "5", "6"]; 
var weekday = weekdays[date.getDay()];
jQuery('.grafik-test div[data-day="'+weekday+'"]').addClass('today'); 
});
</script>
<div class="time" id = "time">
    <h1>Время работы</h1>
    <h2>Мы работаем ежедневно</h2>
    
<div class="grafik-test">
	<div data-day="1">Пн<span>09:30 – 18:30</span></div>
	<div data-day="2">Вт<span>09:30 – 18:30</span></div>
	<div data-day="3">Ср<span>09:30 – 18:30</span></div>
	<div data-day="4">Чт<span>09:30 – 18:30</span></div>
	<div data-day="5">Пт<span>09:30 – 18:30</span></div>
	<div class="halfs" data-day="6">Сб<span>09:30 – 18:30</span></div>
	<div class="halfs" data-day="7">Вс<span>10:00 – 17:00</span></div>
	</div></div>
    </div>

    
<!-- </div> -->
<?php require "blocks/footer.php"?>
</body>
</html>







