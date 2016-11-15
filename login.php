<?php
include 'sessionStart.php';
logged_in_redirect();
if (empty ($_POST)=== false) {
	$username = $_POST['email'];
	$password = $_POST['password'];
	
	if (empty ($username) === true || empty($password) === true) {
		$errors[] = 'You need to enter a username and password';
		
		} else if (user_exists($username) === false){ $errors[] = 'We can not find that username. Have you registered?';
			
		} else if (user_active($username) ===false) {$errors[] = 'You have not activated your account yet';
		} else { 
		if (strlen($password) > 32) {
			$errors[] = 'Password too long';
			}
			$login = login($username, $password);
			if ($login === false) {
				$errors[] = 'That username/password combination is incorrect';
		} else {
			$_SESSION['user_id'] = $login;
			header('Location:index.php');
			exit();		
		}		
	}
} else {
	$errors[] = 'No data recieved';
}
if (empty($errors) === false){
?>	
	<h2> We tried to log you in, but...</h2>

<?php
	echo output_errors($errors);
}
?>



