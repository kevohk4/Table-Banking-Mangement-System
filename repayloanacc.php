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
    <title>Repayment | UG</title>
</head> 
<body>
     <header>
     <div id="mainbox" onclick="openFunction()">&#9776;</div>
     <div id="title"></h1>UNITY GROUP</h1></div>
     <p>Logged in, <a href=""><?php echo $login_session;?></a>  </p>
     <div id="menu" class="sidemenu">
     <a href="profile.php">My profile</a>
     <a href="user.php">Menu</a>
     <a href="">Help</a>
     <a href="logout.php">Logout</a>
     <a href="#" class="closebtn" onclick="closeFunction()">&times;</a>
     <footer>
            <p><a href="#"><img src="img/facebook.png"  width="30" height="30"></a>
            <a href="#"><img src="img/likedin.PNG" width="30" height="30"></a>
            <a href="#"><img src="img/twiter.PNG" width="30" height="30"></a>
            <a href="#"><img src="img/youtube.PNG" width="30" height="30"></a></p>
                <br>
               <br>
               <b>UnitySelfHelpGroup &copy;2021 </br>
                Powered by Kevin Odhiambo </b> 
    </footer>
     </div>
    </header>
    <div id="introduction">
        <h1>REPAY LOAN</h1>
        <?php
         $repay=$_POST['amount'];
         $current_bal=$_POST['currentbal'];
         $formated_repay=number_format($repay, 2);
         include('balance.php');
         $amount_bal=$Tbalance;
         $formated_balance=number_format($Tbalance, 2);
        if($repay  > $amount_bal){
            echo "<p style='color:red'><b>Not enough money in your account to repay loan. Your balance is Ksh $formated_balance </b> </p>";
            echo " <p><a href='loans.php'>BACK</a></p>'";
        }
        else{
            echo "
            <form method='post' action='repay2.php' method='POST'>
            <p><b> Ksh $formated_repay </b> to be deducted from your account to repay your loan";
            echo "
            <input type='hidden' name='amountpaid' value='$repay'>
            <input type='hidden' name='currentBal' value='$current_bal'>
            <table><tr>
            <td><input type='submit' name='submit' value='Confirm'></form></td>
            <form name='cancel' action='loans.php'>
            <td><input type='submit' name='submit' value='Cancel'></td></tr></form></table>";}
        ?> </div>
</body>
</html>
<script type="text/javascript">
function openFunction(){
    document.getElementById("menu").style.width="300px";  
    document.getElementById("mainbox").style.marginleft="200px";
}
function closeFunction(){
    document.getElementById("menu").style.width="0px";
    document.getElementById("mainbox").style.marginleft="0px";
    document.getElementById("mainbox").innerHTML="&#9776;";
    }
</script>