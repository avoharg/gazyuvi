<!-- Заявка на звонок  -->
<?php
require_once('connect.php');
session_start();

$callbacks = [
    'installation' => 'Установка ГБО',
    'instalment' => 'ГБО в рассрочку',
    'repair' => 'Ремонт ГБО',
    'maintenance' => 'Тех. обслуживание ГБО',
    'dismantling' => 'Демонтаж ГБО',
    'diagnostics' => 'Диагностика ГБО',
    'registration' => 'Регистрация ГБО',
    'crimping' => 'Опрессовка баллона',
    'accessories' => 'Покупка комплектующих',
    'other' => 'Другое',
];

if (isset($_POST['callback']) && array_key_exists($_POST['callback'], $callbacks)) {
    $callbackType = $_POST['callback'];
    $callback = $callbacks[$callbackType];
} else {
    $callback = 'Другое';
}

$user_id = isset($_SESSION['user']['user_id']) ? $_SESSION['user']['user_id'] : uniqid();

if ($user_id === null) {
    echo "User ID is not set";
    exit;
}

$to = 'samoedovsky10@yandex.ru';
$from = 'samoedovsky10@mail.ru';

$phone = htmlspecialchars(trim($_POST['number']));
$name = htmlspecialchars(urldecode(trim($_POST['name'])));

$query = "INSERT INTO `call_request` (`user_id`, `name`, `phone`, `callback`) VALUES (?,?,?,?)";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, 'isss', $user_id, $name, $phone, $callback);
mysqli_stmt_execute($stmt);

// Отправка на почту
$headers = "От: $from\r\n";
$headers .= "Кому: $from\r\n";
$subject = $callback;
$message = "Имя: $name\nТелефон: $phone\nТип обратного звонка: $callback";

if (mail($to, $subject, $message, $headers)) {
    header("Location:../success.php");
    exit;
} 
