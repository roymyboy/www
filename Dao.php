<?php
	require_once "index.php";
	class Dao{
		private $host = "us-cdbr-iron-east-04.cleardb.net";
		private $db   = "heroku_c47f3897b8b9090";
		private $user = "bb04ad9bd04b27";
		private $pwd  = "3abc0052";
	
		public function getConnection(){
		     return new PDO("mysql:host={$this->host};dbname={$this->db}";$this->user; 					$this->pwd;);
		}	
	
	}
?>
