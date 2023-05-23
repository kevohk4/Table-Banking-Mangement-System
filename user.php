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
<div id="introduction">
        <?php
        mysqli_select_db($db,'members');
        if($db -> connect_error){
            die("connection failed:".$conn->connect_error);
        }
        $result = mysqli_query($db,"SELECT * FROM members where username='$login_session'");
        $status=$row['status'];
        if($status=='Not Active'){
            echo "<h1>Welcome new member!!</h1>";
            echo "<P>Deposit to activate your account<a href='savings.php'> Deposit</a></p>";
        }
        else if($status =='Suspended'){
            echo "<h1>ACCOUNT SUSPENDED</h1>
           
            <form name='subscription' action='subscription.php' method='POST'>
            <p><b>Contact admin</br></br>
            Email</br>
            <input type='email' name='email' placeholder='Email' autocomplete='off'></br>
            Message</br>
            <input style='height: 100px'type='text-area' placeholder='Message'></text-area><input type='submit' name='submit' value='Submit'>
        </b>
        </p>
        </form>";
            echo "";

        }
        else{
            echo "<h1>SERVICES</h1>";
            ?>
              <div class='service'>
              <div class='image'><a href='account.php'><img src='web/account.png' width='150px' height='150px'></div>
              <b>Account</b></a>
              </div>
              <div class='service'>
              <div class='image'><a href='savings1.php'><img src='web/deposit.PNG' width='150px' height='150px'></div>
              <b>Savings</b></a>
              </div>
              <?php
              include('balance.php');
              $amount=$Tbalance;
              //$Tbalance is the balance in the kitty 
              // Balance file is included because it contains the calculations of finding the balance.
              $formated_balance=number_format($Tbalance, 2);
              //echo $formated_balance;
              //for a member to transfer money to another member he/she must have atleast Ksh 100 balance.
              if($amount>=100){
                echo"<div class='service'>
                <div class='image'><a href='withdraw.php'><img src='web/withdrawal.png' width='150px' height='150px'></div>
                <b>Withdraw</b></a>
                </div>";
                echo"<div class='service'>
                <div class='image'><a href='transfer.php'><img src='web/transfer.png' width='150px' height='150px'></div>
                <b>Transfer</b></a>
                </div>";
               }
               else{

                }
                // Checking for loan balance <Current loan balance is the members loan balance>
              $result = mysqli_query($db,"SELECT * FROM loans where trans_By='$login_session' order by trans_ID DESC  limit 1");
              while($row = mysqli_fetch_array($result)){
                        $currentBal=$row['current_bal'];
                        if($currentBal>0){
                          echo"<div class='service'>
                          <div class='image'><a href='repayment1.php'><img src='web/repayment.png' width='150px' height='150px'></div>
                          <b>Loan Repayment</b></a>
                          </div>";
                        }
                        else if($amount>=0)
                        {
                         echo"<div class='service'>
                         <div class='image'><a href='request.php'><img src='web/loan.jpg' width='150px' height='150px'></div>
                         <b>Loan request</b></a>
                         </div>";
                        }            
                        else{
                
                         }           
            }
          }
          ?>
          <div class="service">
          </div>
          <div class="service">
          </div>
          <div class="service">
          </div> <div class="service">
          </div>
          <div class="service">
          <div class="fb">
          <a href= "#" style="color:black">facebook</a>
          </div></br>
          <div class="tw">
          <a href= "#" style="color:black">twitter</a>
          </div></br>
          <div class="ig">
          <a href= "#" style="color:black">instagram</a>
         </div>

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