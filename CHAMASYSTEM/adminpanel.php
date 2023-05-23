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
    <title>ADMINPANEL | UG</title>
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
<div class="team">
<h4>ADMIN DASHBOARD</h4>
<div class='product_wrapper'>
<a href='admin.php'>
<?php $result = mysqli_query($db,"SELECT count(username) AS 'Total' FROM members ");
while($row = mysqli_fetch_array($result)){$total_members=$row['Total'];}?>
<div class='image'><img src='web/avatar.png' width='200px' height='80px'></div>   
<div class='name'><?php echo $total_members ?> Members</div>
</a>
</div><div class='product_wrapper'>
<a href='membersaving.php'>


<?php
 include('balanceadmin.php');
 $formated_total=number_format($Tbalance, 2);

?>


<input type='hidden' name='code' value=Bcr />
<div class='image'><img src='web/deposit.png' width='200px' height='80px'></div> 
<?php 
$formated_total=number_format($Tbalance, 2); ?>
<div class='name'>Total Savings Ksh <?php echo $formated_total ?></div>
</a>
<a href="managewithdrawals.php">
</div><div class='product_wrapper'>
<form method='post' action=''>
<input type='hidden' name='code' value=Kb3 />
<div class='image'><img src='web/withdrawal.png' width='200px' height='80px'></div>   
<div class='name'>Manage member's withdrawals</div></a>
</form>
<a href="activeloans.php">
</div><div class='product_wrapper'>
<form method='post' action=''>
<?php $result = mysqli_query($db,"SELECT sum(amount) AS 'Total' FROM savings where trans_Type='Loan request' ");
while($row = mysqli_fetch_array($result)){
    $total_request=$row['Total'];
}

$result = mysqli_query($db,"SELECT sum(amount) AS 'Total' FROM savings where trans_Type='Loan repayment'");
while($row = mysqli_fetch_array($result)){
    $total_repayment=$row['Total'];
}
$total_loans = (( $total_request-$total_repayment)/7);
$formated_loans=number_format($total_loans, 2);
?>

<input type='hidden' name='code' value=Kenh1 />
<div class='image'><img src='web/loan.jpg' width='200px' height='80px'></div>   
<div class='name'>Total loans Ksh <?php echo $formated_loans ?></div></a>
</form>
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