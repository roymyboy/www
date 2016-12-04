<?php
session_start();
include "connect.php";
if (isset($_POST['email'])){
	$email = $_POST['email'];
	$query="SELECT `email` FROM `users` WHERE email='$email'";
	$result   = mysqli_query($con, $query) or die(mysqli_error($con));
	$count=mysqli_num_rows($result);
	// If the count is equal to one, we will send message other wise display an error message.
	if($count==1)
	{
/**		$rows=mysqli_fetch_array($result);
		$pass  =  $rows['password'];//FETCHING PASS
		//echo "your pass is ::".($pass)."";
		$to = $rows['email'];
		//echo "your email is ::".$email;
		//Details for sending E-mail
		$from = "Coding Cyber";
		$url = "http://www.codingcyber.com/";
		$body  =  "Coding Cyber password recovery Script
		-----------------------------------------------
		Url : $url;
		email Details is : $to;
		Here is your password  : $pass;
		Sincerely,
		Coding Cyber";
		$from = "utsavroy8@gmail.com";
		$subject = "CodingCyber Password recovered";
		$headers1 = "From: $from\n";
		$headers1 .= "Content-type: text/html;charset=iso-8859-1\r\n";
		$headers1 .= "X-Priority: 1\r\n";
		$headers1 .= "X-MSMail-Priority: High\r\n";
		$headers1 .= "X-Mailer: Just My Server\r\n";
		$sentmail = mail ( $to, $subject, $body, $headers1 ); **/
		$encrypt = md5(90*13+$result['id']);
                $message = "Your password reset link send to your e-mail address.";
                $to=$email;
                $subject="Forget Password";
                $from = 'utsavroy8@gmail.com';
                $body='Hi, <br/> <br/>Your email is '.$result['id'].' <br><br>Click here to reset your password http://demo.phpgang.com/login-signup-in-php/reset.php?encrypt='.$encrypt.'&action=reset   <br/> <br/>--<br>PHPGang.com<br>Solve your problems.';
                $headers = "From: " . strip_tags($from) . "\r\n";
                $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

             $sentmail =    mail($to,$subject,$body,$headers);


	} else {
	if ($_POST ['email'] != "") {
	    $fmsg = "Not found your email in our database";
		}
		}
	//If the message is sent successfully, display sucess message otherwise display an error message.
	if($sentmail==1)
	{
		$smsg = "Your Password Has Been Sent To Your Email Address.";
	}
		else
		{
		if($_POST['email']!="")
		$nmsg = "Cannot send password to your e-mail address.Problem with sending mail...";
	}
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
			<span type="text-danger"><?php if(isset($fmsg)) echo $fmsg;?></span>
			<span type="text-danger"><?php if(isset($headers)) echo $headers ;?></span>
			<span type="text-danger"><?php if(isset($body)) echo $body ;?></span>
			<span type="text-danger"><?php if(isset($smsg)) echo $smsg;?></span>
			<span type="text-danger"><?php if(isset($nmsg)) echo $nmsg;?></span>
			<p id="p-color">Already Registered? <a id="a-color"  href="index.php">login here</a></p>
			<p id="p-color">New User? <a id="a-color" href="register.php">create new account</a></p>
		</form>
		</div>
	<!-- end:Main Form -->
	</div>

</html>i
<?php ob_end_flush(); ?>
