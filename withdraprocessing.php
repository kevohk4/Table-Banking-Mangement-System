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
    <title>Process Withdrawals | UG</title>
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
        <div id="middle">
        <h2><a style="padding-top:20px; font-size:20px;color:green; margin-top:100px"href="managewithdrawals.php"><b>BACK</b></a></h2>
            <h1>PROCESS TRANSACTION</h1>     
        <?php
        mysqli_select_db($db,'services');
        if($db -> connect_error){
            die("connection failed:".$conn->connect_error);
        }
        $transactionId=$_POST['transactionId'];

        $result = mysqli_query($db,"SELECT * FROM savings where trans_ID='$transactionId'");
            ?>
    <?php
        while($row = mysqli_fetch_array($result))
        {
            echo "<form action=withdrawsend.php method=post>";
            echo "<table tyle='background-color:maroon'>
            ";
            echo "<tr><th>Transaction Id </th>";
            echo '<td>'.$row['trans_ID'].'</td>';
            echo " <input type='hidden' name='transId' value=".$row['trans_ID'].">";
            echo "<tr><th>Date</th>";
            echo '<td>'.$row['date'].'</td>';
            echo "<tr><th>Transacted by</th>";
            echo '<td>'.$row['trans_By'].'</td>';
            echo "<tr><th>Transaction Type</th>";
            echo '<td>'.$row['trans_Type'].'</td>';
            echo "<tr><th>Phone Number</th>";
            echo '<td><b>'.$row['transaction_code'].'</b></td>';
            echo "<tr><th>Transaction Code</th>";
            echo "<td> <input type='text' name='transactcode' value=".$row['transaction_code']."><td><b><- Change the phone number with a code after sending money to the member </b></td>"; 
            echo "<tr><th>Amount</th>";
            $amount=$row['amount'];
            $formated_amount=number_format($amount, 2);
            echo '<td>KSh '.$formated_amount. '</td>';
                }
    ?>
            </table>
            </br>
            <input type="submit" name="download" value="Complete">
            </form>
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