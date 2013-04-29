<?php
  if (isset($_POST["deletecookie"])){
    setcookie("username", "", time()-3600);
    unset($_COOKIE["username"]);
  }
  else if ($_POST["uid"] != "" && $_POST["password"] != ""){
    $connection = mysql_connect("cs445sql", "dduggan", "ELddu301");
    if (!$connection){
      die ("Couldn't connect to mysql server!<br>The error was: " . mysql_error());
    }
    if (!mysql_select_db("dmo")){
      die ("Couldn't select a database!<br> Error: " . mysql_error());
    }
    $query = "SELECT name, password FROM person WHERE name='" . $_POST["uid"] ."'";
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
          $_COOKIE["username"] = $name;
        }
      }
    }
  }
  if (isset($_COOKIE["username"])){
?>
<html>
<head>
<title>Authentication example</title>
</head>
<body>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
  echo "<center>Welcome, " . $_COOKIE["username"] . "!<br><br>\n";
  echo "<form method=\"post\" action=\"login.php\">\n";
  echo "<input type=\"hidden\" name=\"deletecookie\">\n";
  echo "<input type=\"submit\" value=\"Logout\">\n";
  echo "</form></center></body></html>";
  }
  else{
?>
<html>
<head>
<title>Authentication</title>
</head>
<body>
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
</body>
</html>
<?php
  }
?>
