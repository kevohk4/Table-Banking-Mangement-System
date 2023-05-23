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
    <link rel="stylesheet" href="styllo.css">
    <title>Services | UG</title>
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
</br>
</br>

        
<button  id="1d05"><a style="color:white" href='admin.php'>Back</a></button><!--
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" id="1d05">Search member</button>-->

</form>
</br></br>
<table>
    <tr>
      <!--  <td class="current">Members</td><td><a href="adminsavings.php">Savings</a></td><td>Loans</td><td><a href='addaccounts.php'>Accounts</a></td>-->
    </tr>
</table>
</div>

    <?php
  
    if (isset($_POST['search'])) 
	{
		$username=$_POST['username'];

        $sql = "SELECT * FROM members WHERE username='$username'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        if($count == 1) {
            while($row = mysqli_fetch_array($result)){
                echo "
               ";   
        }
    }  
        else {
            echo " <div id='introduction'>";
            echo "<h1>Username <b> $username </b> not found</h1></div>";
        }
        echo "</div>";
        $result = mysqli_query($db,"SELECT * FROM members WHERE username='$username'");
        while($row = mysqli_fetch_array($result)){
            echo " <div id='introduction'>
            <h1>Member's details</h1>";
            echo "<p><img src='{$row['img']}' width='200px' height='200px' alt=".$row['name']."></br>";
            echo '<b>Username:'.$row['username'].'</b> </br>';
            echo '<b>Name:'.$row['name'].'</b> </br>';
            echo '<b>Telephone: '.$row['phone_number'].'</b></br>';
            echo '<b>Email: '.$row['emai'].'</b></br>';
            echo '<b>Address: '.$row['address'].'</b></br>'; 
            $status=$row['status'];
            if($status=='Active'){
                echo '<b style="color: green">Status : ACTIVE </b> </br>'; 

            }
            if($status=='Suspended'){
                echo '<b style="color: orange">Status : SUSPENDED </b> </br>'; 

            }
            else{
                echo '<b style="color: red">Status : NOT ACTIVE </b> </br>'; 

            }
        //    echo '<b>Status: '.$row['address'].'</b></br>'; 
            echo "<table><tr>
            <td><form name='remove' method='POST' action='remove.php'>
            <input type='hidden' name='memberId' value=".$row['member_id']." required>
            <input type='submit' name='remove' value='Remove'>
            </form></td>
            <td><form name='remove' method='POST' action='suspend.php'>
            <input type='hidden' name='memberId' value=".$row['member_id']." required>
            <td><input type='submit' name='remove' value='Suspend'></td>
            </tr>
            </table>";
            echo "</div>";	
	}

  }
?>
