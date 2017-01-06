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
		echo "<thead><tr><th><h4 style=\"margin-bottom: 0px\">Course Description</h4></th><th><h4 style=\"margin-bottom: 0px\">Average Rating</h4></th><th><h4 style=\"margin-bottom: 0px\">Average Grade</h4></th><th><h4 style=\"margin-bottom: 0px\">Number of Ratings</h4></th></thead><tbody>";
		$sql = "SELECT a.subject_name as subject_name,ROUND(AVG(a.avgRate),2) as avgRate, a.noOfRate as noOfRate, b.sem, c.avgGrade as avgGrade FROM grades c, quesSubz a Inner JOIN subjects b on a.subject_name = b.subject_name where b.sem='".$_POST["semSelect"]."' and c.subject_name=b.subject_name group by a.subject_name";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			// output data of each row
			while($row = $result->fetch_assoc()) {
				if($row["avgGrade"]==4)
				{
					$avgGrade="A";
				}
				else if($row["avgGrade"]==3.67)
				{
					$avgGrade="A-";
				}
				else if($row["avgGrade"]==3.33)
				{
					$avgGrade="B+";
				}
				else if($row["avgGrade"]==3)
				{
					$avgGrade="B";
				}
				else if($row["avgGrade"]==2.67)
				{
					$avgGrade="B-";
				}
				else if($row["avgGrade"]==2.33)
				{
					$avgGrade="C+";
				}
				else if($row["avgGrade"]==2)
				{
					$avgGrade="C";
				}
				else if($row["avgGrade"]==1.67)
				{
					$avgGrade="C-";
				}
                                else
				{
					$avgGrade="Subject not yet rated";
				}
				
				echo "<tr> <td><a href=\"view.php?subject_name=".$row["subject_name"]."\">".$row["subject_name"]."</td><td style=\"color: ".getTheColor($row["avgRate"])."\">".$row["avgRate"]."</td><td>".$avgGrade."</td><td>".$row["noOfRate"]."</td></tr>";
			}
		} else {
			echo "0 results";
		}
		echo "<tbody>";
	}
	$conn->close();
?>
