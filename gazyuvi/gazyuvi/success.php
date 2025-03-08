<!-- Запрос отправлен  -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запрос отправлен</title>
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
    <!-- Запрос отправлен -->
    
<div class="success">
    <h1>Запрос успешно отправлен</h1>
    
</div>
<!-- Кнопка на главную -->
<div class="buttonback">
<form action="index.php">
        <div class="benefitsbuttonblock">
        <button class = "benefitsbutton">На главную</button>
        </div>
    </form>
</div>

<!-- Подвал  -->

<?php require "blocks/footer.php"?>
</body>
</html>







