<?php

// Only proceed if a proper pin has been passed

include("top.html");
if ($_REQUEST[QueryPIN] <> "88233" ) {
		echo "You need to pass the correct PIN to proceed.";
		include("bottom.html");
		exit(1);
	}

include("top.html");
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

// $sql="SELECT * FROM $db_table  WHERE Logenv='" . 'DEV' . "';";


$sql="SELECT * FROM $db_table";

// Determine if we need a WHERE clause at the end of our SQL statement
if ($_REQUEST[Logdate] || $_REQUEST[Loghost] || $_REQUEST[Logenv]) {
	$sql = $sql . " WHERE ";
	$andFlag = 0;

	if ($_REQUEST[Logdate]) {
		$sql = $sql . " Logdate='" . $_REQUEST[Logdate] . "'";
		$andFlag = 1;
	}
	if ($_REQUEST[Loghost]) {
		if ($andFlag) {
			$sql = $sql . " AND ";
		}
		$sql = $sql . " Loghost='" . $_REQUEST[Loghost] . "'";
		$andFlag = 1;
	}
	if ($_REQUEST[Logenv]) {
		if ($andFlag) {
			$sql = $sql . " AND ";
		}
		$sql = $sql . " Logenv='" . $_REQUEST[Logenv] . "'";
		$andFlag = 1;
	}
	
}

$sql = $sql . " ORDER BY Logdate DESC LIMIT 80;";
	
$result = mysqli_query($con, $sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

echo "<table border='1'>
<tr>
<th>Date</th>
<th>Time (UTC)</th>
<th>Location</th>
<th>Env.</th>
<th>Code</th>
<th>Status</th>
</tr>";

while($row = mysqli_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['Logdate'] . "</td>";
  echo "<td>" . $row['Logtime'] . "</td>";
  echo "<td>" . $row['Loghost'] . "</td>";
  echo "<td>" . $row['Logenv'] . "</td>";
  echo "<td>" . $row['Logcode'] . "</td>";
  echo "<td>" . $row['Logstatus'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

echo "\n";
echo $sql;
echo "\n";

mysqli_close($con);
include("bottom.html");
?>