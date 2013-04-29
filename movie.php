<?php

	echo "<html><head><title>" . $_GET["title"] . " (" . $_GET["year"] . ")</title></head>";
	echo "<body>";
	
	$title = $_GET["title"];
	$year = $_GET["year"];

	$connection = mysql_connect("cs445sql", "dduggan", "EL301ddu");
  if (!$connection){
    die ("Couldn't connect to mysql server!<br>The error was: " . mysql_error());
  }
  
	$directors = mysql_query("SELECT D.name FROM Directors D WHERE D.title=' . $title . ' and D.year=' . (int)$year'"); 
	
	$producers = mysql_query("SELECT D.name FROM Producers D WHERE D.title=" . $title . " and D.year=" . (int)$year); 
	$editors = mysql_query("SELECT D.name FROM Editors D WHERE D.title=" . $title . " and D.year=" . (int)$year); 
	$genres = mysql_query("SELECT D.name FROM Genres D WHERE D.title=" . $title . " and D.year=" . (int)$year); 
	$keywords = mysql_query("SELECT D.keyword FROM Keywords D WHERE D.title=" . $title . " and D.year=" . (int)$year); 
	$actors = mysql_query("SELECT D.aname, D.rname FROM Actors D WHERE D.title=" . $title . " and D.year=" . (int)$year); 
	$actresses = mysql_query("SELECT D.aname, D.rname FROM Actresses D WHERE D.title=" . $title . " and D.year=" . (int)$year);
	
	echo "<h1>" . $title . "(" . $year .")</h1>";
	
	echo "<p>Producers: ";
	while ($row = mysql_fetch_array($producers)){
      echo "$row[0] ";
    }
		
	echo "<p>Directors: ";
	foreach($directors as $direc) {
	echo $direc . " ";
	}
	
	echo "<p>Editors: ";
	foreach($editors as $edit) {
	echo $edit . " ";
	}
	
	echo "<p>Genres: ";
	foreach($genres as $g) {
	echo $g . " ";
	}
	
	echo "<p>Keywords: ";
	foreach($keywords as $key) {
	echo $key . " ";
	}
	
	
	



?>