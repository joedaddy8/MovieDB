<?php
if(isset($_COOKIE["username"])) {
	echo "LOGGED IN";
	echo $_COOKIE["username"];
}else{
	echo "NOT LOGGED IN";
	echo $_COOKIE["username"];
	header("http://cs445.cs.umass.edu/php-wrapper/cs445_7_s13/login.php");
	exit();
}

?>
