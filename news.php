<!-- Новости  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Блог</title>
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
  <!-- Блог -->
  
<div class="news">
      <div class="newslist">
        <h1>Блог</h1>
        <?php 
        
        $connect1 = mysqli_connect('localhost', 'root', '', 'gazyuvi_db');
        $sql1 = mysqli_query($connect1, 'SELECT * FROM `news`');
        
        while ($result1 = mysqli_fetch_array($sql1)) {
            echo "<div class = 'new'><h2>{$result1['heading']}</h2><br><br>";
            echo "<p>".nl2br($result1['text'])."</p>";
            echo "</div>";
        }
        ?>
      </div>
    </div>

</div>

<!-- Подвал -->

<?php require "blocks/footer.php"?>
