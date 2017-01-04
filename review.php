<HTML>
	<HEAD>
		<link rel="stylesheet" href="assets/css/common.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.css">
		<script  src="https://code.jquery.com/jquery-2.1.3.min.js"  integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM="  crossorigin="anonymous"></script>
		<script  src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"  integrity="sha256-erF9fIMASEVmAWGdOmQi615Bmx0L/vWNixxTNDXS4FQ="  crossorigin="anonymous"></script>
		<script>
			  var qno=1;
			  var subject_name = "<?php echo $_GET['subject_name']; ?>";
			  function getTheColor(colorVal) {
				  colorVal *= 20;
				var theColor = "";
				if (colorVal < 50) {
				  myRed = 255;
				  myGreen = parseInt(((colorVal * 2) * 255) / 100);
				} else {
				  myRed = parseInt(((100 - colorVal) * 2) * 255 / 100);
				  myGreen = 255;
				}
				theColor = "rgb(" + myRed + "," + myGreen + ",0)";
				return (theColor);
			  }

			  function refreshSwatch() {
				var coloredSlider = $("#coloredSlider").slider("value"),
				  myColor = getTheColor(coloredSlider);

				$("#coloredSlider .ui-slider-range").css("background-color", myColor);

				$("#coloredSlider .ui-state-default, .ui-widget-content .ui-state-default").css("background-color", myColor);
			  }

			  $(function() {
				$("#coloredSlider").slider({
				  orientation: "horizontal",
				  range: "min",
				  max: 5,
				  value: 0,
				  step: 1,
				  change: refreshSwatch,
				  slide: function(event, ui) {
					refreshSwatch();
					$("#amount").val(ui.value);
				  }
				});
			  });
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
			  function submitAnswer()
			  {
				  var rate = document.getElementById("amount").value;
				  xhttp = new XMLHttpRequest();
				  xhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
			        }
				  };
				  xhttp.open("POST", "submit.php", true);
				  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				  xhttp.send("q="+qno+"&sub="+subject_name+"&rate="+rate);
				  qno++;
				  if(qno==6)
				  {
					  window.location.replace("thankyou.html");
				  }
				  showQuestions();
			  }
		</script>
	</HEAD>
	<BODY onLoad="showQuestions()">
		<section id="banner">
			<div class="inner" style="padding-top: 10px; padding-bottom: 10px;">
				<header>
					<h1 style="margin: 1px;">University Of Florida</h1>
					<h2 style="margin: 1px;">Computer and Information Science and Engineering</h2>
					<h3><?php echo $_GET['subject_name']; ?></h3>
				</header>
				<br><br>
				<div class="box" style="margin:5px;">
					<TABLE width="100%" cellpadding="5px">
						<TBODY>
						<TR>
							<h4>
								<div id="question">
								</div>
							</h4>
						</TR>
						<TR>
							<TABLE width="50%">
								<tbody>
								<TR style="border: 0px">
									<TD>
										<div id="coloredSlider"></div>
									</TD>
								</TR>
								<TR style="border: 0px">
									<TD>
										<center><input type="text" id="amount" readonly style="width: 45px" value="0"></center>
									</TD>
								</TR>
								</tbody>
							</TABLE>
						</TR>
						<TR>
							<div align="right"><input type="button" style="width: 150px" class="button alt fit" value="NEXT" onclick="submitAnswer()"></div>
						</TR>
						</TBODY>
					</TABLE>
				</div>
			</div>
		</section>
	</BODY>
</HTML>
