<?php
ini_set( "display_errors", 0);
  $con = mysql_connect("HOST","USR","PSWRD");
  if (!$con)
    {
    die('Could not connect: ' . mysql_error());
    }
  
  mysql_select_db("DATABASE", $con);
  
  $result = mysql_query("SELECT * FROM list");
  
  while($row = mysql_fetch_array($result))
    {
	  $file = "<html>
  <head>
  <meta http-equiv=\"Refresh\" content=\"0;url=$row[url]\" />
  </head>
  <body>
    <div style=\"margin:13px\">
    <p>Redirecting: <a style=\"color:#09C; text-decoration:none;\" href=\"$row[url]\" target=\"_blank\">$row[name]</a></p>
    </div>
  </body>
</html>";

	  $folder = $row['name'];
	  mkdir( $folder, 0777 );
	  file_put_contents("". $folder ."/index.htm", $file);
    }
  
  mysql_close($con);
  ?>