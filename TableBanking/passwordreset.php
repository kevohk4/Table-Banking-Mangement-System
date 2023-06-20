<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="styling.css">
    <title>Forgot Password | UG</title>
</head> 
<body>
<a href="signin.php"><div class="close">&times;</div></a>
        <div class="container2">
            <div class="header">
                <h2>Forgot Password</h2>
            </div>
                <form class="form" id="form" action="" method="POST">
   <?php
   require("database.php");
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $email = mysqli_real_escape_string($db,$_POST['email']);
      $sql = "SELECT emai FROM members WHERE emai = '$email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) { 
        session_start();
        $_SESSION['email'] = $email;
        header("location: emailrec.php");  
        
      }else {
       echo "<b style='color:red'>$email does not exist in the system </b>";

      }
    }
   ?>
        <table>
            <tr>
            <td><label>Enter email</label></td><td><input type="text" name="email" required></td>
            </tr>
            <tr>
            <td></td>
            </tr>
                        <tr>
                            <td></td>
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
                            <td><input type="submit" name="submit" value="Proceed"></td>
                        </tr>
                   
                    </form>
                   
 </table>
               
        </div>
    </body>
</html>