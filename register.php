<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <link rel = "stylesheet" type="text/css" herf="style.css">
<link rel = "icon" type ="image/png" href= "image/favicon.png">
</head>
<div class="text-center" style="padding:50px 0">
        <div class="logo">Register</div>
<?php
require('Dao.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date)
VALUES ('$username', '".md5($password)."', '$email', '$trn_date')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='index.php'>Login</a></div>";
        }
    }else{
?>
  <!-- Main Form -->
        <div class="login-form-1">
                <form action="register.php" method="post">
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                                <div class="login-group">
                                        <div class="form-group">
                                                <label for="reg_username" class="sr-only">User Name</label>
                                                <input type="text" class="form-control" id="reg_username" name="reg_username" placeholder="username">
                                        </div>
                                        <div class="form-group">
                                                <label for="reg_password" class="sr-only">Password</label>
                                                <input type="password" class="form-control" id="reg_password" name="reg_password" placeholder="password">
                                        </div>
                                        <div class="form-group">
                                                <label for="reg_password_confirm" class="sr-only">Password Confirm</label>
                                                <input type="password" class="form-control" id="reg_password_confirm" name="reg_password_confirm" placeholder="confirm password">
                                        </div>
                                        <div class="form-group">
                                                <label for="reg_email" class="sr-only">Email</label>
                                                <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email">
                                        </div>
                                        <div class="form-group">
                                                <label for="reg_fullname" class="sr-only">Full Name</label>
                                                <input type="text" class="form-control" id="reg_fullname" name="reg_fullname" placeholder="full name">
                                        </div>
                               <div class="form-group login-group-checkbox">
                                                <input type="radio" class="" name="reg_gender" id="male" placeholder="username">
                                                <label for="male">male</label>
                                                <input type="radio" class="" name="reg_gender" id="female" placeholder="username">
                                                <label for="female">female</label>
                                        </div>
                                        <div class="form-group login-group-checkbox">
                                                <input type="checkbox" class="" id="reg_agree" name="reg_agree">
                                                <label for="reg_agree">i agree with <a href="terms.html">terms</a></label>
                                        </div>
                                </div>
                                <button type="submit" form="register" value="submit">Submit</button>
                        </div>
                        <div class="etc-login-form">
                                <p>already have an account? <a href="index.html">login here</a></p>
                        </div>
                </form>
        </div>
        <!-- end:Main Form -->
<?php } ?>
</div>

</html>
                                                                                       61,7          Bot

