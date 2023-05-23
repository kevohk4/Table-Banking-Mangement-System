<?php
include('database.php');
include('session.php');
mysqli_select_db($db,'transactions');
$con = mysqli_connect('localhost','root',''); 
mysqli_select_db($con,'chama');
$sql = "SELECT * FROM loans where trans_By='$login_session' order by date DESC  limit 1";
$records = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($records))
    {
        $currentBal=$row['current_bal'];
        $prevBal=$row['previous_Bal'];
    }
$amount=$_POST['amount'];
$period=$_POST['period'];
$period=$_POST['period'];
$amount_request=$_POST['amount_requested'];
$transType="Loan request";
$prevBal=$currentBal;
$status="Approved";
$newCurrentBal= $prevBal + $amount;
$paid=0;
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
}
$result = mysqli_query($db,"INSERT INTO loans(trans_By,amount,payment_mode,trans_Type,period_Months,previous_Bal,paid,current_bal,status) VALUES('$login_session','$amount','$payment_mode','$transType','$period','$prevBal','$paid','$newCurrentBal','$status')");
if($result){
    $result = mysqli_query($db,"INSERT INTO savings(trans_By,amount,trans_Type,transaction_code,status) VALUES('$login_session','$amount_request','Loan request','N/A','$status')");
    if($result){
     header('location:success.php'); 
     echo "<script type='text/javascript'>alert('Request sent successfully!!');</script>";
    }
    else {

    }
}
else
echo "<script type='text/javascript'>alert('Request not sent successfully!!');</script>";
    //header('location:request.php');
?>