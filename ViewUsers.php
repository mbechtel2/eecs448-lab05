<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "mbechtel", "eecs448labPW", "mbechtel");
if ($mysqli->connect_errno)
{
  	printf("Connect failed: %s\n", $mysqli->connect_error);
  	exit();
}

echo "<table border='3'>";

echo "<tr>";
echo "<th>User Number</th>";
echo "<th>User ID</th>";
echo "</tr>";

$query = "SELECT user_id FROM Users";
$currentInt = 1;

if($result = $mysqli->query($query))
{
	while($row = $result->fetch_assoc())
	{
		echo "<tr>";
		echo "<td>".$currentInt."</td>";
		echo "<td>".$row["user_id"]."</td>";
		echo "</tr>";
		$currentInt++;
	}
}

echo"</table>";

$mysqli->close();
?>
