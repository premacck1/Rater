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
	
	$sql = "SELECT avgRate, noOfRate FROM quesSubz WHERE subject_name='".$_POST["sub"]."' AND qno=".$_POST["q"];
	echo $sql;
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
		
	$sql = "UPDATE quesSubz SET avgRate=".$newAvgRate.", noOfRate=".($noOfRate+1)." WHERE subject_name='".$_POST["sub"]."' AND qno=".$_POST["q"];
	echo $sql;
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	$conn->close();
?>
