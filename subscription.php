<?php
include('database.php');
mysqli_select_db($db,'subscription');
$email=$_POST['email'];
$request="Subscription";
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
}
$result = mysqli_query($db,"INSERT INTO emails(email,request) VALUES('$email','$request')");
if($result){
    include "index.php";
    echo "<script type='text/javascript'>alert('Thank you for Subscribing we will send you an email');</script>";
}
else
header('location:index.php');
?>