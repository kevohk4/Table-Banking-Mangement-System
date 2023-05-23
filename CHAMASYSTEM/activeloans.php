<?php
include('database.php');
include('session.php');
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="stylo.css">
    <link rel="stylesheet" href="admin.css">
    <title>MEMBERS' SAVINGS | UG</title>
</head> 
<body>
     <header>
     <div id="mainbox" onclick="openFunction()">&#9776;</div>
     <div id="title"></h1>UNITY GROUP</h1></div>
     <p>Logged in, <a href=""><?php echo $login_session;?></a>  </p>
     <div id="menu" class="sidemenu">
     <a href="">Help</a>
     <a href="logout.php">Logout</a>
     <a href="#" class="closebtn" onclick="closeFunction()">&times;</a>
     </div>
    </header>
    <div class="nav">
</br></br>
<button ><a style='color:white' href='adminpanel.php'>Back</a></button><!--
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="1d04">Add member</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" id="1d05">Search member</button>-->
</div>
<div class="team">
<h4>LOAN TRANSACTIONS</h4></div>
<div class="members">
<?php
 $con = mysqli_connect('localhost','root',''); 
 mysqli_select_db($con,'chama');
 $sql = "SELECT * FROM savings where trans_Type='Loan request'";
 $records = mysqli_query($con,$sql);
 ?>
 <table >
     <tr>
         <th>TRANSACTION ID</th>
         <th>TRANSACTED BY</th>
         <th>DATE</th>
         <th>AMOUNT REQUESTED</th>
     </tr>
<?php
while($row = mysqli_fetch_array($records))
{
 echo "<tr bgcolor='white' border='3'"
 ."bordercolor='black' "
 ."cellspacing='0'><form action=withdraprocessing.php method=POST>";
 echo '<td>'.$row['trans_ID'].'</td>';
 echo "<input type='hidden' name='transactionId' value=".$row['trans_ID'].">";
 echo  '<td>'.$row['trans_By'].'</td>';
 echo '<td>'.$row['date'].'</td>';
 //echo '<td>'.$row['transaction_code'].'</td>';
 $amount=$row['amount'];
 $formated_amount=number_format($amount,2);
 echo '<td>KSh '.$formated_amount. '</td>';
  /*
 $status=$row['status'];
 if($status=='Active'){
    echo'<input type="submit" value="APPROVE">';
   // <b style="color:green"
 }
 else {
    // echo'<b style="color:red">CONFIRM</b>';
     echo'<input type="submit" value="PROCESS">';
 }
 echo "</td>";
         echo "</form>*/echo "</tr>";
     }
?>
 </table>
 </div>
</body>
</html>
<script type="text/javascript">
function openFunction(){
document.getElementById("menu").style.width="300px";  
document.getElementById("incline").style.marginleft="200px";
}
function closeFunction(){
document.getElementById("menu").style.width="0px";
document.getElementById("mainbox").style.marginleft="0px";
document.getElementById("mainbox").innerHTML="&#9776;";
}
</script>
