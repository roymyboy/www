<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
    header("Location: index.php");
}

include_once 'connect.php';

//check if form is submitted
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

    if ($row = mysqli_fetch_array($result)) {
        $_SESSION['usr_id'] = $row['id'];
        $_SESSION['usr_name'] = $row['name'];
        header("Location: index.php");
    } else {
        $errormsg = "Incorrect Email or Password!!!";
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
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" name= "loginform">
          <label for="username"></label>
          <input type="text" name="email" id="" placeholder="email@email.com" class="form-control" required>
          <label for="password"></label>
          <input type="password" name="pass" id="" placeholder="password" class="form-control" maxlength="15" required>
          <button type="submit" name= "login" value="Login">login</button>
          <div class="etc-login-form">
                <p>forgot your password? <a href="forgotpw.html">click here</a></p>
                <p>new user? <a href="register.php">create new account</a></p>
        </div>
        </form>

</html>
<?php ob_end_flush(); ?>
~         
