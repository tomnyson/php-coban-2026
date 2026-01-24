<?php
session_start();
if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}else {
    echo "<h1>xin chao: ". $_SESSION['username']."</h1>";
}

?>