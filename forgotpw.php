<?php
session_start();
include_once 'connect.php';

if($_POST['action']=="password")
{
    $email      = mysqli_real_escape_string($connection,$_POST['email']);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) // Validate email address
    {
        $message =  "Invalid email address please type a valid email!!";
    }
    else
    {
        $query = "SELECT id FROM users where email='".$email."'";
        $result = mysqli_query($connection,$query);
        $Results = mysqli_fetch_array($result);
 
        if(count($Results)>=1)
        {
            $encrypt = md5(1290*3+$Results['id']);
            $message = "Your password reset link send to your e-mail address.";
            $to=$email;
            $subject="Forget Password";
            $from = 'info@phpgang.com';
            $body='Hi, <br/> <br/>Your Membership ID is '.$Results['id'].' <br><br>Click here to reset your password http://demo.phpgang.com/login-signup-in-php/reset.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br>PHPGang.com<br>Solve your problems.';
            $headers = "From: " . strip_tags($from) . "\r\n";
            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
 
            mail($to,$subject,$body,$headers);
        }
        else
        {
            $message = "Account not found please signup now!!";
        }
    }
}




?>
<!DOCTYPE html>
<html>
	<head>
		<link rel = "stylesheet" type="text/css" href="style.css">
		 <link rel = "icon" type ="image/png" href= "image/favicon.png">
	</head>
	<div id="bg"><img src="image/bg10.jpg" class="stretch" alt=""/></div>

	<div class="container">
		<form role="form" method="post" name="forgotpw" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<fieldset>
			<legend id="legendcolor">Forgot Password</legend>
			<!-- Main Form -->
	     	<div class="login-form-1">
	 		<div class="etc-login-form"><p id="p-color">When you fill in your registered email address, you will be sent instructions on how to reset your password.</p></div>
				<div class="form-group">
					<label id="label-text-color" for="email">Email address</label>
					<input type="text" name="email" placeholder="email@email.com" required class="email"/>
				</div>
			</div>
				<button id="bgcolor" type="submit" name="submit"  value="Forgotw">Submit</button>
		</fieldset>
			<p id="p-color">Already Registered? <a id="a-color"  href="index.php">login here</a></p>
			<p id="p-color">New User? <a id="a-color" href="register.php">create new account</a></p>
		</form>
		</div>
	<!-- end:Main Form -->
	</div>

</html>
<?php ob_end_flush(); ?>
