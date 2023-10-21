<?php
	class Session{
		public static function userConnected(){
			return isset($_SESSION["login"]);
		}
		
		public static function adminConnected(){
			return (isset($_SESSION["login"]) && isset($_SESSION["isAdmin"]) && $_SESSION["isAdmin"]==1);
		}
		
	}
?>