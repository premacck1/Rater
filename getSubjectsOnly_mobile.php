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
	if($_POST["semSelect"]=="0")
	{
		echo "";
	}
	else
	{
		//echo "<thead><tr><th>Course Description</th></tr></thead><tbody>";
		$sql = "SELECT a.subject_name as subject_name, b.sem FROM quessubz a Inner JOIN subjects b on a.subject_name = b.subject_name where b.sem='".$_POST["semSelect"]."' group by a.subject_name";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				//echo "<tr><td><a href=\"#review.php\">".$row["subject_name"]."</td></tr>";
				echo "<a href=\"review_mobile.php?subject_name=".$row["subject_name"]."\" class=\"ui-btn ui-mini\">".$row["subject_name"]."</a>";
			}
		} else {
			echo "0 results";
		}
		//echo "</tbody>";
	}
	$conn->close();
?>
