<?php
session_start();
include "connect.php";
$to = "cannot send email"; 
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
			<span type="text-danger"><?php if(isset($to)) echo $to ;?></span>
			<p id="p-color">Already Registered? <a id="a-color"  href="index.php">login here</a></p>
			<p id="p-color">New User? <a id="a-color" href="register.php">create new account</a></p>
		</form>
		</div>
	<!-- end:Main Form -->
	</div>

</html>i
<?php ob_end_flush(); ?>
