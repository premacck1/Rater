<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "grader";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	function getTheColor($colorVal)
	{
		$colorVal = $colorVal*20;
		$theColor = "";
		if ($colorVal < 50) {
		  $myRed = 255;
		  $myGreen = intval((($colorVal * 2) * 255) / 100);
		} else {
		  $myRed = intval(((100 - $colorVal) * 2) * 255 / 100);
		  $myGreen = 255;
		}
		$theColor = "rgb(" . $myRed . "," . $myGreen . ",0)";
		return $theColor;
	}
	if($_POST["semSelect"]=="0")
	{
		echo "";
	}
	else
	{
		echo "<thead><tr><th><h4 style=\"margin-bottom: 0px\">Course Description</h4></th><th><h4 style=\"margin-bottom: 0px\">Average Rating</h4></th><th><h4 style=\"margin-bottom: 0px\">Number of Ratings</h4></tr></thead><tbody>";
		$sql = "SELECT a.subject_name as subject_name,AVG(a.avgRate) as avgRate, a.noOfRate as noOfRate, b.sem FROM quessubz a Inner JOIN subjects b on a.subject_name = b.subject_name where b.sem='".$_POST["semSelect"]."' group by a.subject_name";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				echo "<tr> <td><a href=\"view.php?subject_name=".$row["subject_name"]."\">".$row["subject_name"]."</td><td style=\"color: ".getTheColor($row["avgRate"])."\">".$row["avgRate"]."</td><td>".$row["noOfRate"]."</td></tr>";
			}
		} else {
			echo "0 results";
		}
		echo "<tbody>";
	}
	$conn->close();
?>
