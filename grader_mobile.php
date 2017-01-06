<!DOCTYPE html>
<html>
<head>
    <!-- Include meta tag to ensure proper rendering and touch zooming -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Include jQuery Mobile stylesheets -->
	<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
	<!-- Include the jQuery library -->
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<!-- Include the jQuery Mobile library -->
	<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
	<style>
	  #pageone
	  {
		  background: url(images/banner.jpg); 
		  background-repeat:no-repeat; 
		  background-position:center center; 
		  background-size:cover;
	  }
	  #pageone:before {
			content: '';
			background: rgba(75, 75, 93, 0.60); /*gradient background*/
			position: absolute;
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
	  }
	  #header{
		    font-size: 2em;
			color: #fff;
			line-height: 1em;
			margin: 0 0 1em 0;
			padding: 0;
	  }
	  #pageone .inner {
			
	  }
	  #pageone .ui-btn {
			background-color: #6cc091;
			color: #fff;
			font-size: 1.5em;
	  }
	  .ui-mini
	  {
		  font-size: 1em !important;
		  margin: 0px;
	  }
	  #subjects
	  {
		  padding-top: 5em;
	  }
	  #question
	  {
		  position: relative;
		  z-index: 10005;
		  color: #fff;
		  font-weight: 100;
	  }
	  #pageone .headerClass
	  {
			position: relative;
			z-index: 10005;
			padding-top:5em;
			color: #fff;
			line-height: 1.5em;
			margin: 0 0 1em 0;
	  }
	  #pageone h1 {
			font-weight:450;
		    font-size: 2.25em;

	  }
	  #pageone h2 {
			font-weight:350;
		    font-size: 1.5em;
	  }
	  #pageone h3 {
			font-weight:300;
		    font-size: 1em;
	  }
  </style>
</head>
<body>
<div data-role="page" id="pageone">
	<header class="headerClass">
		<center>
			<h1>Welcome To Grader</h1>
			<h2>Computer and Information Science and Engineering</h2>
			<h3>Select semester for which you want to rate</h3>
		</center>
	</header>

	<div data-role="main" class="ui-content">
	</header>
	<form action="submitGrade.php" method="post">
		<header>
			<h2 style="margin-bottom: 20px">Please select your grade for the course</h2><h2 id="subject_name"><?php echo $_GET['subject_name'];?></h2>
			<h5 style="margin-bottom: 20px">This is an anonymous survey. Your grades won't be revealed to anyone.</h5>
		</header>
		<div class="select-wrapper" style ="width: 75%; margin: auto;">
					<select name="subject-category" id="gradeValue">
						<option value="">- Select grade -</option>
						<option value="4">A</option>
						<option value="3.66">A-</option>
						<option value="3.33">B+</option>
						<option value="3">B</option>
						<option value="2.66">B-</option>
						<option value="2.33">C+</option>
						<option value="2">C</option>
						<option value="1.66">C-</option>
						<option value="">other</option>
					</select>
		</div>
		<div align="right"><input type="submit" id="Submit" style="width: 150px; margin-top: 80px;" class="button alt fit" value="Submit"></div>
	</form>
	</div>
</section>
</body>
</html>
