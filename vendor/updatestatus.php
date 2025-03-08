<!-- Обновление статуса заявки  -->
<?php
session_start();
require_once('connect.php');

$new_status = $_POST['new_status'];
$state_id = $_POST['state_id'];

$sql = "SELECT * FROM `application_requests` WHERE id = '$state_id' AND status = 'Новая'";
$result = $connect -> query($sql);

if($result -> num_rows > 0){
    $sql_update = "UPDATE `application_requests` SET `status` = '$new_status' WHERE id = '$state_id'";
    if($connect -> query($sql_update) === TRUE){
        header("Location: ../adminpanel.php");
        exit();
    }else {
        echo 'Ошибка';

    }
    
}else{
    echo 'Ошибка';
}
?>