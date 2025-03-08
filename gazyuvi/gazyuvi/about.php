<!-- О компании  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О компании</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
 <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg">    

</head>
<?php session_start();
  // выбор шапки 
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
    <!-- О компании -->
    
<div class="about">
    <div class="biglogo">
    <img src="media/biglogo.svg" alt="logo" class = "biglogoimg">
    </div>
    <div class="maintext">
    <h2>Компания Автолюкс Газ Юви является центром по газификации автотранспорта.</h2>
    </div>
    <div class="abouttext">
    <p>Мы предлагаем услуги по установке газобаллонного оборудования (ГБО) на автомобили. <br><br>
    Установка ГБО позволяет существенно сократить расходы на топливо, при этом не ухудшая экологичность автомобиля. <br><br>
    Наши специалисты имеют большой опыт работы с ГБО и готовы установить оборудование на ваш автомобиль. <br>Мы гарантируем качество работы и индивидуальный подход к каждому клиенту. <br><br>
    Приходите к нам и убедитесь сами!</p>
    </div>

    <!-- С нами вы получите  -->

    <div class="receive" id = "receive">
    <ul>
    <h1>С нами вы получите</h1>
      <div class="firstlinereveive">
        <li>Оригинальное оборудование из Италии и Польши</lip>
      </div>
      <div class="secondlinereveive">
        <li>Экономию до 124 000 рублей в год на топливе</li>
      </div>
      <div class="thirdlinereveive">
        <li>Высокую износостойкость двигателя</li>
      </div>
      <div class="fourthlinereveive">
        <li>Гарантии качества</li>
      </div>
    </ul>
    </div>

    <!-- Компании - партнеры  -->

    <div class="representative" id = "representative">
    <p>Официальный представитель отечественных газовых инжекторных систем Alpha</p>
    <img src="media/representative/representative1.png" alt="representative">
    <p>Сертифицированный дистрибьютор масел Gas&Oil</p>
    <img src="media/representative/representative2.png" alt="representative">
    </div>

    <!-- Отзывы -->

    <div class="reviews" id = "reviews">
        <h1>Нашему сервису доверяют</h1>
          <div class="review">
            <blockquote class='quote'>
              <p>Газ ЮВИ просто молодцы. Сделали все отлично, и по цене дешевле, чем по городу. Рекомендую</p>
              <cite>Татьяна К</cite>
            </blockquote>
          </div>
          <div class="review">
            <blockquote class='quote'>
              <p>Приехал в первый раз ориентируясь на отзывы. Оказалось попал к профессионалам. На компьютерной диагностике быстро нашли причину и исправили её!</p>
              <cite>Иван Кудряшев</cite>
            </blockquote>
          </div>
          <div class="review">
            <blockquote class='quote'>
              <p>Приехал в данный сервис с неисправностью, ребята оперативно продиагностировали,<br> нашли неисправность, и отремонтировали в течении часа, цену ожидал больше, но удивили, спасибо за оперативность!</p>
              <cite>Коля Белый</cite>
            </blockquote>
          </div>
        </div>
    </div>
    
    <p class = "end">
    <a href="https://2gis.ru/kurgan/branches/70000001080754848/firm/70000001080754849/65.325676%2C55.481621/tab/reviews/addreview">Вы можете оставить свой отзыв! <br><img src = "media/reviews/cursor.png" alt = "cursor" class = "cursor"></a>
<br></p>
<p class = "endp">Присоединяйтесь к команде автомобилистов на газе и начните экономить!</p>
</div>

<?php require "blocks/footer.php"?>
</body>
</html>







