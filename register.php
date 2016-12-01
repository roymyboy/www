<?php 
session_start();
if(isset($_SESSION['usr_id'])) {
    header("Location: welcome.php");
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
    } else {
	//check if user already exists 
	$query = "SELECT email FROM users WHERE email='$email'";
	$result = mysqli_query($con, $query);
	$count = mysqli_num_rows($result);
		if($count != 0){
			$error = true;
			$email_error = "Provided email already exists";
		}
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
            $successmsg = "Successfully Registered! <a id="a-color"href='index.php'>Click here to Login</a>";
	 } else {
            $errormsg = "Error in registering...Please try again later!";
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
	<!--background image-->
	 <div id = "bg">
                <img src= "image/bg10.jpg" class="stretch" alt = ""/>
        </div>
<div class="container">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
                <fieldset>
                    <legend id="legendcolor">Sign Up</legend>

			<div class="form-group">
                        <label id="label-text-color" for="name">Name</label>
                        <input type="text" name="name" placeholder="Enter Full Name" required value="<?php if($error) echo $name; ?>" class="form-control" />
                        <span class="text-danger"><?php if (isset($name_error)) echo $name_error; ?></span>
                    </div>	
			<div class="form-group">
                        <label id="label-text-color" for="name">Email</label>
                        <input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="email" />
                        <span class="text-danger"><?php if (isset($email_error))echo  $email_error; ?></span>

                    </div>	
			<div class="form-group">
                        <label id="label-text-color" for="name">Password</label>
                        <input type="password" name="password" placeholder="Password" required class="password" />
                        <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>

                    </div>	
			<div class="form-group">
                        <label id="label-text-color" for="name">Confirm Password</label>
                        <input type="password" name="cpassword" placeholder="Confirm Password" required class="password" />
                        <span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>

                    </div>	
			<div class="form-group">
	
                        <button id="bgcolor" type="submit" name="signup" value="Sign Up" class="btn btn-primary" />Sign Up</button> </div>
		<div class= "etc-login-form">
                </fieldset>
            <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
        	<p id="p-color"> Already Registered? <a id="a-color" href="index.php">Login Here</a></p>
		</div>
            </form>
            <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
</div>
</body>
</html>
<?php ob_end_flush(); ?>
