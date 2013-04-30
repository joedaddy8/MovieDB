<?php 

function printMovieList($query)
{
	$connection = mysql_connect("cs445sql", "dduggan", "EL301ddu");
  if (!$connection){
    die ("Couldn't connect to mysql server!<br>The error was: " . mysql_error());
  }
  
  if (!mysql_select_db("dmo"))
    die ("Couldn't select a database!<br> Error: " . mysql_error());
	
	$result = mysql_query($query);
	if(! $result){
	echo "Error!";
	}
	else {
	while($row = mysql_fetch_array($result))
	{
		echo "<a href='http://cs445.cs.umass.edu/php-wrapper/cs445_7_s13/movie.php?title=$row[0]&year=$row[1]'>$row[0] ($row[1])</a>";
		echo "<br>";
	}
}
}

?>

<?php 

	printMovieList("SELECT M.title, M.year FROM Movies M WHERE M.year='2008'");

?>