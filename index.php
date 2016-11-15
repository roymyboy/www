<?php
 ob_start();
 session_start();
 require_once 'connect.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['user'])!="" ) {
  header("Location: welcome.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=mysql_query("SELECT userId, userName, userPass FROM users WHERE userEmail='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1 && $row['userPass']==$password ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: welcome.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
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

        <!--back ground image-->
        <div id = "bg">
         <img src= "image/bg3.jpg" class="stretch" alt = ""/>
        </div>

        <!--Login setup-->
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
          <label for="username"></label>
          <input type="email" name="name" id="" placeholder="email@email.com" class="username" <?php echo $email;?> maxlength= "40" required>
          <label for="password"></label>
          <input type="password" name="password" id="" placeholder="password" class="from-control" maxlength="15" required>
          <button type="submit" name= "btn-login" value="Login">login</button>
          <div class="etc-login-form">
                <p>forgot your password? <a href="forgotpw.html">click here</a></p>
                <p>new user? <a href="register.php">create new account</a></p>
        </div>
        </form>

</html>
<?php ob_end_flush(); ?>
~         
