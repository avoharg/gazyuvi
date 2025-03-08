<?php
require_once('connect.php');
$id = $_POST['id'];
$sql = "UPDATE application_requests SET position = 'hidden' WHERE id = $id";
$connect->query($sql);
?>