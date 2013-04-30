<html>
<head>
<link href="http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700" rel="stylesheet" type="text/css" />
<link href="https://dl.dropboxusercontent.com/u/126050982/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="#">Movie Database</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="/php-wrapper/cs445_7_s13/" accesskey="1" title="">Homepage</a></li>
				<?php  if(isset($_COOKIE["admin"])) :	?>
				<li><a href="/php-wrapper/cs445_7_s13/admin.php" accesskey="2" title="">Admin CP</a></li>
				<?php  endif; ?>
				<li><a href="/php-wrapper/cs445_7_s13/top100.php" accesskey="3" title="">Top 100</a></li>
				<li><a href="/php-wrapper/cs445_7_s13/recomended.php" accesskey="4" title="">Recomended</a></li>
				<?php  if(!isset($_COOKIE["username"])) : ?>
				<li><a href="/php-wrapper/cs445_7_s13/login.php" accesskey="5" title="">Login</a></li>
				<?php else :	?>
				<li><a href="/php-wrapper/cs445_7_s13/logout.php" accesskey="5" title="">Log Out</a></li>
				<?php  endif;   ?>
			</ul>
		</div>
	</div>
	<div id="page">
			<div id="sidebar" style="align=right;">
			<div id="tbox1">
				<h2>Recomended Movies</h2>
				<?php 

function printRecommendedMovieList($query)
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

	
	for($i=1;$i<6;$i++){
		$row = mysql_fetch_array($result);
		//echo "<img src='http://en.wikipedia.org/wiki/File:$row[0].jpg'></img>";
		if($i==1)
		{
			echo "<ul class=\"style2\">";
					echo "<li class=\"first\">";
						echo "<h3>$i.<a href='http://cs445.cs.umass.edu/php-wrapper/cs445_7_s13/movie.php?title=$row[0]&year=$row[1]'>$row[0] ($row[1])</a></h3>";
					echo "</li>";
		}
		else
		{
					echo "<li>";
						echo "<h3>$i.<a href='http://cs445.cs.umass.edu/php-wrapper/cs445_7_s13/movie.php?title=$row[0]&year=$row[1]'>$row[0] ($row[1])</a></h3>";
					echo "</li>";
		}
		
		echo "<br>";
	}
	
	}




}

?>

<?php 

	printRecommendedMovieList("SELECT Ratings.title as MovieTitle, Ratings.year as MovieYear, COUNT(Ratings.title) as NumRatings, AVG(Ratings.user_rating) as AverageRating
FROM Ratings GROUP BY Ratings.title HAVING COUNT(Ratings.title) > 1500 ORDER BY Rand() DESC;");

?>
<!--
				<ul class="style2">
					<li class="first">
						<h3><a href="#">Movie Name</a></h3>
						<p><a href="#">Cool description that may go on for a little bit, but rambling is nice sometimes.</a></p>
					</li>
					<li>
						<h3><a href="#">Movie Name 2</a></h3>
						<p><a href="#">Cool description that may go on for a little bit, but rambling is nice sometimes.</a></p>
					</li>
					<li>
						<h3><a href="#">Movie Name 3</a></h3>
						<p><a href="#">Cool description that may go on for a little bit, but rambling is nice sometimes.</a></p>
					</li>
					<li>
						<h3><a href="#">Movie Name 4</a></h3>
						<p><a href="#">Cool description that may go on for a little bit, but rambling is nice sometimes.</a></p>
					</li>
				</ul>
				<p><a href="#" class="button-style">Top 100</a></p>
			</div>
		</div>-->
				</div>
			</div>
		<div id="content">
<!-- END OF TOP TO COPPY -->
<div style="align:left;">
<h1><u>New Movies</u></h1>
<br />

<h3>42</h3>
<img src="http://i.imgur.com/PM1Jc9P.png" />
<br />
<br />

<h3>Jurassic Park 3D</h3>
<img src="http://i.imgur.com/A9o45rb.png" />
<br />
<br />

<h3>Iron Man 3</h3>
<img src="http://i.imgur.com/5FDSPMo.png" />
<br />
<br />

<h3>Olympus Has Fallen</h3>
<img src="http://i.imgur.com/llNeq0T.png" />
<br />
<br />

<h3>Oblivion (2013)</h3>
<img src="http://i.imgur.com/8rFeXki.png" />
<br />
<br />
</div>


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