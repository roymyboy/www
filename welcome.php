<?php
   session_start();
   include_once 'connect.php';
?>
<html>
   <head>
      <title>Welcome </title>
   </head>


<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Fixed Top Navigation Toolbar</title>
  <meta name="author" content="Jake Rocheleau">
  <link rel="shortcut icon" href="http://designshack.net/favicon.ico">
  <link rel="icon" href="http://designshack.net/favicon.ico">
  <link rel="stylesheet" type="text/css" media="all" href="style.css">
  <link rel="stylesheet" type="text/css" media="all" href="http://fonts.googleapis.com/css?family=Capriola">
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>

<body>
  <nav id="fixedbar">
    <ul id="fixednav">
      <li><a href="#">Home</a></li>
      <li><a href="#">Slide Show</a></li>
      <li><a href="#">Setting</a></li>
      <?php if (isset($_SESSION['usr_id'])){ ?>
      <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
      <li><a href= "logout.php">Sign Out</a> <?php } else { ?>
      <li><a href="index.php">Login</a></li><?php } ?>
      </li>
    </ul>
  </nav>
  
  <div id="w"> 
    <nav id="navigation">
      <ul>
        <li><a href="#">Homepage</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Settig</a></li>
      <?php if (isset($_SESSION['usr_id'])){ ?>
      <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
      <li><a href= "logout.php">Sign Out</a> <?php } else { ?>
      <li><a href="index.php">Login</a></li><?php } ?>
      </li>
      </ul>
    </nav>  
  </div>
<script type="text/javascript">
$(document).ready(function(){
  $('#navigation a, #fixedbar a').on('click', function(e) {
    e.preventDefault();
  });
  
  $(window).on('scroll',function() {
    var scrolltop = $(this).scrollTop();

    if(scrolltop >= 215) {
      $('#fixedbar').fadeIn(250);
    }
    
    else if(scrolltop <= 210) {
      $('#fixedbar').fadeOut(250);
    }
  });
});
</script>
	<!DOCTYPE html>
      <div class="collapse navbar-collapse" id="navbar1">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isset($_SESSION['usr_id'])){ ?>
                <li><p class="navbar-text">Signed in as <?php echo $_SESSION['usr_name']; ?></p></li>
                <li><a href= "logout.php">Sign Out</a> <?php } else { ?>
		<li><a href="index.php">Login</a></li>
		<?php } ?>
	    </li></ul>
      </div>
   </body>
</html>
