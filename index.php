<?php
include("config.php");
 session_start();
 if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($db,$_POST['username']);
    $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
    $sql = "SELECT username FROM customers WHERE username = '$username' and password = '$mypassword'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    if($count == 1) {
       session_start();
       $_SESSION['login_user'] = $username;
       header("location: indx.php");  
    }else {
       echo '<h1 style="color:red">Your Login id or Password is invalid please try again or register </h1>';
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <title>RS| index </title>
</head>
<body>
    <header>
    <h1>Roan Safaris Ltd</h1>
    <a><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="1d04">Login</button></a>
        
    </header>

    <h1>WELCOME TO ROAN SAFARIS YOUR FAVOURITE TOURS AND TRAVEL PARTNER</h1>
    <p>We have affordable tour packages <br>
    The packages available include:- </br>
    1. International travel packages</br>
    2. Business travel packages</br>
    3. Family and holiday packages</br>
    4. Wildlife Safari</p>
    <h1>Top destinations </h1>
    <?php
            $con = mysqli_connect('localhost','root','');
            mysqli_select_db($con,'roansafaris');
           
            $sql = "SELECT * FROM destination";
            
            $records = mysqli_query($con,$sql);
            ?>
    <?php
        while($row = mysqli_fetch_array($records)){
            echo "<form action=order.php method=post>";
            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="400" height="500">';
            echo "<input type=hidden name=name value='".$row ['name']."'>";
            echo "<input type=hidden name=id value='".$row ['country']."'>";
            echo "<input type=hidden name=type value='".$row ['description']."'>";
            echo "<input type=hidden name=price value='".$row ['ratings']."'>";
            echo '</br>';
            echo '<b> Name :'.$row ['name'].'</b>';
           
                        echo '</br>';
            echo '<b> Country :'.$row ['country'].'</b>';  echo '</br>';
            echo '<b>Description :'.$row ['description'].'</b>';  echo '</br>';
            echo '<b>Ratings :'.$row ['ratings'].'</b>';
            echo '</br>';
            echo '<input type=submit value=More:->';  echo '</br>'; echo '</br>';
                    echo "</form>";}?>
    <section>
<div id="id01" class="modal">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <section id="loginbox">
         <div class="loginbox">
        <h1>Login</h1>
     <form name="log_in" action="" method="post">
        <p>Username</p>
        <input type="text" name="username" placeholder="username" required> </br>
        <p>Password  </p>
        <input type="password" name="password" placeholder="password"required> </br>
        <a href="#">Forgot your password?</a> <a href="accountcreate.php">create new account</a> </p> </br>  
        <input type="submit" name="login" value="Login"> 
     </form>
<br>      
     </div>   
    </section>
<script>
var modal = document.getElementById('id01');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

    </section>
    <footer>
            Social media handles<br>
            <a href="#"><img src="img/facebook.png"  width="30" height="30"></a>
            <a href="#"><img src="img/likedin.PNG" width="30" height="30"></a>
            <a href="#"><img src="img/twiter.PNG" width="30" height="30"></a>
            <a href="#"><img src="img/youtube.PNG" width="30" height="30"></a>
                <br>
                        <a href="Contact.html">Contact</a> |
                        <a href="terms.html">Terms of service</a> |
                        <a href="appdownload.html">Our App</a> 
               <br>
                Roan Safaris Ltd.   &copy;2021 <br>
                Powered by Kevoh softwares    
    </footer>  
</body>
</html>