<?php
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css">
    <title>Home | UG</title>
</head> 
<body>
     <header>
     <div id="mainbox" onclick="openFunction()">&#9776;</div>
     <div id="title"></h1>UNITY GROUP</h1></div>
     <div id="menu" class="sidemenu">
     <a href="about.php">About</a>
     <a href="signin.php">Login</a>
     <a href="adminlogin.php">Administrator</a>
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
        <h1>WELCOME TO UNITY GROUP</h1>
        <p>This is a self help group formed with the intention of helping in 
            promoting social and financial welfare of people through table banking. </p>
            <form name="subscription" action="subscription.php" method="POST">
            <p><b>
            <input type="email" name="email" placeholder="Email" autocomplete="off"><input type="submit" name="submit" value="Subscribe">
        </b>
        </p>
        </form>
    </div>
    <div id="middle">
        <h1>UNITY GROUP SAVINGS ACCOUNT</h1>
        <p><a href=signin.php><img src='web/deposit.PNG' width='300px' height='300px'></br><b>Create Savings Account</b></a></p>
    </div>
    <div id="bottom">
        <h1>About Us</h1>
        <p>Table Banking provides members with the opportunity of taking credit in the 
            form loans without having any collateral while in conventional banking for somebody 
            to have access credit in the form to loans they will need to have collateral 
            for example land title deeds or car log books. Table Banking is achieved when a group 
            of people decide to create a kitty and make contributions during their planned
            meetings after some specified period of time. There are rules which guide 
            on how the Table Banking system operates as specified by members. These rules 
            guide on loan requests, loan repayment and cash deposits to the kitty by the members. 
            The objective of Table Banking is to help the poor, particularly women, 
            fight poverty and stay financially sound.</p>
        <p><a href=signin.php><img src='web/loan.jpg' width='300px' height='300px'></br><b>Request loans</b></a></p>
    </div>
    <div id="footer"> 
<div class="fb">
  <a href= "#" >facebook</a>
</div></br>
<div class="tw">
  <a href= "#" >twitter</a>
</div></br>
  <div class="ig">
  <a href= "#" >instagram</a>
</div>
<p>Unity Group Copyright 2021-2022</p>
</div>
</footer>
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