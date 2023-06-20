<?php
include('emailsession.php');
?><!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="styling.css">
    <title>Password Recovery | UG</title>
</head> 
<body>
<a href="signin.php"><div class="close">&times;</div></a>
        <div class="container1">
            <div class="header">
                <h2>Password recovery details to be sent to the email below</h2>
            </div>
                <form class="form" id="form" action="email.php" method="POST">
                    <table>
                        <tr>
                            <td><label>Email: <b style="color: green"><?php echo $email_recover;?><b></label></td><td><input type="hidden" name="email" value="<?php echo $email_recover;?>"></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr> <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="submit" name="submit" value="Confirm"></td>
                        </tr>
                    </table>
                </form>
        </div>
    </body>
</html>