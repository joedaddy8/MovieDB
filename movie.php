<html>
<head>
<link href="http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700" rel="stylesheet" type="text/css" />
<link href="https://dl.dropboxusercontent.com/u/126050982/style.css" rel="stylesheet" type="text/css" media="all" />
<?php echo "<title>" . $_GET["title"] . " (" . $_GET["year"] . ")</title>" ?>
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
		<div id="content">
<!-- END OF TOP TO COPPY -->


<?php	
	$title = $_GET["title"];
	$year = $_GET["year"];

	$connection = mysql_connect("cs445sql", "dduggan", "EL301ddu");
  if (!$connection){
    die ("Couldn't connect to mysql server!<br>The error was: " . mysql_error());
  }
  
  if (!mysql_select_db("dmo"))
    die ("Couldn't select a database!<br> Error: " . mysql_error());
  
	$directors = mysql_query("SELECT D.name FROM Directors D WHERE D.title='$title' and D.year='$year'"); 
//	echo $directors;
	$producers = mysql_query("SELECT D.name FROM Producers D WHERE D.title='$title' and D.year='$year'"); 
	$editors = mysql_query("SELECT D.name FROM Editors D WHERE D.title='$title' and D.year='$year'"); 
	$genres = mysql_query("SELECT D.genre FROM Genres D WHERE D.title='$title' and D.year='$year'"); 
//	echo $genres;
	$keywords = mysql_query("SELECT D.keyword FROM Keywords D WHERE D.title='$title' and D.year='$year'"); 
	$actors = mysql_query("SELECT D.aname, D.rname FROM Actors D WHERE D.title='$title' and D.year='$year'"); 
	$actresses = mysql_query("SELECT D.aname, D.rname FROM Actresses D WHERE D.title='$title' and D.year='$year'");
	
	echo "<h1 align='center'>" . $title . " (" . $year .")</h1>";
	echo "<h3 align='center'>Average Rating: " . calculateRating($title,$year) . "</h3>";
	
	echo "<h2 align='center'>Produced By</h2><p align='center'> ";
	if(! $producers) {
	echo "Error.";
	}
	else{
	while ($row = mysql_fetch_array($producers)){
      echo "$row[0]; ";
    }
	}
		
	echo "<h2 align='center'>Directed By</h2><p align='center'>";
	if( ! $directors) {
	echo "Error.";
	} 
	else {
	while($row = mysql_fetch_array($directors)) {
		echo "$row[0]; ";
	}
	}
	
	echo "<h2 align='center'>Editors</h2><p align='center'>";
	if( ! $editors) {
	echo "Error.";
	} 
	else {
	while($row = mysql_fetch_array($editors)) {
		echo "$row[0]; ";
	}
	}
	
	echo "<h3 align='center'>Genres</h3><p align='center'>";
	if( ! $genres) {
	echo "Error. ";
	} 
	else {
	$i = 0;
	while($row = mysql_fetch_array($genres)) {
	if($i > 0)
	echo ", ";
		echo "$row[0]";
		$i++;
	}
	}
	
	
	
	echo "<br>";
	//Actors and actresses
	
	echo "<h2 align='center'>Cast</h2>";
	
	echo "<table border='1' align='center'><tr><td>Actor/Actress</td><td>Role</td>";
	if(! $actors) {
	echo "derp! a mistake!";
	}
	else {
	while($row = mysql_fetch_array($actors)) {
		echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
	}
	while($row = mysql_fetch_array($actresses)) {
		echo "<tr><td>$row[0]</td><td>$row[1]</td></tr>";
	}
	}
	echo "</table>";
	
	
	echo "<br>";
	echo "<p>Keywords: ";
	if( ! $keywords) {
	echo "Error.";
	} 
	else {
	$i = 0;
	while($row = mysql_fetch_array($keywords)) {
	if($i > 0)
	echo ", ";
		echo "$row[0]";
		$i++;
	}
	}
	?>
	<?php
	
	function calculateRating($mtitle,$myear)
	{
	$connection = mysql_connect("cs445sql", "dduggan", "EL301ddu");
  if (!$connection){
    die ("Couldn't connect to mysql server!<br>The error was: " . mysql_error());
  }
  
  if (!mysql_select_db("dmo"))
    die ("Couldn't select a database!<br> Error: " . mysql_error());
	
	$result = mysql_query("SELECT AVG(user_rating) as AvgRate FROM Ratings R WHERE R.title='$mtitle' and R.year='$myear' GROUP BY R.title;"); 
	return $result;
	
	}

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
