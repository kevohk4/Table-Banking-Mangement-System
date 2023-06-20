<?php
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <title>RS| Home </title>
</head>
<h1>User:<?php echo $login_session;?> </h1>
<body>
    
<header>
<div id="mainbox" onclick="openFunction()">&#9776;</div>
<div id="menu" class="sidemenu">
<a href="timeline.php">Timeline</a>
<a href="booking.php">Bookings</a>
<a href="gallery.php">Gallery</a>
<a href="#">New destinations</a>
<a href="#">Help</a>
<a href="#">Logout</a>
<a href="#" class="closebtn" onclick="closeFunction()">&times;</a>
<p style="font-size:17px">
<img src="" height="50px" width="50px"></br>Trusted travelling partner </br> Explore magical Kenya 
</br> and mother Africa by choosing us. </br> Email us at <email>info@roansafaris@gmail.com</email> </p>

</div>  
        <h1>Roan Safaris Ltd</h1>
      
       
</header>

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
</br>
<div style="float: right;">
      <input type="search" name="search">
      <input type="button" name="button" value="Search">
</div></br></br> <hr>

<h1>ROAN SAFARIS YOUR FAVOURITE TOURS AND TRAVEL PARTNER</h1>
    <h1>Top destinations </h1> </br>
<section>

  <?php
include('db2.php');
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
$code = $_POST['code'];
$result = mysqli_query(
$con,
"SELECT * FROM `destination` WHERE `code`='$code'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$code = $row['code'];
$price = $row['price'];
$image = $row['description'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'code'=>$code,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Destination confirmed!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Destination already added!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Destination is added!</div>";
	}

	}
}
?>
<body>

<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php">Destinations selected<img src="" widht="30px" height="30px"/><span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>
<?php
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbName="jezi";
$conn=new mysqli($host, $dbUsername, $dbPassword, $dbName);
if($conn -> connect_error){
    die("connection failed:".$conn->connect_error);
}?>   
<?php
$result = mysqli_query($con,"SELECT * FROM `destination`");
while($row = mysqli_fetch_assoc($result)){
    echo "</br>";
    echo "</br>";
    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['img']).'" width="200" height="200">';
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='code' value=".$row['code']." />
    <div class='image'><img src='".$row['img']."' /></div>
    <div class='name'> Name :".$row['name']."</div>
	<div class='type'>Ratings :".$row['ratings']."</div>
	<div class='size'>Country :".$row['country']."</div>
    <div class='price'>Price :Ksh ".$row['price']."</div>
    <div class='size'>Description :".$row['description']."</div>
    
    <button type='submit' class='buy'>Book:-</button>
    </form>
    </div>";
        }
mysqli_close($con);
?>
<div style="clear:both;"></div>
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

   <footer>
            Social media handles<br>
            <a href="#"><img src="img/facebook.png"  width="30" height="30"></a>
            <a href="#"><img src="img/likedin.PNG" width="30" height="30"></a>
            <a href="#"><img src="img/twiter.PNG" width="30" height="30"></a>
            <a href="#"><img src="img/youtube.PNG" width="30" height="30"></a>
                <br>
                        <a href="Contact.html">Contact</a> |
                        <a href="terms.html">Terms of service</a> |
                        <a href="appdownload.html">Our App</a> 
               <br>
                Roan Safaris Ltd.   &copy;2021 <br>
                Powered by Kevoh softwares    
    </footer>  
</body>
</html>