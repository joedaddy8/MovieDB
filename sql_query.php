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
 
	function runQuery(){
		$result = mysql_query($_POST['query']);
		return $result;
	}

	//Table Name
	if($_POST['table_name']){
		echo "<h1>",$_POST['table_name'];
		echo " Table</h1><br>\n";
	    }
	echo "<table border='1px'><tr>";

	//Add column names if table is specified
 		

	$result = runQuery();
 	if (!$result)
		echo "Query failed!";
	else{
	    echo "Query successful.<br>\n";
		
	    for($i = 0; $i < mysql_num_fields($result); $i++) {
		   echo '<th>'. mysql_field_name($result, $i). '</th>';
	    }
	    echo "<tr>";    
	    while ($row = mysql_fetch_array($result)){
		
		$count = 0;
		foreach($row as $r){
	        	if(is_float($count/2)){
				echo "  <td>$r</td>";
		        }
			$count +=1;
		}
		echo "</tr>";
	      //echo "title: $row[0], year: $row[1], length: $row[2], mpaa: $row[3]<br>\n";
	      }
           }
	echo "</tr></table";
 ?>
</body>
</html>
