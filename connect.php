<?php
$conn = mysql_connect('us-cdbr-iron-east-04.cleardb.net', 'bb04ad9bd04b27', '3abc0052');
$dbcon =mysql_select_db('heroku_c47f3897b8b9090');
 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }
?>

