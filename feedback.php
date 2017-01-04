<?php
	$name = $_POST["name"];
	$email = $_POST["email"];
	$comment = $_POST["message"];
	
	$myfile = fopen("feed.txt", "a") or die("Unable to open file!");
	fwrite($myfile, $name);
	fwrite($myfile, "\r\n");
	fwrite($myfile, $email);
	fwrite($myfile, "\r\n");
	fwrite($myfile, $comment);
	fwrite($myfile, "\r\n\r\n");
	
	header("Location: /grader");
	die();
?>
