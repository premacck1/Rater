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
	
	$sql = "SELECT avgRate, noOfRate FROM ".str_replace(" ", "", $_POST["sub"])." where qno=".$_POST["q"];
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$avgRate = $row["avgRate"];
			$noOfRate = $row["noOfRate"];
		}
	} else {
		echo "0 results";
	}
	
	$newAvgRate = (($avgRate*$noOfRate)+$_POST["rate"])/($noOfRate+1);
		
	$sql = "UPDATE ".str_replace(" ", "", $_POST["sub"])." SET avgRate=".$newAvgRate.", noOfRate=".($noOfRate+1)." WHERE qno=".$_POST["q"];

	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();
?>
