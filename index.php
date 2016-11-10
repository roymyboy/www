<?php
 
//login.php
require 'index.html';
/**
 * Start the session.
 */
session_start();
 
/**
 * Include ircmaxell's password_compat library.
 */
require 'password.php';
 
/**
 * Include our MySQL connection.
 */
require 'Dao.php';
 
 
//If the POST var "login" exists (our submit button), then we can
//assume that the user has submitted the login form.
if(isset($_POST['login'])){
    
    //Retrieve the field values from our login form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //Retrieve the user account information for the given username.
    $sql = "SELECT id, username, password FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind value.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch row.
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If $row is FALSE.
    if($user === false){
        //Could not find a user with that username!
        //PS: You might want to handle this error in a more user-friendly manner!
        die('Incorrect username / password combination!');
    } else{
        //User account found. Check to see if the given password matches the
        //password hash that we stored in our users table.
        
        //Compare the passwords.
        $validPassword = password_verify($passwordAttempt, $user['password']);
        
        //If $validPassword is TRUE, the login has been successful.
        if($validPassword){
            
            //Provide the user with a login session.
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();
            
            //Redirect to our protected page, which we called home.php
            header('Location: home.php');
            exit;
            
        } else{
            //$validPassword was FALSE. Passwords do not match.
            die('Incorrect username / password combination!');
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
         <script src="js/prefixfree.min.js"></script>
        <form action="index.php" method="post">
          <label for=""></label>
          <input type="text" name="" id="" placeholder="username@email.com" class="email" required>
          <label for=""></label>
          <input type="password" name="" id="" placeholder="password" class="pass" required>
          <button type="submit">login</button>
          <div class="etc-login-form">
                <p>forgot your password? <a href="forgotpw.html">click here</a></p>
                <p>new user? <a href="register.html">create new account</a></p>
        </div>
        </form>

         <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</html>
