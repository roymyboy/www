<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
	header("Location: welcome.php");
}

include_once 'connect.php';

//check if form is submitted
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
	$count = mysqli_num_rows($result);
	

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['id'];
		$_SESSION['usr_name'] = $row['name'];
		header("Location: welcome.php");
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}

	 if( $count == 1 && $row['password']==$password ) {
    		$_SESSION['user'] = $row['userId'];
    		header("Location: home.php");
   	} else {
    		$errormsg = "Incorrect Email or Password, Try again!!!";
   	}
	

}  
?>

<!DOCTYPE html>
<html>
<body>
	<head>
		<link rel = "stylesheet" type="text/css" href="style.css">
		<link rel = "icon" type ="image/png" href= "image/favicon.png">
	</head>
<!--back ground image-->
<div id="bg"><img src= "image/bg0.jpg" class="stretch" alt = ""/></div>
	<!--Login setup-->
   <div class="Container">	
	<form role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" name= "loginform"> 
		<fieldset>

			<legend id="legendcolor" >Login</legend>
	               <span class="text-danger"> <style= "color:red"><?php if(isset($errormsg)){echo $errormsg;}?></span>
		<div class="form-group">
			<label for="email"></label>
			<input type="email" name="email" placeholder="email@email.com" required class="email">
		</div>
		<div class="form-group">
			<label for="password"></label>
			<input type="password" name="password" placeholder="password" required class="password">
		</div>
		<div class="form-group">
			<button type="submit" name= "login" value="Login" class="btn btn-primary">login</button> </div>
<script>
    var count = 1;
    function setColor(button, color) {
        var property = document.getElementById(button);
        if (count == 0) {
            property.style.backgroundColor = "#FFFFFF"
            count = 1;        
        }
        else {
            property.style.backgroundColor = "#7FFF00"
            count = 0;
        }
    }
</script>
		<div class="etc-login-form">
		</fieldset>
			<p id= "p-color">Forgot Password? <a id="a-color" href="forgotpw.html">click here</a></p>
			<p id= "p-color">New User? <a id="a-color" href="register.php">create new account</a></p>
		</div>
	</form>
   </div>
</body>
</html>
<?php ob_end_flush(); ?>
~         
