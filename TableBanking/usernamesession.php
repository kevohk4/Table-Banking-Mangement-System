<?php
session_start();
$user_name = $_SESSION['username'];
if(!isset($_SESSION['username'])){
    header ("Location:username.php");
    die();
}
?>