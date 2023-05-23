<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="styling.css">
    <title>Username | UG</title>
</head> 
<body>
<a href="signin.php"><div class="close">&times;</div></a>
        <div class="container2">
            <div class="header">
                <h2>Enter your username to proceed with registration</h2>
            </div>
                <form class="form" id="form" action="" method="POST">
   <?php
   require("database.php"); // Data base that is defined in another file database.php
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $sql = "SELECT username FROM members WHERE username = '$username'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      if($count == 1) {  
          // username checked and found to be exixting in the DB
        echo '<b style="color:red">That username already exists try another username </b>';
      }else {
        session_start();
        // If username does not exist in the DB then a session username is set
        $_SESSION['username'] = $username;
        header("location: signup.php");
      }
    }
   ?>
        <table>
            <tr>
            <td><label>Username </label></td><td><input type="text" name="username" autocomplete="off" required></td>
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