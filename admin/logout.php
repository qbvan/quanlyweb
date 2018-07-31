<?php
session_start();
unset($_SESSION['hoten']);
header('location:index.php');
?>