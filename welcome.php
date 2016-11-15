<?php
   session_start();
   include_once 'connect.php';
?>
<html>
   <head>
      <title>Welcome </title>
   </head>
   <body>
      <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['usr_id'])){ ?>
                <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
                <li><a href = "logout.php">Sign Out</a> <?php } ?>
	    </li></ul>
      </div>
   </body>
</html>
