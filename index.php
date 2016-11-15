<?php
require('main.html');
require('Dao.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username@email.com'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username@email.com']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username@email.com='$username'
and password='".md5($password)."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
        if($rows==1){
	    $_SESSION['username@email.com'] = $username;
            // Redirect user to index.php
	    header("Location: index.php");
         }else{
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='index.php'>Login</a></div>";
        echo "<p>Not registered yet? <a href='registration.php'>Register Here</a></p>";
	}
}
?>
