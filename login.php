<html>
<head>
<link href="http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700" rel="stylesheet" type="text/css" />
<link href="https://dl.dropboxusercontent.com/u/126050982/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="/php-wrapper/cs445_7_s13/">Movie Database</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="/php-wrapper/cs445_7_s13/" accesskey="1" title="">Homepage</a></li>
				<?php  if(isset($_COOKIE["admin"])) :	?>
				<li><a href="/php-wrapper/cs445_7_s13/admin.php" accesskey="2" title="">Admin CP</a></li>
				<?php  endif; ?>
				<li><a href="/php-wrapper/cs445_7_s13/top100.php" accesskey="3" title="">Top 100</a></li>
				<li><a href="/php-wrapper/cs445_7_s13/recommended.php" accesskey="4" title="">Recommended</a></li>
				<?php  if(!isset($_COOKIE["username"])) : ?>
				<li><a href="/php-wrapper/cs445_7_s13/login.php" accesskey="5" title="">Login</a></li>
				<?php else :	?>
				<li><a href="/php-wrapper/cs445_7_s13/logout.php" accesskey="5" title="">Log Out</a></li>
				<?php  endif;   ?>
			</ul>
		</div>
	</div>
	<div id="page">
		<div id="content">
<!-- END OF TOP TO COPPY -->

<?php
  if (isset($_POST["deletecookie"])){
    setcookie("username", "", time()-3600);
    //unset("username",  time()-3600);
    setcookie("admin", "", time()-3600);
    //unset("admin", '', time()-3600);
  
	  print '<script type="text/javascript">';
	  print 'location.reload();';
	  print '</script>';
   }
  else if (isset($_POST["uid"]) && isset($_POST["password"])){
    $connection = mysql_connect("cs445sql", "dduggan", "EL301ddu");
    if (!$connection){
      die ("Couldn't connect to mysql server!<br>The error was: " . mysql_error());
    }
    if (!mysql_select_db("dmo")){
      die ("Couldn't select a database!<br> Error: " . mysql_error());
    }
    $query = "SELECT name, password FROM Users WHERE name='" . $_POST["uid"] ."'";
    $result = mysql_query($query);
    if (!$result){
      die("User not found!" . mysql_error());
    }
    else{
      if ($row = mysql_fetch_array($result)){
        $name = $row[0];
        $pass = $row[1];
        if ($pass == $_POST["password"]){
	  setcookie("username", $name, time()+3600);
          //$_COOKIE["username"] = $name;
		
	  if($name == "AMY AARON"){
	    setcookie("admin", $name, time()+3600);
	    //$_COOKIE["admin"] = $name;

	  }
	header('Location: /php-wrapper/cs445_7_s13/');
	exit;
        }
      }
    }
  }
  if (isset($_COOKIE["username"])) :
?>
<html>
<head>
<title>Authentication Successfull</title>
</head>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
  echo "<center>Welcome, " . $_COOKIE["username"] . "!<br><br>\n";
  echo "<a href='/php-wrapper/cs445_7_s13/'>Home Page</a>";
  echo "<form method=\"post\" action=\"login.php\">\n";
  echo "<input type=\"hidden\" name=\"deletecookie\">\n";
  echo "<input type=\"submit\" value=\"Logout\">\n";
  echo "</form></center></body></html>";
  
  else :
?>
<html>
<head>
<title>Authentication</title>
</head>
<body>
<?php
	  print '<script type="text/javascript">';
	  print 'echo("Invalid username/password combination")';
	  print '</script>';
	?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form method="post" action="login.php">
  <div align="center">
    <table border="1" bordercolor="#000000">
      <tr>
        <td>Enter your user ID: </td>
        <td>
          <div align="left">
            <input type="text" name="uid" />
          </div>
        </td>
      </tr>
      <tr>
        <td>Enter your password: </td>
        <td>
          <div align="left">
            <input type="text" name="password" />
          </div>
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <div align="center">
            <input type="submit" value="Submit">
          </div>
        </td>
      </tr>
    </table>
  </div>
</form>
Use 'ANDREW AAGARD' as the username.
Use 'v0fsC53t' as the password.
<br>
Admin account is 'AMY AARON'.
Admin password is 'Aa$#zhLO'.

</body>
</html>
<?php
  endif;
?>
