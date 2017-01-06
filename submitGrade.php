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
	
	$sql = "SELECT avgGrade, noOfGrades FROM grades WHERE subject_name='".$_POST["subject_name"]."'";
	
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$avgGrade = $row["avgGrade"];
			$noOfGrades = $row["noOfGrades"];
		}
	} else {
		echo "0 results";
	}
	
	
	$newAvgGrade = (($avgGrade*$noOfGrades)+$_POST["gradeValue"])/($noOfGrades+1);
	
	if($newAvgGrade==4)
	{
		$newAvgGrade=4;
	}
	else if($newAvgGrade>=3.67)
	{
		$newAvgGrade=3.67;
	}
	else if($newAvgGrade>=3.33)
	{
		$newAvgGrade=3.33;
	}
	else if($newAvgGrade>=3)
	{
		$newAvgGrade=3;
	}
	else if($newAvgGrade>=2.67)
	{
		$newAvgGrade=2.67;
	}
	else if($newAvgGrade>=2.33)
	{
		$newAvgGrade=2.33;
	}
	else if($newAvgGrade>=2)
	{
		$newAvgGrade=2;
	}
	else
	{
		$newAvgGrade=1.67;
	}
		
	$sql = "UPDATE grades SET avgGrade=".$newAvgGrade.", noOfGrades=".($noOfGrades+1)." WHERE subject_name='".$_POST["subject_name"]."'";
	
	if ($conn->query($sql) === TRUE) {
		//echo "Record updated successfully";
	} else {
		//echo "Error updating record: " . $conn->error;
	}

	$conn->close();
?>
<HTML>
<HEAD>
<script>
function redirect()
{
window.location.replace("thankyou.html");
}
</script>
</HEAD>
<BODY onload="redirect()">
</BODY>
</HTML>
