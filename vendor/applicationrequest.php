<!-- Запрос на услугу  -->
<?php
require_once('connect.php');
session_start();

$toEmail = 'samoedovsky10@yandex.ru'; 
$subject = 'Новый запрос';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Получение данных
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $auto = $_POST['auto'];
    $time = $_POST['time'];
    $user_id = $_SESSION['user']['user_id'];
    $services = [];

    // Выбор услуг
    if (isset($_POST['ecu'])) {
        $services[] = 'Работа с ЭБУ';
    }
    if (isset($_POST['calibration'])) {
        $services[] = 'Калибровки';
    }
    if (isset($_POST['installation'])) {
        $services[] = 'Установка ГБО';
    }
    if (isset($_POST['montageballon'])) {
        $services[] = 'Монтаж/демонтаж баллона';
    }
    if (isset($_POST['mainworks'])) {
        $services[] = 'Магистральные работы';
    }
    if (isset($_POST['tightness'])) {
        $services[] = 'Проверка на герметичность ГБО';
    }
    if (isset($_POST['hoses'])) {
        $services[] = 'Замена шлангов ГБО';
    }
    if (isset($_POST['demontage'])) {
        $services[] = 'Монтаж/демонтаж';
    }
    if (isset($_POST['repair'])) {
        $services[] = 'Ремонт/замена ГБО';
    }
    if (isset($_POST['registration'])) {
        $services[] = 'Регистрация';
    }
    if (isset($_POST['maintenance'])) {
        $services[] = 'Техническое обслуживание';
    }


    // Сообщение на почту
    $message = "Новый запрос на услугу от $name\n";
    $message.= "Номер телефона: $phone\n";
    $message.= "Автомобиль: $auto\n";
    $message.= "Время: $time\n";
    $message.= "Услуги: ". implode(', ', $services). "\n";

    // Отправка сообщения
    $headers = 'From: '. $name. ' <'. $phone. '>';
    if (mail($toEmail, $subject, $message, $headers)) {
        $services_str = implode(',', $services);

        mysqli_query($connect, "INSERT INTO `application_requests` (`user_id`, `name`, `phone`, `auto`, `time`, `services`) VALUES ('$user_id', '$name', '$phone', '$auto', '$time', '$services_str')");
        $connect->close();

        header('Location: ../success.php');
        exit;
    } 
    $connect->close();
}

?>