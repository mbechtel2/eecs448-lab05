<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$userId = $_GET["userid"];
$newPost = $_GET["newpost"];
$authorExist = false;
$currentInt = 1;

if($newPost == "")
{
	echo "Post content may not be blank";
}
else
{
	$mysqli = new mysqli("mysql.eecs.ku.edu", "mbechtel", "eecs448labPW", "mbechtel");
	if ($mysqli->connect_errno)
	{
    		printf("Connect failed: %s\n", $mysqli->connect_error);
    		exit();
	}

	$query = "SELECT user_id FROM Users";

	if($result = $mysqli->query($query))
	{
		while ($row = $result->fetch_assoc())
		{
			if($userId == $row["user_id"])
			{
				$authorExist = true;
			}
   		}

		$result->free();
	}

	if($authorExist)
	{
		$query2 = "INSERT INTO Posts (content, author_id) VALUES ('$newPost', '$userId')";

		if($result = $mysqli->query($query2))
		{
			echo "Post added successfully";
		}		
	}
	else
	{
		echo "No User with that ID exists";
	}
	$mysqli->close();
}
?>