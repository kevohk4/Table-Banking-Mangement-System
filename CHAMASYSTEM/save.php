<?php
include('database.php');
include('session.php');
mysqli_select_db($db,'transactions');
$paid=$_POST['paid'];
$code=$_POST['code'];
$status="Received";
$mode="Online";
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
}
$result = mysqli_query($db,"INSERT INTO savings(trans_By,amount,trans_Type,transaction_code,status) VALUES('$login_session','$paid','Savings','$code','$status')");
if($result){

    $results = mysqli_query($db,"UPDATE members SET status='Active' WHERE username='$login_session'");
    if($results){
        header('location:success.php'); 
        echo "<script type='text/javascript'>alert('Request sent successfully!!');</script>";
       }
   else
   echo "FAILED";
}
else
header('location:savings1.php');
echo "<script type='text/javascript'>alert('Request not sent successfully!!');</script>";
?>