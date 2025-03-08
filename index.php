<?php session_start();?>
<!-- Главная страница  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Газ Юви</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <link rel="shortcut icon" href="media/favicon.svg">    
    <script src="js/script.js"></script>
</head>
<?php
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
<!-- Главный экран -->
    
<div class="main" id = "main">    

    <div id="heading" width = "100%" height = "100%">

        <!-- Логотип на главном экране -->

        <div class="logo">
            <img src = "media/logo.svg" class = "centerlogo" alt = "logo">
        </div>

        <!-- "Сильные стороны" на главном экране -->

        <div class="headingstrengths">
            <div class="bottomstrengths">
                <img src="media/strengths/strengths1.png" alt="path" class = "leftimgstrengths">
                <br>
                <p class = "textstrengths">Квалифицированные<br> специалисты</p>
            </div>
            <div class="bottomstrengths">
                <img src="media/strengths/strengths2.png" alt="path" class = "imgstrengths">
                <br>
                <p class = "textstrengths">Гарантия<br>на все виды работ</p>
            </div>
            <div class="bottomstrengths">
                <img src="media/strengths/strengths3.png" alt="path" class = "imgstrengths">
                <br>
                <p class = "textstrengths">Индивидуальный<br>подход</p>
            </div>
        </div>
        <form action="callback.php" class = "mainbuttonblock">
            <button class = "mainbutton">Оставить заявку</button>
        </form>
    </div>

</div>

    <!-- Блок "почему выбирают нас?" -->

<div class="reasons" id = "reasons">
    
<div class="linereasons" id = "left">
<div class="reason">

            <h1 class = "heading">Почему <br>выбирают<br> <b class = "headingreasons">нас</b>?</h1>

    </div>

    <div class="reason" id = "borders">
        <p><h1><b><span>Качество</span></b></h1>
        <br>
        <hr align = "left">
        Надежное и долговечное оборудование <br>проверенных производителей
        </p>
    </div>

</div>
<div class="linereasons" id = "right">
            <div class="reason" id = "borders">
            <p><h1><b><span>Профессионализм </span></b></h1>
            <br>
            <hr align = "left">
            Вам помогут мастера <br>с большим опытом установки ГБО
            </p>
</div>
        <div class="reason" id = "borders">
            <p><h1><b><span>Уверенность</span></b></h1>
            <br>
            <hr align = "left">
            гарантируем надежность и долговечность <br>систем ГБО, которые мы устанавливаем
            </p>
        
        </div>

    </div>
</div>

<!-- Блок "преимущества ГБО" -->

<div class="advantagies" id = "advantagies">
    <h1>Преимущества ГБО</h1>
    <div class="firstline">
        <div class="advblock">
            <img src="media/advantagies/adv1.png" alt="adv">
            <p>Увеличение интервала <br>замены масла и свечей</p>
        </div>
        <div class="advblock">
            <img src="media/advantagies/adv2.png" alt="adv">
            <p>Сокращение расходов <br>на топливо в 2 раза</p>
        </div>
        <div class="advblock">
            <img src="media/advantagies/adv3.png" alt="adv">
            <p>Переключение с газа <br>на бензин из салона</p>
        </div>
    </div>
    <div class="secondline">
        <div class="advblock">
            <img src="media/advantagies/adv4.png" alt="adv">
            <p>Безопаснее, чем бензин <br>и надежнее с гарантией</p>
        </div>
        <div class="advblock">
            <img src="media/advantagies/adv5.png" alt="adv">
            <p>Снижение токсичных <br>выбросов в 2-5 раз</p>
        </div>
        <div class="advblock">
            <img src="media/advantagies/adv6.png" alt="adv">
            <p>Увеличение срока службы <br>двигателя в 1,5 раза</p>
        </div>
    </div>
</div>

<!-- Блок "выгодные предложения" -->
<div class="benefitsheading" id = "benefits">
    <h1>Выгодные предложения ждут!</h1>
</div>
<div class="benefits">
    <div class="benefitleft">
        <img src="media/benefits/benefit1.png" alt="benefit">
    </div>
    <div class="benefitcenter">
        <img src="media/benefits/benefit3.png" alt="benefit">
    </div>
    <div class="benefitright">
        <img src="media/benefits/benefit2.png" alt="benefit">
    </div>
</div>
<form class="benefitsbuttonblock" action="callback.php">
    <button class="benefitsbutton">Получите консультацию</button>
</form>

<!-- Подвал  -->

<?php require "blocks/footer.php"?>
</body>
</html>







