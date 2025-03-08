<!-- Выход из панели администратора  -->
<?php 
    session_start();
    unset($_SESSION['admin']);
    header('Location: ../admin.php');
?>