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
    <title>REQUESTLOAN | UG</title>
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
        <h1>REQUEST LOAN</h1>
        <?php
        include('loanlimit.php');
        if($loans<=0){
            echo "<p>Loan are not available at the moment
            <form name='' action='loans.php'>
                <p><input type='submit' name='back' value='Back'></form></p>
                ";
        }
        else{
        echo "
        <form name=;loanrequest' action='' method='POST'>
        <p>Enter amount <input type='number' name='amount' required></p>
        <P>Period <select name='period' required>
            <option value=''>Select period:-</option>
            <option value='1'>1 Month</option>
            <option value='2'>2 Months</option>
            <option value='3'>3 Months</option>
            <option value='4'>4 Months</option>
            <option value='5'>5 Months</option>
            <option value='6'>6 Months</option>
            <option value='12'>1 Year</options>
            </select></p><p><input type='submit' name='button' value='REQUEST'></p>
        </form>";
         if($_SERVER["REQUEST_METHOD"] == "POST") {
            $amount = mysqli_real_escape_string($db,$_POST['amount']);
            $period = mysqli_real_escape_string($db,$_POST['period']);
            $formated_amount=number_format($amount, 2); // Amount rounded off to the nearest two decimal points.
            // number_format() function used to round of to the nearest 2 decimal points.
            if($amount <100){
                echo "<p>KSh $formated_amount is below minimum loan limit of Ksh 100.00</p>";
                //Message
            }
            else if($amount > $loans/4){
                $maxloan=($loans/4);
                $formated_max=number_format($maxloan,2);
                echo "<p>Ksh $formated_amount is above Maximum loan limit of Ksh $formated_max </p>
                <form name='' action='loans.php'>
                <p><input type='submit' name='back' value='Back'></form> ";
            }
            else{
            echo "<p>Amount Ksh$formated_amount</p>";
            echo "<p>Loan due after $period month(s)</p>";
            $interest = 18;
            echo "<p>Simple interest of $interest % </p>";
            $time=($period/12);
            $rate=($interest/100);
            $SI=($amount*$rate*$time);// Calculating simple interest
            $amountdue=$amount+$SI; // Amount due shoud be formated to the nearest 2 decimal places.
            $formated_amount_due=number_format($amountdue, 2);
            echo "<p> Amount due after $period month(s) is Ksh $formated_amount_due </p>";
            echo " <form method='post' action='loanapp.php'>
            <div class='sedrvice'>
            <input type='hidden' name='amount' value='$amountdue'>
            <input type='hidden' name='amount_requested' value='$amount'>
            <input type='hidden' name='period' value='$period'>
            <input type='hidden' name='paid' value=''>
            <p><input type='submit' name='submit' value='Complete'></p>
            </form>
            </div>";}
        }}
        ?>
    </div>
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