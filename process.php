<?php
include 'database.php';

//check if form was submitted
if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($con, $_POST['user']);
	$message = mysqli_real_escape_string($con, $_POST['message']); //the escape string gets rid of anything harmful, like html tags.

	//Set timezone

	date_default_timezone_set('Europe/London');
	$time = date('h:i:s a', time());

	//validate
	if(!isset($user) || $user == '' || !isset($message) || $message == '') {
		$error = 'Please fill in your name and a message';
		header("Location: index.php?error=".urlencode($error));
		exit();
	}
	else { //if all validation is fine then insert data
		$query = "INSERT INTO shouts (user, message, time) VALUES('$user', '$message', '$time')";

		if(!mysqli_query($con, $query)) { //if for some reason it didnt insert then show an error, if fine redirect to index page.
			die('ERROR: ' . mysqli_error($con));

		} else {
			header("Location: index.php");
			exit();
		}
	}


}





?>
