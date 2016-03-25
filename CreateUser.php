<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$newId = $_GET["newuserid"];
$doesntExist = true;

if($newId == "")
{
	echo "User ID may not be blank";
}
else
{
	$mysqli = new mysqli("mysql.eecs.ku.edu", "mbechtel", "eecs448labPW", "mbechtel");
	if ($mysqli->connect_errno)
	{
    		printf("Connect failed: %s\n", $mysqli->connect_error);
    		exit();
	}

	$query = "INSERT INTO Users (user_id) VALUES ('$newId')";
	$query2 = "SELECT user_id FROM Users";

	if($result = $mysqli->query($query2))
	{
		while ($row = $result->fetch_assoc())
		{
			if($newId == $row["user_id"])
			{
				$doesntExist = false;
			}
   		}

		$result->free();
	}

	if($doesntExist)
	{
		if($result = $mysqli->query($query))
		{
			echo "User Added";
		}
	}
	else
	{
		echo "That User ID already exists";
	}

	$mysqli->close();
}
?>