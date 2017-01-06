<html>
<head>
<meta charset="ISO-8859-1">
<title>Subject Ratings - CISE, University of Florida</title>
<link rel="stylesheet" href="assets/css/common.css" />
</head>
<body>	
<section id="banner">
	<div class="inner" style="padding: 10px">
	<header>
		<h1 style="margin: 1px;">University Of Florida</h1>
		<h2 style="margin: 1px;">Computer and Information Science and Engineering</h2>
	</header>
	<form action="submitGrade.php" method="post">
		<header>
			<h2 style="margin-bottom: 20px">Please select your grade for the course</h2><h2><?php echo $_GET['subject_name'];?></h2>
			<h5 style="margin-bottom: 20px">This is an anonymous survey. Your grades won't be revealed to anyone.</h5>
		</header>
                <input type="hidden" name="subject_name" value="<?php echo $_GET['subject_name'];?>">
		<div class="select-wrapper" style ="width: 75%; margin: auto;">
					<select name="gradeValue" id="gradeValue">
						<option value="">- Select grade -</option>
						<option value="4">A</option>
						<option value="3.67">A-</option>
						<option value="3.33">B+</option>
						<option value="3">B</option>
						<option value="2.67">B-</option>
						<option value="2.33">C+</option>
						<option value="2">C</option>
						<option value="1.67">C-</option>
						<option value="">other</option>
					</select>
		</div>
		<div align="right"><input type="submit" id="Submit" style="width: 150px; margin-top: 80px;" class="button alt fit" value="Submit"></div>
	</form>
	</div>
</section>
</body>
</html>
