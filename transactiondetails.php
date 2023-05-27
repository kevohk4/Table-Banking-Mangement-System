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
    <title>TransactionDetails | UG</title>
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
        <h2><a style="padding-top:20px; font-size:20px;color:green; margin-top:100px"href="account.php"><b>BACK</b></a></h2>
            <h1>TRANSACTION DETAIL</h1>     
        <?php
        mysqli_select_db($db,'services');
        if($db -> connect_error){
            die("connection failed:".$conn->connect_error);
        }
        $result = mysqli_query($db,"SELECT members.member_id,members.name,members.emai,members.img,members.date,transactions.transact_id,transactions.status,transactions.transact_by,transactions.service,transactions.amount FROM transactions INNER JOIN members ON transactions.transact_by= members.username where transact_by='$login_session' and status='1'");
    echo "<table>
    <tr>
    <td>Account holder's name:".$row['name']."</td>
    </tr>
    <tr>
    <td>Account opened on:".$row['date']."</td>
    </tr>
    <tr>
    <td>Account number:".$row['member_id']."</td>
    </tr>
    </table>";
        ?>
<?php     
            $transactionId=$_POST['transactionId'];
            $con = mysqli_connect('localhost','root',''); 
            mysqli_select_db($con,'chama');
            $sql = "SELECT * FROM savings where trans_By='$login_session' and trans_ID='$transactionId'";
            $records = mysqli_query($con,$sql);
            ?>
    <?php
        while($row = mysqli_fetch_array($records))
        {
            echo "<form action=transactiondetails.php method=post>";
            echo "<table tyle='background-color:maroon'>
            ";
            echo "<tr><th>Transaction Id </th>";
            echo '<td>'.$row['trans_ID'].'</td>';
            echo "<tr><th>Date</th>";
            echo '<td>'.$row['date'].'</td>';
            echo "<tr><th>Transacted by</th>";
            echo '<td>'.$row['trans_By'].'</td>';
            echo "<tr><th>Transaction Type</th>";
            echo '<td>'.$row['trans_Type'].'</td>';
            echo "<tr><th>Transaction Code</th>";
            echo '<td>'.$row['transaction_code'].'</td>';
            echo "<tr><th>Amount</th>";
            $amount=$row['amount'];
            $formated_amount=number_format($amount, 2);
            echo '<td>KSh '.$formated_amount. '</td>';
                }
    ?>
          
            </table>
            <input type="button" name="download" value="Download">
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