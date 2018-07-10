<?php

include('top.html');
include('db_login.php');

// Connect
$con = mysqli_connect( $db_host, $db_username, $db_password );
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

 // Select the database
 $db_select=mysqli_select_db($con, $db_database);

if (!$db_select){
    die ("Could not select the database: <br />". mysql_error());
}

$sql="INSERT INTO $db_table (Logdate, Logtime, Loghost, Logenv, Logcode, Logstatus)
VALUES
('$_GET[Logdate]','$_GET[Logtime]','$_GET[Loghost]','$_GET[Logenv]','$_GET[Logcode]','$_GET[Logstatus]')";

if (!mysqli_query($con, $sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con);

include('bottom.html');
?>