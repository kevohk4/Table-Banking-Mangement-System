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
    <title>MEMBERS | UG</title>
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
<?php
              //  require("database.php"); // Database is defined in database.php file and it is required for use
              if (isset($_POST['submit'])) 
              {
                 $username=$_POST['username'];
                 $name=$_POST['name'];
                 $email=$_POST['email'];
                 $phone=$_POST['phone'];
                 $address=$_POST['address'];
                 $password=$_POST['password'];
                 $passwordconf=$_POST['confirmpassword'];
                 if($password==$passwordconf)
                 {
                   //  $password=md5($password);  // Encrypt the password
                     if($db -> connect_error){
                        die("connection failed:".$conn->connect_error);
                    }
                    $result = mysqli_query($db,"INSERT INTO members(username,name,emai,phone_number,address,img,status,password) VALUES('$username','$name','$email','$phone','$address','$name','Not Active','$password')");
                    if($result){
                       echo ' <h1 style="color:green">REGISTRATION SUCCESS </h1>';
                    }
                    else{
                        echo '<h1 style="color:red;margin-left: 10px">Username already exists register with a different username</h1>';
                    }
                }
                else
                    echo '<h1 style="color:red">Password dont match try again </h1>';
                }
                ?>
                <div class="nav">
<button ><a style='color:white' href='adminpanel.php'>Back</a></button>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="1d04">Add member</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" id="1d05">Search member</button>


</form>
</br>
</div>
<div id="adduser">
<div id="id01" class="modal">
  <div class="modal-content animate" >
  <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
  <h1>Add New Member</h1>
  <form class="form" id="form" action="" method="POST">
                <table style="margin-left:30px;background-color:white; padding:10px; font-size:20px;border-radius:5px">
                    <tr >
                        <td> Username</td> <td><input type="text" name="username" required></td>
                   </tr>
                   <tr>
                        <td> Name</td> <td><input type="text" name="name" required></td>
                   </tr>
                   <tr>
                        <td>Email</td> <td><input type="text" name="email" required></td>
                   </tr>
                   <tr>
                        <td>ID Number</td> <td><input type="text" name="idno" required></td>
                   </tr>
                   <tr>
                        <td>Phone number</td> <td><input type="text" name="phone" required></td>
                   </tr>
                   <tr>
                        <td>Address</td> <td><input type="text" name="address" required></td>
                   </tr>
                   <tr>
                        <td>Password</td> <td><input type="password" name="password" required></td>
                   </tr>
                   <tr>
                        <td>Confirm Password </td> <td><input type="password" name="confirmpassword" required></td>
                   </tr>
                   <tr>
                       <td><input type="submit" name="submit" value="Submit"></td>
                   </tr>
               </table>
               <p>Register new user </p>
                </form>
</div>
</div>
</div>


<div id="id02" class="modal">
  <div class="modal-content animate" >
  <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>

  <h1>Search member</h1>
  <form class="form" id="form" action="search.php" method="POST">
                <table style="margin-left:30px;background-color:white; padding:10px; font-size:20px;border-radius:5px">
                    <tr >
                        <td> Username</td> <td><input type="text" name="username" required></td>
                   </tr>
                   <tr>
                   <tr>
                       <td><input type="submit" name="search" value="Search"></td>
                   </tr>
               </table>
               <p></p>
                </form>
</div>
</div>
</div>
</div>


<div class="members">
<?php     
            $con = mysqli_connect('localhost','root',''); 
            mysqli_select_db($con,'chama');
            $sql = "SELECT * FROM members order by member_id DESC";
            $records = mysqli_query($con,$sql);
            ?>
             <h2>GROUP MEMBERS</h2>
            <table >
           
                <tr>
                    <th>USERNAME</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>CONTACT</th>
                    <th>STATUS</th>
                </tr>
    <?php
        while($row = mysqli_fetch_array($records))
        {
            echo "<tr bgcolor='white' border='3'"
            ."bordercolor='black' "
            ."cellspacing='0'><form action=transactiondetails.php method=post>";
            echo '<td>'.$row['username'].'</td>';
            echo "<input type='hidden' name='transactionId' value=".$row['username'].">";
            echo  '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['emai'].'</td>';
            echo '<td>'.$row['phone_number'].'</td>';
            echo "<td>";
            $status=$row['status'];
            if($status=='Active'){
               echo'<b style="color:green">ACTIVE</b>';
            }
            else if($status=='Suspended') {
                echo'<b style="color:orange">SUSPENDED</b>';
            }
            else{
                echo'<b style="color:red">NOT ACTIVE</b>';
            }
            echo "</td>";
                    echo "</form></tr>";
                }
    ?>
            </table>
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
