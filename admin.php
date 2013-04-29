<html>
<head>
</head>
<body>

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
<h1>SQL Query Interface</h1>
        <form action="sql_query.php" method="post">
		<table>
			<tr>
				<td>
					<label for="query">SQL Query</label>
				</td>
				<td>
					<textarea name="query" cols="30" rows="5"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<label for="table_name">Tablename (optional)</label>
				</td>
				<td>			
					<textarea name="table_name" cols="20" rows="1"></textarea>
				</td>
			</tr>
		</table>	
			<input value="Submit" type="submit" />
	</form>
</body>
</html>
