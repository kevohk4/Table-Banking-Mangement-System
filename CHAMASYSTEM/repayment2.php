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
        <h1>REPAY LOAN</h1>
        <table>
            <tr>
            <th>
                <form method='post' action='repayloanacc.php'>
                <?php
                $repay=$_POST['amount'];
                $current_bal=$_POST['currentbal'];
                echo"
                Repay loan from my account's savings
                <input type='hidden' name='amount' value='$repay'>
                <input type='hidden' name='currentbal' value='$current_bal'>
                <table><tr><td>
                <input type='submit' name='' value='Repay'>
                </form></td>
                <td><form nanme='cancel' action='loans.php'>
                <input type='submit' name='cancel' value='Cancel'></form>
                </td>"
                ;
                ?>

                </form>
            </th>
            <th> </th>
            <th><!--
                <form method='post' action='repaymentf.php'>-->
                <?php /*
                $repay=$_POST['amount'];
                $current_bal=$_POST['currentbal'];
                echo " Repay loan through M-PESA
                <input type='hidden' name='amount' value='$repay'>
                <input type='hidden' name='currentbal' value='$current_bal'>
                <input type='submit' name='' value='M-PESA'>";*/
                ?>
               </form>
            </th>
            </tr>
            </table>
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