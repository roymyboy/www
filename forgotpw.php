<?php
session_start();
include_once 'connect.php';
$error = false; 
if(isset($_POST['submit'])) 
{ 
$email =  mysqli_real_escape_string($con, $_POST['email']);
$pass= "SELECT  `password` FROM `users` WHERE `email` ='$email.'"; 
$query1 = mysqli_query($pass); 

  if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $email_error = "Please Enter Valid Email ID";
    } else {
        //check if user already exists 
        $query = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
                if($count == 0){
                        $error = true;
                        $email_error = "Provided email doesnot exist! Please register here <a id="a-color" href='register.php'>Register</a>";
                }
    }



if(!$query1)  
    { 
    die(mysqli_error()); 
    } 
if(mysqli_affected_rows() != 0) 
    { 
$row=mysqli_fetch_array($query1); 
$pass=$row["password"]; 
$email=$row["email"]; 
$subject="Password Request"; 
$header="From: intense-chamber"; 
$content="Your password is ".$pass; 
mail($email, $subject, $content, $header);  
print "An email containing the password has been sent to you"; 
    } 
else  
    { 
    echo("no such login in the system. please try again."); 
    } 
} 
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" type="text/css" href="style.css">
		 <link rel = "icon" type ="image/png" href= "image/favicon.png">
	</head>
	<div id="bg">
		<img src="image/bg10.jpg" class="stretch" alt=""/>
	</div>

	<div class="container">
<form role="form" method="post" name="forgotpw" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<fieldset>
	<legend id="legendcolor">Forgot Password</legend>
	<!-- Main Form -->
	<div class="login-form-1">
			<div class="etc-login-form">
				<p id="p-color">When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
			</div>
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label id="label-text-color" class="email">Email address</label>
						<input type="email" name="email" placeholder="email@email.com" required class="email">
						<span class="text-danger"><?php if(isset($email_error))echo $email_error;?></span>	
				</div>
				</div>
				<button id="bgcolor" type="submit" name="submit"  value="submit">Submit</button>
	</fieldset>
				<p id="p-color">Already Registered? <a id="a-color"  href="index.php">login here</a></p>
				<p id="p-color">New User? <a id="a-color" href="register.php">create new account</a></p>
		</form>
	</div>
	<!-- end:Main Form -->
	</div>

</html>