<?php
session_start();
$email_recover = $_SESSION['email'];
if(!isset($_SESSION['email'])){
    header ("Location:passwordreset.php");
    die();
}
?>