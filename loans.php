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
  

    <title>Loans | UG</title>
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
        <h1>LOANS</h1>
        <?php
        mysqli_select_db($db,'services');
        if($db -> connect_error){
            die("connection failed:".$conn->connect_error);
        }
        $result = mysqli_query($db,"SELECT * FROM members  where username='$login_session'");
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
      $sql = "SELECT * FROM loans WHERE trans_By = '$login_session'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $rows=$row['amount'];
      $count = mysqli_num_rows($result);

      if($count == 0) {
          echo "<form name='activate' action='loanactivation.php' method='POST'>
          <p>Click to activate loan options <input type='submit' value='Activate'></p>
          </form>";
      }
      else {
        ?>
        <div class="navig">
       <table>
        <tr>
        <td><a href="savings1.php">Savings</a></td><td><a href="transfer.php">Transfer</a></td><td><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="1d04">Loan bal</button></a></td><td><a href="loanstatements.php">Loan statement</a></td>
        </tr>
        </table>
<?php
      include('balance.php');
      $balance=$Tbalance;

            $result = mysqli_query($db,"SELECT * FROM loans where trans_By='$login_session' order by trans_ID DESC  limit 1");
            while($row=mysqli_fetch_array($result)){
                        $currentBal=$row['current_bal'];
                        if($currentBal>0){
                          echo"<div class='service'>
                          <div class='image'><a href='repayment1.php'><img src='web/repayment.png' width='150px' height='150px'></div>
                          <b>Loan Repayment</b></a>
                          </div>";
                        }
                        else if($balance > -1)
                        {
                         echo"<div class='service'>
                         <div class='image'><a href='request.php'><img src='web/loan.jpg' width='150px' height='150px'></div>
                         <b>Loan request</b></a>
                         </div>";
                        
                        }            
                        else{
                
                         }
                        
            }
            
        } ?>
    </div>

  <div id="id01" class="modal">
  <div class="modal-content animate" >
  <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
    <?php
             $con = mysqli_connect('localhost','root',''); 
             mysqli_select_db($con,'chama');
             $sql = "SELECT * FROM loans where trans_By='$login_session' order by date DESC  limit 1";
             $records = mysqli_query($con,$sql);
                 while($row = mysqli_fetch_array($records))
                 {
                     $currentBal=$row['current_bal'];
                     $formated_bal=number_format($currentBal, 2);
                 }
          ?>
  <?php  echo "<h2 style='color:back;font-size:50px;margin-left: 20px'>Your outstanding loan balance Ksh $formated_bal </h2>";?>
</div>
</div>
</div>
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