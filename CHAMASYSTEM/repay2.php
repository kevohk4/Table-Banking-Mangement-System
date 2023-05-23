<?php
include('database.php');
include('session.php');
mysqli_select_db($db,'transactions');

$amount_paid=$_POST['amountpaid'];
echo $amount_paid;
$currentbal=$_POST['currentBal'];
$transType="Loan Repayment";
$payment_mode="Online";
$period="N/A";
$prevBal=$currentbal;
$paid=$amount_paid;
$current_bal=$prevBal - $amount_paid;
$status="Received";
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
}
$result = mysqli_query($db,"INSERT INTO loans(trans_By,amount,payment_mode,trans_Type,period_Months,previous_Bal,paid,current_bal,status) VALUES('$login_session','$amount_paid','$payment_mode','$transType','$period','$prevBal','$paid','$current_bal','$status')");
if($result){

    $result = mysqli_query($db,"INSERT INTO savings(trans_By,amount,trans_Type,transaction_code,status) VALUES('$login_session','$paid','Loan repayment','Repay loan','$status')");
    if($result){
    header('location:success.php');
    echo "<script type='text/javascript'>alert('Request sent successfully!!');</script>";
}
else{

}
}
else{
include "request.php";
  echo "<script type='text/javascript'>alert('Request not sent successfully!!');</script>";
  header('location:account.php');
}
?>