<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <title>RS| Home </title>
</head>
<h1>User:<?php echo $login_session;?> </h1>
<body>
    
<header>
<div id="mainbox" onclick="openFunction()">&#9776;</div>
<div id="menu" class="sidemenu">
<a href="timeline.php">Timeline</a>
<a href="booking.php">Bookings</a>
<a href="gallery.php">Gallery</a>
<a href="#">New destinations</a>
<a href="#">Cancel booking</a>
<a href="#">Help</a>
<a href="#">Logout</a>
<a href="#" class="closebtn" onclick="closeFunction()">&times;</a>
<p style="font-size:17px">
<img src="" height="50px" width="50px"></br>Trusted travelling partner </br> Explore magical Kenya 
</br> and mother Africa by choosing us. </br> Email us at <email>info@roansafaris@gmail.com</email> </p>

</div>  
        <h1>Roan Safaris Ltd</h1>
      
       
</header>

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
</br>
<div style="float: right;">
      <input type="search" name="search">
      <input type="button" name="button" value="Search">
</div></br></br> <hr>

<h1>ROAN SAFARIS YOUR FAVOURITE TOURS AND TRAVEL PARTNER</h1>
    <h1><a href="">PROFILE</a>| <a href="">POST</a>| <a href="">FRIENDS</a>| <a href=""> EVENTS</a>| </h1> </br>
    <?php
            $con = mysqli_connect('localhost','root','');
            mysqli_select_db($con,'roansafaris');
           
            $sql = "SELECT * FROM plartform where username='$login_session'";
            
            $records = mysqli_query($con,$sql);
            ?>
    <?php
        while($row = mysqli_fetch_array($records)){
            echo "<form action=order.php method=post>";
            echo '</br>'; echo '</br>';
            echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="400" height="500">'; echo '</br>';
            echo '<b>'.$row ['comment'].'</b>';
                        echo '</br>';
            echo '<b> Likes :'.$row ['likes'].'</b>';  echo '</br>';
          }?>