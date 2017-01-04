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
	if($_POST["sem"]=="1")
	{
		$sem="fall";
	}
	else
	{
		$sem="spring";
	}	
	$sql = "SELECT subject_name FROM subjects WHERE sem='".$sem."'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<option value=\"".$row["subject_name"]."\">".$row["subject_name"]."</option>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
?>
