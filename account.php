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
    <link rel="stylesheet" href="stylo.css">
    <title>Account | UG</title>
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
        <h1>MY ACCOUNT</h1>
        <?php
        mysqli_select_db($db,'services');
        if($db -> connect_error){
            die("connection failed:".$conn->connect_error);
        }
        $result = mysqli_query($db,"SELECT * FROM members  where username='$login_session'");
        echo "<table>
        <tr><td>Account holder's name:".$row['name']."</td></tr>
        <tr><td>Account opened on:".$row['date']."</td>
        </tr><tr><td>Account number:".$row['member_id']."</td></tr>
        </table>";
        ?>
        <div class="navig">
        <table><tr>
        <td><a href="savings1.php">Savings</a></td><td><a href="withdraw.php">Withdraw</a></td><td><a href="transfer.php">Transfer</a></td><td><a href="loans.php">Loans</a></td>
        </tr></table>
        </div>
        </div>
        <div id="middle">
        <?php 
         $result = mysqli_query($db,"SELECT * FROM savings where trans_By ='$login_session' order by date DESC");
            ?>
            <table >
                <tr>
                    <th>TRANS ID</th>
                    <th>DATE</th>
                    <th>TRANS TYPE</th>
                    <th>AMOUNT</th>
                    <th>DETALS</th>
                </tr>
           <?php
            while($row = mysqli_fetch_array($result)){
            echo "<form action=transactiondetails.php method=post>";
            echo '<td>'.$row['trans_ID'].'</td>';
            echo "<input type='hidden' name='transactionId' value=".$row['trans_ID'].">";
            echo  '<td>'.$row['date'].'</td>';
            echo '<td>'.$row['trans_Type'].'</td>';
            $amount=$row['amount'];
            $formated_amount=number_format($amount, 2);
            echo '<td>Ksh '.$formated_amount. '</td>';
            echo "<div class='account-button'>";
            echo "<td> <b> <input type='submit' value='More Details:-'></b>";
            echo "</div>";
            echo "</form></tr>";
                }
    ?>
    <tr><td> </td><td> </td><td><b>CURRENT BALANCE</b></td>
    <td><b><?php
            include('balance.php');
            //$Tbalance is the balance in the kitty 
            // Balance file is included because it contains the calculations of finding the balance.
            $formated_balance=number_format($Tbalance, 2);
            echo "KSh $formated_balance"; 
            ?></b></td>
            </tr>
            </table>
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