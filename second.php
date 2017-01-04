<?php
	$sub_name = $_GET['sub_name'];
	$editable = $_GET['editable'];
?>
<HTML>
<HEAD>
	<H1><?php echo $sub_name; ?></H1>
	<link rel="stylesheet" href="jquery-ui.css">
	<script  src="https://code.jquery.com/jquery-2.1.3.min.js"  integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM="  crossorigin="anonymous"></script>
	<script  src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js"  integrity="sha256-erF9fIMASEVmAWGdOmQi615Bmx0L/vWNixxTNDXS4FQ="  crossorigin="anonymous"></script>
	<script>
		  function getTheColor(colorVal) {
			  colorVal *= 10;
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
      max: 10,
      value: 0,
      step: 1,
      change: refreshSwatch,
      slide: function(event, ui) {
        refreshSwatch();
        $("#amount").val(ui.value);
      }
    });
  });
	</script>
</HEAD>
<BODY>
	<script>
		var editable = <?php echo $_GET['editable'] ?>;
	</script>
	<TABLE BORDER="5"    WIDTH="100%"   CELLPADDING="4" CELLSPACING="3">
	<TR>
		<TH>QUESTIONS</TH>
		<TH>GRADING</TH>
	</TR>
	<TR ALIGN="CENTER">
		<TD>Data 1</TD>
		<TD>
			<TABLE border="0" width="50%">
				<TR>
					<TD>
						<div id="coloredSlider"></div>
					</TD>
					<TD>
					</TD>
				</TR>
				<TR>
					<TD>
						<center><input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold; width:20px"></center>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
	<TR ALIGN="CENTER">
		<TD>Data 1</TD>
		<TD>Data 2</TD>
	</TR>
	<TR ALIGN="CENTER">
		<TD>Data 1</TD>
		<TD>Data 2</TD>
	</TR>
	<TR ALIGN="CENTER">
		<TD>Data 1</TD>
		<TD>Data 2</TD>
	</TR>
	<TR ALIGN="CENTER">
		<TD>Data 1</TD>
		<TD>Data 2</TD>
	</TR>
	<TR ALIGN="CENTER">
		<TD>Data 1</TD>
		<TD>Data 2</TD>
	</TR>
	<TR ALIGN="CENTER">
		<TD>Data 1</TD>
		<TD>Data 2</TD>
	</TR>
	<TR ALIGN="CENTER">
		<TD>Data 1</TD>
		<TD>Data 2</TD>
	</TR>
	<TR ALIGN="CENTER">
		<TD>Data 1</TD>
		<TD>Data 2</TD>
	</TR>
	<TR ALIGN="CENTER">
		<TD>Data 1</TD>
		<TD>Data 2</TD>
	</TR>
</TABLE>
</BODY>
</HTML>
