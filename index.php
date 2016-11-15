<?php
require('main.html');
?>

<!DOCTYPE html>
<html>
        <head>
                <link rel = "stylesheet" type="text/css" href="style.css">
                <link rel = "icon" type ="image/png" href= "image/favicon.png">
        </head>

        <!--back ground image-->
        <div id = "bg">
         <img src= "image/bg3.jpg" class="stretch" alt = ""/>
        </div>

        <!--Login setup-->
        <form action="login.php" method="POST">
          <label for="username@email.com"></label>
          <input type="text" name="username@email.com" id="" placeholder="username@email.com" class="email" required>
          <label for="password"></label>
          <input type="password" name="password" id="" placeholder="password" class="pass" required>
          <button type="submit" name= "login" value="Login">login</button>
          <div class="etc-login-form">
                <p>forgot your password? <a href="forgotpw.html">click here</a></p>
                <p>new user? <a href="register.php">create new account</a></p>
        </div>
        </form>

</html>

~         
