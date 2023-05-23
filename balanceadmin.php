<?php
//session_start();
$user_check = $_SESSION['login_user'];
       $con = mysqli_connect('localhost','root',''); 
       mysqli_select_db($con,'chama');
       $sql = "SELECT sum(amount) AS 'Total' FROM savings where trans_Type = 'Savings'";
       $records = mysqli_query($con,$sql);
       while($row = mysqli_fetch_array($records))
       {
         $savings_amount=$row['Total'];
       }
       $sql = "SELECT sum(amount) AS 'Total' FROM savings where trans_Type = 'Withdraw Money'";
       $records = mysqli_query($con,$sql);
       while($row = mysqli_fetch_array($records))
       {
         $withdraw=$row['Total'];
       }
       $sql = "SELECT sum(amount) AS 'Total' FROM savings where trans_Type = 'Receive money' ";
       $records = mysqli_query($con,$sql);
       while($row = mysqli_fetch_array($records))
       {
         $received=$row['Total'];
       }
       $sql = "SELECT sum(amount) AS 'Total' FROM savings where trans_Type = 'Loan request'";
       $records = mysqli_query($con,$sql);
       while($row = mysqli_fetch_array($records))
       {
         $loanrequest=$row['Total'];
       }

       $sql = "SELECT sum(amount) AS 'Total' FROM savings where trans_Type = 'Money Transfer'";
       $records = mysqli_query($con,$sql);
       while($row = mysqli_fetch_array($records))
       {
         $transfer=$row['Total'];
       }


       $sql = "SELECT sum(amount) AS 'Total' FROM savings where trans_Type = 'Loan repayment'";
       $records = mysqli_query($con,$sql);
       while($row = mysqli_fetch_array($records))
       {
         $loanrepayment=$row['Total'];
       }

       $Tbalance=(($savings_amount+$received+$loanrequest)-($withdraw+$transfer+$loanrepayment));
        ?>