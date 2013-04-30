<?php
  echo "<center>Welcome, " . $_COOKIE["username"] . "!<br><br>\n";
  echo "<a href='/php-wrapper/cs445_7_s13/'>Home Page</a>";
  echo "<form method=\"post\" action=\"login.php\">\n";
  echo "<input type=\"hidden\" name=\"deletecookie\">\n";
  echo "<input type=\"submit\" value=\"Logout\">\n";
  echo "</form></center></body></html>";
 
	  print '<script type="text/javascript">';
	  print 'document.forms[0].submit();';
	  print '</script>';
	 
 ?>
