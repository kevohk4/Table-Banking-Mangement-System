<?php
include('database.php');
mysqli_select_db($db,'subscription');
$email=$_POST['email'];
$request="Password recovery";
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
}
$result = mysqli_query($db,"INSERT INTO emails(email,request) VALUES('$email','$request')");
if($result){
    include "index.php";
    echo "<script type='text/javascript'>alert('Sent successfuly');</script>";
}
else
header('location:index.php');
?>