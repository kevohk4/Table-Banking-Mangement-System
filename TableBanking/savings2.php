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
    <title>DEPOSIT | UG</title>
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
        <?php
        $fdeposit=$_POST['amount'];
        if($fdeposit>100000){
            echo "
            <h1>Maximum deposit is Ksh 100,000 </br> <a style='font-size:20px' href='savings.php'>BACK</a></h1>";
        }
        else {
            echo " <h1>DEPOSIT TO YOUR KITTY</h1>";
            mysqli_select_db($db,'members');
            if($db -> connect_error){
            die("connection failed:".$conn->connect_error);
             // Code for changing the membership statuts after depositing some amount to the kitty
            }
    $result = mysqli_query($db,"SELECT * FROM members where username='$login_session'");
    $status=$row['status'];
    if($status=='Not Active'){
    $repayment=number_format($fdeposit, 2);
    echo "
    <form method='post' action='save.php'>
    <p>Pay <b>Ksh".$repayment."</b> and enter the transaction code</p></a>
    <div class='sedrvice'>
    <input type='hidden' name='cloan' value='None'>
    <p>Enter M-pesa transaction code
    <input type='hidden' name='paid' value='$fdeposit'>
    <input type='text' name='code' required autocomplete='off'></p>
    <p><input type='submit' name='submit' value='Complete'></p>
    </form>
    </div>";
     }
    else{
        $repay=$_POST['amount'];
        $repayment=number_format($repay, 2);
    echo "
    <form method='post' action='save.php'>
    <p>Pay <b>Ksh".$repayment."</b> and enter the transaction code </p></a>
    <div class='sedrvice'>
    <p>Enter M-pesa transaction code
    <input type='hidden' name='paid' value='$repay'>
    <input type='text' name='code' autocomplete='off' required></p>
    <p><input type='submit' name='submit' value='Complete'></p>
    </form>
    </div>";
    }
} ?></div>
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