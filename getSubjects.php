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
	$sql = "SELECT a.subject_name as subject_name,AVG(a.avgRate) as avgRate,b.sem FROM quessubz a Inner JOIN subjects b on a.subject_name = b.subject_name where b.sem='".$_POST["semSelect"]."' group by a.subject_name";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo "<tr> <td><a href=\"view.php?subject_Name=".$row["subject_name"]."\">".$row["subject_name"]."</td><td>".$row["avgRate"]."</td></tr>";
		}
	} else {
		echo "0 results";
	}
	$conn->close();
?>
