<?php
include 'sessionStart.php';

if (empty($_POST) === false){
		$required_fields = array ('username', 'password', 'password Confirm', 'full name', 'email');
		foreach($_POST as $key=>$value){
			if (empty($value) && in_array ($key, $required_fields) === true){
				$errors[] = '<h2> Shucks,... something went wrong! Please fill the form again to register.</h2><br><h4>Feilds marked with an asterisk are required</h4>';
				break 1;
				
			}
			 
		}
	
	if (empty($errors) === true){
		if (user_exists($_POST['username']) === true) {
			$errors[] = '<h4>Sorry, the username \'' . $_POST['username'] . '\' is already taken</h4>';
		}
	if (preg_match("/\\s/",$_POST['username']) == true){
			$errors[] = '<h4>Your username must not contain any spaces</h4>';
		}
		
	if (strlen($_POST['password']) < 8) {
		$errors[] = '<h4>Your password must be at least 8 characters</h4>';
		
		}
		
	if ($_POST['password'] !== $_POST['password_again']){
		$errors[] = '<h4>Your passwords do not match</h4>';
		
		}
		
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
		$errors[] = '<h4> A valid email address is required</h4>';
		
		}
	if (email_exists($_POST[email]) === true) {
		$errors[] = '<h4>Sorry, the email  \'' . $_POST['email'] . '\' is already in use</h4>';
		}
		
		
		
	}
		
 }

?>
<?php
if (isset($_GET['success']) && empty ($_GET['success'])) {
} else { 
	if (empty($_POST) === false && empty ($errors) === true) {
		$register_data = array(
			'username' 		=> $_POST[nl2br(htmlspecialchars('username'))],
			'password' 		=> $_POST[nl2br(htmlspecialchars('password'))],
			'full name' 		=> $_POST[nl2br(htmlspecialchars('full name'))],
			'email' 		=> $_POST[nl2br(htmlspecialchars('email'))]
		);
	
		register_user($register_data);
		header('Location: register.php?success');
		exit();
		
	} else if (empty($errors) === false) {
		echo output_errors($errors);
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
                                <p>already have an account? <a href="index.html">login here</a></p>
                        </div>
                </form>
        </div>
        <!-- end:Main Form -->
<?php } ?>
</div>
</body>
</html>
