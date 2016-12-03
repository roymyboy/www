<?php
session_start();
include_once 'connect.php';
if(isset($_POST['email']))
{           
            $query = "SELECT password FROM users where email='".$email."'";
  	    $result = mysqli_query($con,$query);
            $Results = mysqli_fetch_array($result);
          // if(count($Results)!=0)
           // {
                $encrypt = md5(90*13+$Results['id']);
                $message = "Your password reset link send to your e-mail address.";
                $to=$email;
                $subject="Forget Password";
                $from = 'info@phpgang.com';
                $body='Hi, <br/> <br/>Your Membership ID is '.$Results['id'].' <br><br>Click here to reset your password http://demo.phpgang.com/login-signup-in-php/reset.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br>PHPGang.com<br>Solve your problems.';
                $headers = "From: " . strip_tags($from) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html";
		$message = "suhh dude";
                mail($to,$subject,$body,$headers);
		echo"mail sent";
              //  $query = "SELECT id FROM users where md5(90*13+id)='".$encrypt."'";
             //  $Results = mysqli_fetch_array($result);
              //  print_r($Results);
              //  $message = $encrypt. $query;
           // } 
           
	    /** else
            {
                $message = "Account not found please register now!!<a id='a-color' href='register.php'>Register</a> ";
	     } **/
}                 
?>
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
					<input type="email" name="email" placeholder="email@email.com" required class="email"/>
				</div>
			</div>
				<button id="bgcolor" type="submit" name="submit"  value="Forgotw">Submit</button>
		</fieldset>
			<span type="text-danger"><?php if(isset($message)) echo $message;?></span>
			<p id="p-color">Already Registered? <a id="a-color"  href="index.php">login here</a></p>
			<p id="p-color">New User? <a id="a-color" href="register.php">create new account</a></p>
		</form>
		</div>
	<!-- end:Main Form -->
	</div>

</html>
<?php ob_end_flush(); ?>
