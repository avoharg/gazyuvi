<!-- Калькулятор цен на услуги  -->
<?php
require_once('vendor/connect.php');

$services = getServices();

$calculator = new Calculator();

function getServices() {
    global $connect;
    $query = "SELECT * FROM services";
    $stmt = $connect->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    $services = $result->fetch_all(MYSQLI_ASSOC);
    return $services;
}

class Calculator {
    private $services = [];
    private $total = 0;

    public function addService($service) {
        $this->services[] = $service;
        $this->calculateTotal();
    }

    public function calculateTotal() {
        $this->total = 0;
        foreach ($this->services as $service) {
            $this->total += $service['price'];
        }
    }

    public function getTotal() {
        return $this->total;
    }

    public function getServices() {
        return $this->services;
    }
}
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
    <title>Калькулятор цен</title>
    <link rel = "stylesheet" type = "text/css" href = "css/style.css">
    <script src="js/script.js"></script>
 <link rel="shortcut icon" href="media/favicon.svg">    

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[type="checkbox"]').change(function() {
            calculateTotal();
        });

        function calculateTotal() {
            var total = 0;
            $('input[type="checkbox"]:checked').each(function() {
                var price = parseFloat($(this).closest('.servicecalculator').find('.price').text().replace(' руб.', ''));
                total += price;
            });
            $('.total span').text(total.toFixed(2));
        }
    });
</script>
    
</head>
<body class = "servicesbody">
<form action="application.php">
    <button id="floating-button">Запишитесь на услуги</button>
</form>
    
        <div class="headingservice">
        <h1>Калькулятор цен на услуги</h1></div>
        <div class="calculator-results">
            <!-- Вывод суммы  -->
            <h2 class="total">Итого: 
                <span><?= htmlspecialchars($calculator->getTotal()) ?></span> руб.
            </h2>
        </div>
        <div class="calculator">
        <?php foreach ($categories as $category) :?>
            <h2 class = "headingcategories"><?= $category?></h2>
        <div class="services">
        <?php foreach ($services[$category] as $service) :?>

                <div class="servicecalculator">
                    <input type="checkbox" class = "calculatorcheckbox" id="service-<?= htmlspecialchars($service['id']) ?>" name="service_id[]" value="<?= htmlspecialchars($service['id']) ?>">
                    <p class = "price"> <?= htmlspecialchars($service['price']) ?> руб.</p>
                    <h3><?= htmlspecialchars($service['name']) ?></h3>
                    
                </div>
            <?php endforeach; ?>
        </div>
        <?php endforeach;?>

        
    </div>
    <!-- Подвал  -->

<?php require "blocks/footer.php"?>

</body>
</html>
