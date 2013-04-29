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
 
	function runQuery(){
		$result = mysql_query($_POST['query']);
		return $result;
	}

	function getTableColumnNames($table_name){
		$result = mysql_query("SELECT * FROM information_schema.columns WHERE table_name = '$table_name' ORDER BY ordinal_position;");
		$columns = array();
		while ($row = mysql_fetch_array($result)){
		   	array_push($columns, $row[3]);
		}
	return $columns;
	}

	//Table Name
	if($_POST['table_name']){
		echo $_POST['table_name'];
		echo " Table<br>\n";
	    }
	echo "<table border='1px'><tr>";

	//Add column names if table is specified
 	if($_POST['table_name']){
		$column_names = getTableColumnNames($_POST['table_name']);
		foreach($column_names as $name){
			echo "<th>$name</th>";
		}
		echo "</tr><tr>";
	}	

	$result = runQuery();
	  if (!$result)
	    echo "Query failed!";
	  else{
	    echo "Query successful.<br>\n";
	    
	    while ($row = mysql_fetch_array($result)){
		
		$count = 0;
		foreach($row as $r){
	        	if(is_float($count/2)){
				echo "  <td>$r</td>";
		        }
			$count +=1;
		}
		echo "</tr><br>\n";
	      //echo "title: $row[0], year: $row[1], length: $row[2], mpaa: $row[3]<br>\n";
	      }
           }
	echo "</tr></table";
 ?>
</body>
</html>
