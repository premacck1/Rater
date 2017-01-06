<?php
	$servername = "fdb5.biz.nf";
	$username = "2270844_grader";
	$password = "Random_123";
	$dbname = "2270844_grader";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
		
	$sql = "SELECT question FROM questions where qno=".$_POST["q"];
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo $row["question"];
		}
	} else {
		echo "";
	}
	$conn->close();
?>
