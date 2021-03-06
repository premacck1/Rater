<HTML>
	<HEAD>
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
	</HEAD>
	<div data-role="page" id="pageone">
		<script>
			  $(document).ready( function()
			  {
				var qno=1;
			    var subject_name = "<?php echo $_GET['subject_name']; ?>";
				showQuestions();
			  
				function showQuestions() 
				{
				  var xhttp;
				  if (qno == "") {
					document.getElementById("question").innerHTML = "";
					return;
				  }
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
					  document.getElementById("question").innerHTML = this.responseText;
					}
				  };
				  xhttp.open("POST", "getQuestion.php", true);
				  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				  xhttp.send("q="+qno);
			    }
			    $('#nextButton').click(function() {
				  var rate = document.getElementById("points").value;
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
			        }
				  };
				  xhttp.open("POST", "submit.php", true);
				  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				  xhttp.send("q="+qno+"&sub="+subject_name+"&rate="+rate);
				  qno++;
				  if(qno==7)
				  {
					  window.location.replace("grader.php?subject_name=<?php echo $_GET['subject_name'] ?>");
				  }
				  resetSlider();
				  showQuestions();
			    });
			    function resetSlider()
			    {
				  var $slider = $("#points");
				  $slider.val(0).slider("refresh");
				  document.getElementById("points").value=0;
			    }
			  });
		</script>
		<header class="headerClass">
		<center>
			<h1>Welcome To Grader</h1>
			<h2>Computer and Information Science and Engineering</h2>
			<h3><?php echo $_GET["subject_name"]; ?></h3>
		</center>
	</header>
	<div data-role="main" class="ui-content">
		<div id="question">
		</div>
		<input type="range" name="points" id="points" value="0" min="0" max="5" data-highlight="true">
		<input type="button" id="nextButton" value="NEXT">
	</div>
	</BODY>
</HTML>
