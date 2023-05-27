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
    <title>Withdraw | UG</title>
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
        <h1>WITHDRAW MONEY</h1>
        <p>  
        <?php
        include('balance.php');
        $savingsBalance=$Tbalance;
            $formate_savings=number_format($savingsBalance, 2);
          //  echo $formated_amount;   
        echo "
        <table>
        <tr>
        <form method='post' action=''>
        <p>Enter amount <input type='number' name='amount' required></p></a>
        <input type='hidden' name='savings' value=".$savingsBalance.">
        <p> <td><input type='submit' name='submit' value='Next'></td></p>
        </form>
        <form method='post' action='withdraw.php'>
        <p><td><input type='submit' name='submit' value='Cancel'></td></p>
        </form></tr></table>";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $amount = mysqli_real_escape_string($db,$_POST['amount']);
            $savings = mysqli_real_escape_string($db,$_POST['savings']);
            $formated_amount=number_format($amount,2);
            if($amount>$savings){
                echo "<p style='color:red'><b>You do not have enough money in your savings kitty to withdraw Ksh $formated_amount </b> <br><br>
                Savings account balance is Ksh $formate_savings</p>";
            }
            else if($amount<50){
                echo "<p style='color:red'><b>Least amount you can withdrwa is Ksh 50.00 </b> <br><br>";
            }
            else{
                echo "
                <p style='color:blue'><h1>Withdraw Ksh $formated_amount </b></h1>
                <table><tr> 
                <form method='post' action='withdraw2.php'>
                <input type='hidden' name='amount' value='$amount'></p></a>
                <p><td><input type='submit' name='submit' value='Confirm'></td></p>
                </form>";
                echo "<form name='cancel' action='withdraw1.php'>
                <p><td> <input type='submit' name='submit' value='Cancel'></td></p>
                </form></tr></table>";
            }
        }
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