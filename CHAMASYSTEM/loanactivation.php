<?php
include('database.php');
include('session.php');
mysqli_select_db($db,'loans');
$mode="Online";
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
}
$result = mysqli_query($db,"INSERT INTO loans(trans_By,amount,payment_mode,trans_Type,period_Months,previous_Bal,paid,current_bal,status) VALUES('$login_session','00.00','Online','Activate loan account','N/A','00.00','00.00','00.00','Approved')");
if($result){
header('location:loans.php');
echo "<script type='text/javascript'>alert('Request sent successfully!!');</script>";
}
else{
   echo "Not updated";
   header('location:loans.php');
}
?>
