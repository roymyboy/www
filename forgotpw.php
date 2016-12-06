<?php
session_start();
include "connect.php";
?>
<html>
	<head>
		<link rel = "stylesheet" type="text/css" href="style.css">
		 <link rel = "icon" type ="image/png" href= "image/favicon.png">
	</head>
	<div id="bg"><img src="image/bg10.jpg" class="stretch" alt=""/></div>

	<div class="container">
			<!-- Main Form -->
		<form role="form" method="post" name="forgotpw" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<fieldset>
			<legend id="legendcolor">Forgot Password</legend>
	 		<div class="etc-login-form"><p id="p-color">When you fill in your registered email address, you will be sent instructions on how to reset your password.</p></div>
				<div class="form-group">
					<label id="labelcolor" for="email">Email address</label>
					<input type="email" name="email" placeholder="email@email.com" required class="email" />
				</div>
				<button id="bgcolor" type="submit" name="submit"  value="Forgotw">Submit</button>
		</fieldset>
			<p id="p-color">Already Registered? <a id="a-color"  href="index.php">login here</a></p>
			<p id="p-color">New User? <a id="a-color" href="register.php">create new account</a></p>
		</form>
	</div>
</html>
<?php ob_end_flush(); ?>
