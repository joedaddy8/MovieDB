<html>
<head>
</head>
<body>
  MOOOOOOVIES!!!!

  <?php
	$connection = mysql_connect("cs445sql", "soran", "EL533sor");
	if(!$connection){
		die ("Couldn't connect to mysql server!<br>The error was: " . mysql_error());
	}
	else{
		echo("Connection successful!<br>\n");
	}
	if (!mysql_select_db("dmo"))
		die ("Couldn't select a database!<br> Error: " . mysql_error());
	else
		echo "Database selected successfully.<br>\n";
 
?>
        <form action="sql_query.php" method="post">
		<textarea name="query" cols="30" rows="5"></textarea>
		<textarea name="table_name" cols="20" rows="1"></textarea>
		<input value="Submit" type="submit" />
	</form>
</body>
</html>
