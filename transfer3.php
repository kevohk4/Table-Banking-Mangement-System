<?php
include('database.php');
include('session.php');
mysqli_select_db($db,'savings');
$amount=$_POST['amount'];
$account=$_POST['accountno'];
$status="Approved";
$mode="Online";
$sql = mysqli_query($db,"SELECT * FROM  members WHERE member_id='$account'");
$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
$username=$row['username'];
echo $username;
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
}
$result = mysqli_query($db,"INSERT INTO savings(trans_By,amount,trans_Type,transaction_code,status) VALUES('$login_session','$amount','Money Transfer','$account','$status')");
if($result)
{
        $result = mysqli_query($db,"INSERT INTO savings (trans_By,amount,trans_Type,transaction_code,status) VALUES('$username','$amount','Receive money','$login_session','$status')");
        if($result){
       header('location:success.php'); 
        echo "<script type='text/javascript'>alert('Request sent successfully!!');</script>";
        }
        else{
           echo "Not updated";
        }
}
else{
    header('location:savings1.php');
echo "<script type='text/javascript'>alert('Request not sent successfully!!');</script>";
}
?>