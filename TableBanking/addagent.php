<?php
include('database.php');
//include('session.php');
mysqli_select_db($db,'agents');
$name=$_POST['name'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$id=$_POST['id'];
$level="sub county";
$station_name=$_POST['sub-county'];
//$station_code=$_POST['code'];
if($db -> connect_error){
    die("connection failed:".$conn->connect_error);
    echo "faild";
}
$result = mysqli_query($db,"INSERT INTO agents(name,email,contact,id,level,station_name,station_code) VALUES('$name','$email','$contact','$id','$level','$station_name','$station_name')");
if($result)
{
    echo "faild2";
        echo "<script type='text/javascript'>alert('Request sent successfully!!');</script>";
}
else{
    echo "faild3";
echo "<script type='text/javascript'>alert('Request not sent successfully!!');</script>";
}
?>