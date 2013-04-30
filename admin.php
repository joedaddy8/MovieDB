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

	 if(!isset($_COOKIE["admin"])){ 
		echo("YOU ARE NOT AN ADMINISTRATOR");
		echo("GET OUT OF HERE!!!");
		header("http://cs445.cs.umass.edu/php-wrapper/cs445_7_s13/login.php");
		exit();
	 }

	$connection = mysql_connect("cs445sql", "soran", "EL533sor");
	if(!$connection){
		die ("Couldn't connect to mysql server!<br>The error was: " . mysql_error());
	}
	else{
		//echo("Connection successful!<br>\n");
	}
	if (!mysql_select_db("dmo"))
		die ("Couldn't select a database!<br> Error: " . mysql_error());
	else
		//echo "Database selected successfully.<br>\n";
 
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
<!-- START OF END TO COPPY -->
		</div>
		<div id="three-column">
		</div>
	</div>
	<div id="footer">
		<p>Jordan Moore, Dan Duggan and Serkan Oran's cool site.</p>
	</div>
</div>
</body>
</html>
