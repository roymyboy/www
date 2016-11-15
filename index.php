<?php
require('connect.php');

 session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$username' and passcode = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("username");
         $_SESSION['login_user'] = $username;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
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
        <form action="" method="POST">
          <label for="username"></label>
          <input type="text" name="username" id="" placeholder="username" class="username" required>
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
