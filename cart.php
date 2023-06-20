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
    <style>
      table{
        color: black;
        border:2px solid white;
      }
      td{
        border: 1px white;
        padding: 5px;
    }
    </style>
</head>
<h1>User:<?php echo $login_session;?> </h1>
<body>
    
<header>
<div id="mainbox" onclick="openFunction()">&#9776;</div>
<div id="menu" class="sidemenu">
<a href="booking.php">Bookings</a>
<a href="gallery.php">Gallery</a>
<a href="#">New destinations</a>
<a href="#">Cancel booking</a>
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

<section>

  <h1>ROAN SAFARIS BOOKING</h1>
<?php
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Destination removed from your selected destinations!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break;
    }
}
  	
}
?>

<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
	$total_items= 0;
?>	
<table>
<tbody>
<tr>
<td>Destination</td>
<td>Choose number</td>
<td>No. of people</td>
<td>PRICE</td>
<td>TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>

<td><?php echo $product["name"]; ?><br />

</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
<option <?php if($product["quantity"]==1) echo "selected";?>
value="0">0</option>
<option <?php if($product["quantity"]==2) echo "selected";?>
value="1">1</option>
<option <?php if($product["quantity"]==2) echo "selected";?>
value="2">2</option>
<option <?php if($product["quantity"]==3) echo "selected";?>
value="3">3</option>
<option <?php if($product["quantity"]==4) echo "selected";?>
value="4">4</option>
<option <?php if($product["quantity"]==5) echo "selected";?>
value="5">5</option>
</select>
</form>
</td>
<form name="buy" action="" method="POST">
<td><?php echo "".$product["quantity"]; ?></td>
<td><?php echo "Ksh ".$product["price"]; ?></td>
<td><?php echo "Ksh ".$product["price"]*$product["quantity"]; ?></td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Cancel</button>
</form>
</td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
$total_items +=($product["quantity"]);
}
?>

<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "Ksh ".$total_price; ?></strong>
</td>

</tr>
</tbody>
</table>	
  <input type="hidden" name="price" value="<?php echo $total_price; ?>">
	<input type="hidden" name="quantity" value="<?php echo $total_items; ?>">
	<input type="hidden" name="username" value="<?php echo $login_session; ?>">
	<input type="hidden" name="product" value="<?php echo $product["name"]; ?>">
	<!--<input type="submit" value="Confirm purchase">-->
  <button type='submit' class='remove'>Confirm purchase</button>
  
    
</form>			
  <?php
}else{
	echo "<h3>No destination selected!!! <a href='gallery.php'>Back</a></h3>";
	}
?>
</div>
<div style="clear:both;"></div>
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
