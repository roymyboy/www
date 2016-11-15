<?php
ob_start();
session_start();
require 'Dao.php';
require 'connect.php';
require 'sanitize.php';
//require 'users.php';
$current_file = explode('/', $_SERVER['SCRIPT_NAME']);
$current_file = end($current_file);
if (logged_in() === true) {
	$user_data = user_data('username', 'password', 'full name', 'email', 'password confirm');
	if (user_active($user_data['username']) === false){
		session_destroy();
		header('Location: index.php');
		exit();		
	}	
}
$errors = array (); 
?>

