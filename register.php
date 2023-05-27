<?php
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css">
    <title>Signup | MSHG</title>
</head> 
<body>
     <header>
     <div id="mainbox" onclick="openFunction()">&#9776;</div>
     <div id="title"></h1>UNITY GROUP</h1></div>
     <div id="menu" class="sidemenu">
     <a href="index.php">Home</a>
     <a href="login.php">Login</a>
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
        <h1>Signup</h1>
        <form name="registration" action="signup.php" method="POST">
        <p><b>Username</b> <input type="text" name="username" required></p>
        <p><b>Name</b> <input type="text" name="name" required></p>
        <p><b>Email </b> <input type="text" name="email" required></p>
        <p><b>Phone number</b> <input type="text" name="phone" required></p>
        <p><b>Address</b> <input type="text" name="address" required></p>
        <p><b>Password </b><input type="password" name="password" required></p>
        <p><b>Confirm Password </b><input type="password" name="confirmpassword" required></p>
        <p><a href="login.php">Have an account?</a></p>
        <p><input type="submit" name="submit" value="Submit"></p>
        </form>
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