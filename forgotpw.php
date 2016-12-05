<?php
session_start();
require("sendgrid-php/sendgrid-php.php");
include "connect.php";
if (isset($_POST['email'])){
	$email = $_POST['email'];
	$query="SELECT `email` FROM `users` WHERE email='$email'";
	$result   = mysqli_query($con, $query) or die(mysqli_error($con));
	$count=mysqli_num_rows($result);
	// If the count is equal to one, we will send message other wise display an error message.
	if($count==1)
	{
		$from = new SendGrid\Email(null, "test@example.com");
		$subject = "Hello World from the SendGrid PHP Library!";
		$to = new SendGrid\Email(null, $email);
		$content = new SendGrid\Content("text/plain", "Hello, Email!");
		$mail = new SendGrid\Mail($from, $subject, $to, $content);

		$apiKey = getenv('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);

		$response = $sg->client->mail()->send()->post($mail);
		echo $response->statusCode();
		echo $response->headers();
		echo $response->body();
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
			<span type="text-danger"><?php if(isset($to)) echo $to ;?></span>
			<p id="p-color">Already Registered? <a id="a-color"  href="index.php">login here</a></p>
			<p id="p-color">New User? <a id="a-color" href="register.php">create new account</a></p>
		</form>
		</div>
	<!-- end:Main Form -->
	</div>

</html>i
<?php ob_end_flush(); ?>
