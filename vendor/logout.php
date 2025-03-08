<!-- Выход из аккаунта  -->
<?php 
    session_start();
    unset($_SESSION['user']);
    header('Location: ../enter.php');
?>