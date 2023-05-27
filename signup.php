<?php
include('usernamesession.php');
?><!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="styling.css">
    <title>Sign-up | UG</title>
</head> 
<body>
<a href="signin.php"><div class="close">&times;</div></a>

        <div class="container">
            <div class="header">
                <h2>Create account</h2>
            </div>
                <form class="form" id="form" action="" method="POST">
                <?php
                require("database.php"); // Database is defined in database.php file and it is required for use
                if($_SERVER["REQUEST_METHOD"] == "POST") {
                 $username=mysqli_real_escape_string($db,$_POST['username']);
                 $name=mysqli_real_escape_string($db,$_POST['name']);
                 $email=mysqli_real_escape_string($db,$_POST['email']);
                 $phone=mysqli_real_escape_string($db,$_POST['phone']);
                 $address=mysqli_real_escape_string($db,$_POST['address']);
                 $password=mysqli_real_escape_string($db,$_POST['password']);
                 $passwordconf=mysqli_real_escape_string($db,$_POST['confirmpassword']);
                 if($password==$passwordconf)
                 {
                   //  $password=md5($password);  // Encrypt the password
                     if($db -> connect_error){
                        die("connection failed:".$conn->connect_error);
                    }
                    $result = mysqli_query($db,"INSERT INTO members(username,name,emai,phone_number,address,img,status,password) VALUES('$username','$name','$email','$phone','$address','$name','Not Active','$password')");
                    if($result){
                        header('location:logout.php');
                        echo "<script type='text/javascript'>alert('Registration success!!');</script>";
                    }
                    else{
                        echo '<b style="color:red">Already registered </b>';
                    }
                }
                else
                    echo '<b style="color:red">Password dont match try again </b>';
                }
                ?>
                    <table>
                        <tr>
                            <td><label>Username </label></td><td><?php echo $user_name;?><input type="hidden" name="username" value="<?php echo $user_name;?>"></td>
                        </tr>
                        <tr>
                            <td><label>Name </label></td><td><input type="text" name="name" required></td>
                        </tr>
                        <tr>
                            <td><label>Email </label></td><td><input type="text" name="email" required></td>
                        </tr>
                        <tr>
                            <td><label>ID Number </label></td><td><input type="text" name="idno" required></td>
                        </tr>
                        <tr>
                            <td><label>Phone number </label></td><td><input type="text" name="phone" required></td>
                        </tr>
                        <tr>
                            <td><label>Address </label></td><td><input type="text" name="address" required></td>
                        </tr>
                        
                        <tr>
                            <td><label>Password </label></td><td><input type="password" name="password" required></td>
                        </tr>

                        <tr>
                            <td><label>Confirm Password </label></td> <td><input type="password" name="confirmpassword" required></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td><a href="signin.php">Have an account?</a></td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Submit"></td>
                        </tr>
                    </table>
                </form>
        </div>
    </body>
</html>