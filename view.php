<HTML>
	<HEAD>
		<link rel="stylesheet" href="assets/css/common.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui.css">
		<script  src="https://code.jquery.com/jquery-2.1.3.min.js"  integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM="  crossorigin="anonymous"></script>
		<script  src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"  integrity="sha256-erF9fIMASEVmAWGdOmQi615Bmx0L/vWNixxTNDXS4FQ="  crossorigin="anonymous"></script>
		<script>
			function loadSubjects()
			{
				var sem = document.getElementsByName("semesters")[0].value;
				
			}
		</script>
	</HEAD>
	<BODY>
		<section id="banner" style="height: 100%">
			<div class="inner">
				<center>
				<div class="12u$" style="width:50%; margin-bottom: 20px;">
					<div class="select-wrapper">
						<select name="semesters" id="demo-category" onchange="loadSubjects()">
							<option value="0">- Semester -</option>
							<option value="1">Fall</option>
							<option value="2">Spring</option>
						</select>
					</div>
				</div>
				<div class="12u$" style="width:50%;">
					<div class="select-wrapper">
						<select name="subjects" id="demo-category" onchange="loadRatings()" disabled="true">
							<option value="">- Semester -</option>
							<option value="1">Fall</option>
							<option value="2">Spring</option>
						</select>
					</div>
				</div>
				</center>
			</div>
		</section>
	</BODY>
</HTML>
