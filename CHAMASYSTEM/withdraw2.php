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
        <p><?php
        $transfer=$_POST['amount'];
        mysqli_select_db($db,'savings');
        if($db -> connect_error){
        die("connection failed:".$conn->connect_error);
        }
        $result = mysqli_query($db,"SELECT member_id,username,phone_number FROM members where username='$login_session'");
        while($row = mysqli_fetch_assoc($result)){
        $memberId=$row['member_id'];
        $pnoneno=$row['phone_number'];
        }
        echo"
        <form method='POST' action='withdraw3.php'>
        <p>Withdraw <b>Ksh ".$transfer."</b> and send to phone number <b>".$pnoneno." </b></br>
        <b>You can edit pnone number below to ensure there is accuracy</b>
        <input type='hidden' name='amount' value='$transfer'>
        <input type='number' name='phonenumber' value='$pnoneno' required>
        <p><input type='submit' name='submit' value='Complete'></p>
        </form>";
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