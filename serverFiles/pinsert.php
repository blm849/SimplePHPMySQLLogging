<?php

// Insert values into a database (defined in db_login.php). 
// This PHP file is invoked by an online form or an API call.

// Initialization: display a standard header (top.html) and then get database
// login information.

include('top.html');			
include('db_login.php');

// Connect to the database.
$con = mysqli_connect( $db_host, $db_username, $db_password );
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

 // Select the database to insert values into
 $db_select=mysqli_select_db($con, $db_database);
if (!$db_select){
    die ("Could not select the database: <br />". mysql_error());
}

 // Insert the values passed to this program via a form or API call.
 $sql="INSERT INTO $db_table (Logdate, Logtime, Loghost, Logenv, Logcode, Logstatus)
VALUES
('$_REQUEST[Logdate]','$_REQUEST[Logtime]','$_REQUEST[Loghost]','$_REQUEST[Logenv]','$_REQUEST[Logcode]','$_REQUEST[Logstatus]')";
if (!mysqli_query($con, $sql))
  {
  die('Error: ' . mysqli_error($con));
  }
  
// Finalization. Log that the record has been added, close the connection to the 
// database, and then display a standard footer (bottom.html).
echo "1 record added";
mysqli_close($con);
include('bottom.html');
?>