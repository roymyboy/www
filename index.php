<?php 
	include_once("index.html"); 
	ob_start();
 	include("Dao.php");
 	session_start();
	
	 if($_SERVER["REQUEST_METHOD"] == "POST") {
	
	 // it will never let you open index(login) page if session is set
	 if ( isset($_SESSION['user'])!="" ) {
 		 header("Location: home.php");
	  exit;
	 }
	
    	  // username and password sent from form 	
	 $myusername = mysqli_real_escape_string($db,$_POST['username']);
         $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM admin WHERE username = '$myusername' and passcode = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }

?>
