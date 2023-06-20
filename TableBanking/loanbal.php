<?php
//session_start();
$user_check = $_SESSION['login_user'];
       $con = mysqli_connect('localhost','root',''); 
       mysqli_select_db($con,'chama');
       $sql = "SELECT current_bal FROM loans where trans_By='$user_check' order by trans_ID DESC  limit 1";
       $records = mysqli_query($con,$sql);
       while($row = mysqli_fetch_array($records))
       {
         $loan_bal=$row['current_bal'];
       }
?>