
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Услуги</title>
    <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg">    

    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
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
<?php
require_once('vendor/connect.php');

$categories = [
    'Работа с ЭБУ',
    'Калибровки',
    'Установка ГБО',
    'Монтаж/демонтаж баллона',
    'Магистральные работы',
    'Замена шлангов ГБО',
    'Монтаж/демонтаж',
    'Ремонт/замена ГБО',
    'Регистрация',
    'Техническое обслуживание',
];

$services = [];

foreach ($categories as $category) {
    $query = "SELECT * FROM `services` WHERE category = '$category'";
    $result = mysqli_query($connect, $query);
    while ($row = mysqli_fetch_array($result)) {
        $services[$category][] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Услуги</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="servicesbody">
<form action="calculator.php">
    <button id="floating-button">Рассчитать стоимость услуг</button>
</form>

<div class="headingservice">
    <h1>Услуги</h1></div>
        <?php foreach ($categories as $category) :?>
            <h2><?= $category?></h2>
            <div class="catalog-items">
                <?php foreach ($services[$category] as $service) :?>
                    <article class="catalog-item new">
                        <div class="actions">
                            <a href="calculator.php" class="buy">Рассчитать стоимость</a>
                        </div>
                        <div class="price"><?= $service['price']?> руб.</div>

                        <h1 class="title"><?= $service['name']?></h1>
                    </article>
                <?php endforeach;?>
            </div>
        <?php endforeach;?>
<!-- Этапы работ  -->
<div class="stages" id = "stages">
    <h1>Этапы работ</h1>
    <div class="stage">
        <ul>
        <li>Вы оставляете заявку и мы вас консультируем</li>
        <li>Приезжаете в обговоренное время и оставляете машину</li>
        <li>Проводим работы по установке или ремонту</li>
        <li>Получаете документы на ГБО</li>
        <li>Забираете автомобиль и экономите на топливе</li>
    </ul>
    </div>
    
</div>

<!-- Подвал  -->

<?php require "blocks/footer.php"?>
</body>
</html>







