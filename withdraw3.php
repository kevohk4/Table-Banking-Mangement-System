<?php
include('database.php');
include('session.php');
mysqli_select_db($db,'savings');
$amount=$_POST['amount'];
$phoneum=$_POST['phonenumber'];
$status="Approved";
$mode="Online";
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
}
$result = mysqli_query($db,"INSERT INTO savings(trans_By,amount,trans_Type,transaction_code,status) VALUES('$login_session','$amount','Withdraw Money','$phoneum','$status')");
if($result)
{
        header('location:success.php'); 
        echo "<script type='text/javascript'>alert('Request sent successfully!!');</script>";
}
else{
    header('location:withdraw1.php');
echo "<script type='text/javascript'>alert('Request not sent successfully!!');</script>";
}
?>