<?php
include('database.php');
mysqli_select_db($db,'members');
$username=$_POST['username'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$password=$_POST['password'];
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
}
$result = mysqli_query($db,"INSERT INTO members(username,name,emai,phone_number,address,img,status,password) VALUES('$username','$name','$email','$phone','$address','$name','Not Active','$password')");
if($result){
    include "logout.php";
    header('location:logout.php');
    echo "<script type='text/javascript'>alert('Registration success!!');</script>";
}
else
 header('location:signup.php');
?>