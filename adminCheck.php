<?php
if(! isset($_COOKIE["admin"])) {
	echo("NOT ADMIN");
	header("http://cs445.cs.umass.edu/php-wrapper/cs445_7_s13/login.php");
	exit();
}else{
	echo("IS ADMIN");
	echo($_COOKIE["admin"]);
}

?>
