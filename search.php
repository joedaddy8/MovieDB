<html>
<head>
<link href="http://fonts.googleapis.com/css?family=Dosis:300,400,500,600,700" rel="stylesheet" type="text/css" />
<link href="https://dl.dropboxusercontent.com/u/126050982/style.css" rel="stylesheet" type="text/css" media="all" />
<title>Search for Movies</title>
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

<h1 align='center'>Search for Movies</h1>
<form action='search.php' method='post' align='center'>
<input type='text' name='term' />
<select name='search_area'>
	<option value='movie_title'>Movie Title</option>
	<option value='director'>Director</option>
	<option value='producer'>Producer</option>
	<option value='editor'>Editor</option>
	<option value='actor'>Actor</option>
	<option value='actress'>Actress</option>
	<option value='genre'>Genre</option>
	<option value='keyword'>Keyword</option>
</select>
<input type='submit' value='Search' />
</form>

<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$term = $_POST['term'];
	$query;
	$searchArea = $_POST['search_area'];
	if($searchArea == "movie_title"){
		$query = "SELECT M.title, M.year FROM Movies M WHERE M.title LIKE '%$term%'";
	}
	elseif($searchArea == "director") {
		$query = "SELECT D.title, D.year FROM Directors D WHERE D.name LIKE '%$term%'";
	}
	elseif($searchArea == "producer") {
		$query = "SELECT D.title, D.year FROM Producers D WHERE D.name LIKE '%$term%'";
	}
	elseif($searchArea == "editor") {
		$query = "SELECT D.title, D.year FROM Editors D WHERE D.name LIKE '%$term%'";
	}
	elseif($searchArea == "actor") {
		$query = "SELECT D.title, D.year FROM Actors D WHERE D.name LIKE '%$term%'";
	}
	elseif($searchArea == "actress") {
		$query = "SELECT D.title, D.year FROM Actresses D WHERE D.name LIKE '%$term%'";
	}
	elseif($searchArea == "genre") {
		$query = "SELECT D.title, D.year FROM Genres D WHERE D.genre LIKE '%$term%'";
	}
	elseif($searchArea == "keyword") {
		$query = "SELECT D.title, D.year FROM Keywords D WHERE D.keyword LIKE '%$term%'";
	}
	
	
	
		$query = $query . ";";
		
		
		
	printMovieList($query);
	
	}
?>

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
