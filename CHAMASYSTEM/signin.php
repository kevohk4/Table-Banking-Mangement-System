<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="styling.css">
    <title>Signin | UG</title>
</head>
<body>
<a href="index.php"><div class="close">&times;</div></a>
        <div class="container1">
            <div class="header">
                <h2>Sign-in</h2>
            </div>
            <form class="form" id="form" action="" method="POST">
            <?php
   require("database.php"); // Database is defined in database.php file and it is required for use
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']);
      $sql = "SELECT username FROM members WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {
         session_start();
         $_SESSION['login_user'] = $username;// Storing session username
         header("location:user.php"); // If the and username and Password match then Password then user.php file is opened
      }else {
         echo '<b style="color:red">Your username or Password is incorrect please try again or register </b>';
         // An alert that the password or username is not correct
      }
   }
?>
                <table>
                    <tr>
                        <td><label>Username </label></td><td><input type="text" name="username" autocomplete="off" required></td>
                    </tr>
                    <tr>
                      <td><label>Password </label></td><td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                     <td></td>
                    </tr>
                    <tr>
                      <td><a href="username.php">Don't have an account?</a></td> <td><a href="passwordreset.php">Don't remember password?</a></td>
                    </tr>
                    <tr>    
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
                    <td><input type="submit" name="signin" value="Signin"></td>
                        </tr>
                    </table>
                </form>
        </div>
        
    </body>
</html>