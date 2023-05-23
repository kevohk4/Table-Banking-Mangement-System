<?php
include('database.php');
include('session.php');
mysqli_select_db($db,'transactions');
$trancode=$_POST['transactcode'];
$tranid=$_POST['transId'];
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
}

    $results = mysqli_query($db,"UPDATE savings SET transaction_code='$trancode', status='Approved' WHERE trans_ID='$tranid'");
    if($results){
        header('location:success1.php'); 
        echo "<script type='text/javascript'>alert('Request sent successfully!!');</script>";
       }
   else
   header('location:success.php'); 
   echo "<script type='text/javascript'>alert('Request sent successfully!!');</script>";
  // echo "FAILED";

//else
//header('location:savings1.php');
//echo "<script type='text/javascript'>alert('Request not sent successfully!!');</script>";
?>