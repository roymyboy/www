<?php
ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }

//basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(userName,userEmail,userPass) VALUES('$name','$email','$password')";
   $res = mysql_query($query);
    
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($name);
	  unset($email);
    unset($pass);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
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
                                <button type="submit" form="register" value="submit">Submit</button>
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
