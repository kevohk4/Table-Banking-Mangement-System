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
    <title>Money transfer | UG</title>
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
    $memberId=$login_session;
    $amount=$_POST['amount'];
    $accountno=$_POST['accountno'];
    $memberId=$_POST['memaccount'];
    $sql = "SELECT username,member_id FROM members WHERE member_id = '$accountno'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
      if($count == 1) {
        if($accountno == $memberId){
          $tranBy=$row['username'];
            echo '<h1 style="color:red">You cannot transfer money to your own account!! </h1>
            <p><a href="transfer.php">BACK</a></p>';
        }
        else{
            $formated_amount=number_format($amount,2);
            echo "
            <p style='color:blue'><h1>Transfer Ksh $formated_amount to account $accountno </b></h1>
            <table>
                <tr> 
            <form method='post' action='transfer3.php'>
            <input type='hidden' name='amount' value='$amount'></p></a>
            <input type='hidden' name='accountno' value='$accountno'></p></a>
            <p><td><input type='submit' name='submit' value='Confirm'></td></p>
            </form>";
            echo "<form name='cancel' action='transfer.php'>
            <p><td> <input type='submit' name='submit' value='Cancel'></td></p>
            </form></tr></table>";
        }
      }
      else {
        echo '<h1 style="color:red">Account does not exist try again!! </h1>
        <p><a href="transfer.php">BACK</a></p>';
      }   
?>