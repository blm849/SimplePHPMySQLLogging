<?php

// Create a table in a database (defined in db_login.php). 
// This PHP file is invoked when the application is currently installed.

// Initialization: get database login information.

include('db_login.php');

// Connect to the database.
$con = mysqli_connect( $db_host, $db_username, $db_password );
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

// Select the database to insert values into. Table name is in db_login.php
 $db_select = mysqli_select_db($con, "$db_database");
if (!$db_select){
    die ("Could not select the database: <br />". mysql_error());
}

// Create the SQL statement to create the table in the database.
$sql = "CREATE TABLE $db_table
(
Logdate varchar(15),
Logtime varchar(15),
Loghost varchar(15),
Logenv varchar(15),
Logcode varchar(15),
Logstatus varchar(132)
)";

// Execute the SQL to create the table.
$result = mysqli_query($con, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

// Finalization. Log that the database has been setup and then close the connection to the 
// database.
echo "    Database setup program complete";
mysqli_close($con);
?> 
