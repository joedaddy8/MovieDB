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

<h1>&nbsp Top 100 Movies</h1>
<br />
<?php 

function printTopMovieList($query)
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
	$i = 0;
	while($row = mysql_fetch_array($result))
	{
	$i++;
		echo "$i.&nbsp&nbsp<a href='http://cs445.cs.umass.edu/php-wrapper/cs445_7_s13/movie.php?title=$row[0]&year=$row[1]'>$row[0] ($row[1])</a>";
		echo "<br>";
		if($i == 100){
			break;
		}
	}
}
}



 

	printTopMovieList("SELECT Ratings.title as MovieTitle, Ratings.year as MovieYear, COUNT(Ratings.title) as NumRatings, AVG(Ratings.user_rating) as AverageRating
FROM Ratings GROUP BY Ratings.title HAVING COUNT(Ratings.title) > 1000 ORDER BY AverageRating DESC;");

?>
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
