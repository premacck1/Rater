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
?>
<HTML>
	<HEAD>
		<link rel="stylesheet" href="assets/css/common.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.css">
		<script  src="https://code.jquery.com/jquery-2.1.3.min.js"  integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM="  crossorigin="anonymous"></script>
		<script  src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"  integrity="sha256-erF9fIMASEVmAWGdOmQi615Bmx0L/vWNixxTNDXS4FQ="  crossorigin="anonymous"></script>
		<script>
			function getTheColor(colorVal) {
				  colorVal = colorVal*20;
				var theColor = "";
				if (colorVal < 50) {
				  myRed = 255;
				  myGreen = parseInt(((colorVal * 2) * 255) / 100);
				} else {
				  myRed = parseInt(((100 - colorVal) * 2) * 255 / 100);
				  myGreen = 255;
				}
				theColor = "rgb(" + myRed + "," + myGreen + ",0)";
				return theColor;
			  }
		</script>
	</HEAD>
	<BODY>
		<section id="banner" style="height: 100%">
			<div class="inner" style="padding: 10px">
				<header>
					<h1 style="margin: 10px">University Of Florida</h1>
					<h2 style="margin: 10px">Computer and Information Science and Engineering</h2>
					<h3 style="margin-bottom: 20px"><?php echo $_GET["subject_name"]; ?></h3>
				</header>
				<div class="table-wrapper">
					<table class="alt">
						<thead>
							<tr>
								<th>QUESTION</th>
								<th>AVERAGE RATING</th>
							</tr>
						</thead>
						<tbody id="table_body" style="color:#fff">
							<?php
								$sql = "select b.question as ques,a.avgRate as avgRate from quesSubz a, questions b where a.qno in (select DISTINCT(qno) from quesSubz) and a.subject_name='".$_GET["subject_name"]."' and a.qno=b.qno";
								$result = $conn->query($sql);

								if ($result->num_rows > 0) {
									while($row = $result->fetch_assoc()) {
										echo "<tr><td>".$row["ques"]."</td><td style=\"color: ".getTheColor($row["avgRate"])."\"><center>".$row["avgRate"]."</center></td></tr>";
									}
								} else {
									echo "0 results";
								}
								$conn->close();
							?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</BODY>
</HTML>
