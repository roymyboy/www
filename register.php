<?php 
session_start();
if(isset($_SESSION['usr_id'])) {
    header("Location: index.php");
}
include_once 'connect.php';
//set validation error flag as false
$error = false;
//check if form is submitted
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    
    //name can contain only alpha characters and space
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $error = true;
        $name_error = "Name must contain only alphabets and space";
    }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    }
    if(strlen($password) < 6) {
        $error = true;
        $password_error = "Password must be minimum of 6 characters";
    }
    if($password != $cpassword) {
        $error = true;
        $cpassword_error = "Password and Confirm Password doesn't match";
    }
    if (!$error) {
        if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')")) {
            $successmsg = "Successfully Registered! <a href='login.php'>Click here to Login</a>";
	 } else {
            $errormsg = "Error in registering...Please try again later!";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 <link rel = "stylesheet" type="text/css" herf="style.css">
<link rel = "icon" type ="image/png" href= "image/favicon.png">
</head>
<div class="text-center" style="padding:50px 0">
        <div class="logo">Register</div>
<body>

  <!-- Main Form -->
        <div class="login-form-1">
                <form action="" method="post">
                        <div class="login-form-main-message"></div>
                        <div class="main-login-form">
                                <div class="login-group">
                                        <div class="form-group">
                                                <label for="reg_username" class="sr-only">Username</label>
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
                                                <label for="reg_email" class="sr-only">email</label>
                                                <input type="text" class="form-control" id="reg_email" name="reg_email" placeholder="email">
                                        </div>
                                        <div class="form-group">
                                                <label for="reg_fullname" class="sr-only">full name</label>
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
                                <button type="submit" name="signup" value="submit">Submit</button>
                        </div>
                        <div class="etc-login-form">
                                <p>already have an account? <a href="index.php">login here</a></p>
                        </div>
                </form>
        </div>
        <!-- end:Main Form -->
</div>
</body>
</html>
<?php ob_end_flush(); ?>
