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
    <title>Loans | UG</title>
</head> 
<body>
     <header>
     <div id="mainbox" onclick="openFunction()">&#9776;</div>
     <div id="title"></h1>UNITY GROUP</h1></div>
     <p>Logged in, <a href=""><?php echo $login_session;?></a>  </p>
     <div id="menu" class="sidemenu">
     <a href="profile.php">My profile</a>
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
<div class="nav">
<table>
    <tr>
        <td class="current"><a href="admin.php">Members</a></td><td><a href="adminsavings.php">Savings</a></td><td><a href="adminloans.php">Loans</a></td><td>Account</td>
    </tr>
</table>
</div>
<div class="members">
<?php     
            $con = mysqli_connect('localhost','root',''); 
            mysqli_select_db($con,'chama');
            $sql = "SELECT * FROM loans";
            $records = mysqli_query($con,$sql);
            ?>
            <table >
            <h2>LOANS </h2>
                <tr>
                    <th>TRANS ID</th>
                    <th>TRANS BY</th>
                    <th>DATE</th>
                    <th>Amount</th>
                    <th>STATUS</th>
                </tr>
    <?php
        while($row = mysqli_fetch_array($records))
        {
            echo "<tr bgcolor='white' border='3'"
            ."bordercolor='black' "
            ."cellspacing='0'><form action=transactiondetails.php method=post>";
            echo '<td>'.$row['trans_ID'].'</td>';
            echo "<input type='hidden' name='transactionId' value=".$row['trans_ID'].">";
            echo  '<td>'.$row['trans_By'].'</td>';
            echo '<td>'.$row['date'].'</td>';
            $unfomated_amout=$row['amount'];
            $formated_amount=number_format($unfomated_amout, 2);
            echo '<td> Ksh '.$formated_amount.'</td>';
            echo "<td>";
            $status=$row['status'];
            if($status=='Approved'){
               echo'<b style="color:green">Approved</b>';
            }
            else {
                echo'<b style="color:red">Received</b>';
            }
            echo "</td>";
                    echo "</form></tr>";
                }
    ?>
            </table>
</body>
</html>
<script type="text/javascript">
function openFunction(){
    document.getElementById("menu").style.width="300px";  
    document.getElementById("incline").style.marginleft="200px";
}
function closeFunction(){
    document.getElementById("menu").style.width="0px";
    document.getElementById("mainbox").style.marginleft="0px";
    document.getElementById("mainbox").innerHTML="&#9776;";
    }
</script>
