<?php
include('database.php');
include('session.php');
$sql = mysqli_query($db,"SELECT * from members where username='$login_session'");
$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
$memberId=$row['member_id'];
?>
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="style.css">
    <title>Profile | UG</title>
</head> 
<body>
     <header>
     <div id="mainbox" onclick="openFunction()">&#9776;</div>
     <div id="title"></h1>UNITY GROUP</h1></div>
     <p>Logged in, <a href=""><?php echo $login_session;?></a>  </p>
     <div id="menu" class="sidemenu">
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
        <h1>Profile</h1>
       <?php
       echo "<p><img src='{$row['img']}' width='200px' height='200px' alt=".$row['name']."></br>";
                      echo '<b>Username:'.$row['username'].'</b> </br>';
                      echo '<b>Name:'.$row['name'].'</b> </br>';
                      echo '<b>Telephone: '.$row['phone_number'].'</b></br>';
                      echo '<b>Email: '.$row['emai'].'</b></br>';
                      echo '<b>Address: '.$row['address'].'</b></br>';
                      
       ?>
            <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;" id="1d04">Edit profile</button>
</p>
        </div>
<div id="id01" class="modal">
  <div class="modal-content animate" >
  <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
    </div>
  <h1>Edit profile</h1>
   <form action="" method="POST" enctype="multipart/form-data">
   <?php
        echo "<p><b>Username</b><input type='text' name='username' value=".$row['username']." required></p>";
        echo "<p><b>Name</b><input type='text' name='name' value=".$row['name']." required></p>";
        echo "<p><b>Email</b><input type='text' name='email' value=".$row['emai']." required></p>";
        echo "<p><b>Phone number</b><input type='text' name='phone' value=".$row['phone_number']." required></p>";
        echo "<p><b>Address</b><input type='text' name='address' value=".$row['address']." required></p>";
       ?>
   <input type="hidden" name="username" value="<?php echo $login_session;?>">
   <p>Upload photo <input type="file" name="userfile[]" value=""multiple=""></p>
   <p> <input type="submit" name="submit" value="Uppload" required></p>
  
   </form>
</div>
</div>
</div>
</body>
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


<?php
$mysqli = new mysqli('localhost','root','','chama') or die($mysqli->connect_error);
$table = 'members';
$phpFileUploadErrors = array(
    0 => 'file image upload success',
    1 =>'The upload file exceeds the upload max filesize',
    2 => '',
    3 => '',
    4 => '',
    5 => '',
    6 => '',
    7 => '',
    8 => '',
);

if($_SERVER["REQUEST_METHOD"] == "POST") {
           $username = mysqli_real_escape_string($mysqli,$_POST['username']);
           $prname = mysqli_real_escape_string($mysqli,$_POST['name']);
           $address = mysqli_real_escape_string($mysqli,$_POST['address']);
           $phone = mysqli_real_escape_string($mysqli,$_POST['phone']);
           $email = mysqli_real_escape_string($mysqli,$_POST['email']);
if(isset($_FILES['userfile'])){
    $file_array = reArrayFiles($_FILES['userfile']);
    for ($i=0;$i<count($file_array); $i++){

        if ($file_array[$i]['error'])
        {
            ?> <div class="alert">
            <?php echo $file_array[$i]['name'].'-'.$phpFileUploadErrors[$file_array[$i]['error']];
            ?> </div> <?php
        }
        else{

            $extentions = array('jpg','png','gif','jpeg');

            $file_ext = explode('.',$file_array[$i]['name']);
            $name = $file_ext[0];  
            $name = preg_replace("!_!"," ",$name);
            $name = ucwords($name);

           // echo $name; die;

            $file_ext = end($file_ext);
                   
            if(!in_array($file_ext,$extentions))
             {
                 ?> <div class="alert alert-danger">
                 <?php echo "{$file_array[$i]['name']} - Invalid file extension!";
                 ?> </div> <?php
        }
        else {
            $img_dir = 'web/'.$file_array[$i]['name'];
            move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);
            $sql = "UPDATE $table set img = '$img_dir',name='$prname',emai='$email',address='$address',phone_number='$phone' WHERE member_id = '$memberId'";
            $mysqli->query($sql) or die($mysqli->error);
               ?> <div class="alert alert-success">           
               <?php echo $file_array[$i]['name']. ' - '.$phpFileUploadErrors[$file_array[$i]['error']];
               ?> </div> <?php
                 }
          }
     }
}
}
function reArrayFiles(&$file_post) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);
    for($i=0;$i<$file_count; $i++){
        foreach ($file_keys as $key){
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    return $file_ary;
}
function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
