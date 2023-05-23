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
    <link rel="stylesheet" href="stylpo.css">
    <link rel="stylesheet" href="admin.css">
    <title>MEMBERS' SAVINGS | UG</title>
</head> 
<body>
     <header>
     <div id="mainbox" onclick="openFunction()">&#9776;</div>
     <div id="title"></h1>UNITY GROUP</h1></div>
     <p>Logged in, <a href=""><?php echo $login_session;?></a>  </p>
     <div id="menu" class="sidemenu">
     <a href="">Help</a>
     <a href="logout.php">Logout</a>
     <a href="#" class="closebtn" onclick="closeFunction()">&times;</a>
     </div>
    </header>
    <div class="nav">
</br></br>
<button ><a style='color:white' href='adminpanel.php'>Back</a></button><!--
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="1d04">Add member</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" id="1d05">Search member</button>-->
</div>
<div class="team">
<h4>MEMEBERS SAVINGS</h4>

<div class="members">
<p>Name</p>
<input type="text" name="name">
<p>Amount<p>
<input type="number" name="name">
</br>
<input type="submit" name="name">


