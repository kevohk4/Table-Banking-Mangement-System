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
        <h1>WITHDRAW</h1>
        <?php
        mysqli_select_db($db,'services');
        if($db -> connect_error){
            die("connection failed:".$conn->connect_error);
        }
        $result = mysqli_query($db,"SELECT * FROM members  where username='$login_session'");
        echo "<table><tr>
        <td>Account holder's name:".$row['name']."</td></tr>
        <tr><td>Account opened on:".$row['date']."</td></tr><tr>
        <td>Account number:".$row['member_id']."</td></tr></table>";
        ?>
        <div class="navig">
        <table>
        <tr>
        <td><a href="savings1.php">Savings</a></td>
        <td><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="1d04">Check bal</button></a></td>
        <td><a href="transfer.php">Transfer</a></td><td><a href="loans.php">Loans</a></td>
        </tr>
        </table>
        <form name="" action="withdraw1.php">
        <?php
            include('balance.php');
            $amount=$Tbalance;           
            if($amount >= 100){
                $formated_amount=number_format($amount,2);
                echo "
                <p><b style='font-size:15px; color: blue'>TOTAL SAVINGS </b> <b>KSh $formated_amount
                </b></br>
                <p><B>withdraw from savings kitty</b></br> <input type='submit' name='withdraw' value='Withdraw'></p>
                </p>
                </form>
                ";
            }
            else{
                echo "<p style='color:red'>There is not enough money in your savings kitty to withdraw  </p>";
            }
       ?>
        </form>
        </div>
        </div>
        <div id="id01" class="modal">
  <div class="modal-content animate" >
  <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
  <?php
  include('balance.php');  
  // Balance file is included because it contains the calculations of finding the balance.
  $formated_balance=number_format($Tbalance, 2);
       echo "<h2 style='color:back;font-size:50px;margin-left: 20px'>Current Balance Ksh $formated_balance </h2>";
        ?>
</div>
</div>
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