<?php
//include('database.php');
session_start();
$user_check = $_SESSION['login_user'];
$ses_sql = mysqli_query($db,"SELECT * from staff where staff_id = '$user_check'");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['staff_id'];
if(!isset($_SESSION['login_user'])){
    header ("Location:login.php");
    die();
}
?>