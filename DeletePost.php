<?php
echo "The following post(s) have been deleted: <br>";

$mysqli = new mysqli("mysql.eecs.ku.edu", "mbechtel", "eecs448labPW", "mbechtel");
if ($mysqli->connect_errno)
{
	printf("Connect failed: %s\n", $mysqli->connect_error);
	exit();
}

$query = "SELECT post_id FROM Posts";

if($result = $mysqli->query($query))
{
	while($row = $result->fetch_assoc())
	{
		if($_GET[$row["post_id"]])
		{
			$query2 = "DELETE FROM Posts WHERE post_id='".$row["post_id"]."'";	

			if($result2 = $mysqli->query($query2))
			{
					echo $row["post_id"]." ";
			}
		}
	}

	$result->free();
}

$mysqli->close();
?>