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
    <title>Repayment | UG</title>
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
        <h1>LOAN REPAYMENT</h1>
        <form name="" action="repayment.php" method="POST">
          <p>Outstanding loan amount 

          <?php
             $con = mysqli_connect('localhost','root',''); 
             mysqli_select_db($con,'chama');
             $sql = "SELECT * FROM loans where trans_By='$login_session' order by date DESC  limit 1";
             $records = mysqli_query($con,$sql);
                 while($row = mysqli_fetch_array($records))
                 {
                     $currentBal=$row['current_bal'];
                     $formated_bal=number_format($currentBal, 2);
                     echo "KSh $formated_bal";
                     echo "<input type='hidden' name='currentBalanace' value='$currentBal'>";
                 }
          ?>
          </br><table><tr><td>
          <input type="submit" name="save" value="Repay"></td></form>
          <td><form nanme="cancel" action="loans.php">
              <input type="submit" name="cancel" value="Cancel"></form>
          </td></tr></table></p>
        
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

<?php 
/* 
//add() function with two parameter  
function add($x,$y)    
{  
$sum=$x+$y;  
echo "Sum = $sum <br><br>";  
}  
//sub() function with two parameter  
function sub($x,$y)    
{  
$sub=$x-$y;  
echo "Diff = $sub <br><br>";  
}  
//call function, get  two argument through input box and click on add or sub button  
if(isset($_POST['add']))  
{  
//call add() function  
 add($_POST['first'],$_POST['second']);  
}     
if(isset($_POST['sub']))  
{  
//call add() function  
sub($_POST['first'],$_POST['second']);  
}  
?> 
<form method="post">  
Enter first number: <input type="number" name="first"/><br><br>  
Enter second number: <input type="number" name="second"/><br><br>  
<input type="submit" name="add" value="ADDITION"/>  
<input type="submit" name="sub" value="SUBTRACTION"/> 
</form>
*/