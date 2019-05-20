<?php

session_start();

if(isset($_POST['played-submit'])) {
	require 'dbh-inc.php';
	
	$checked = mysqli_real_escape_string($conn, implode(", ", $_POST['played']));
	$id = $_SESSION['id_users'];
	
	$sql = "INSERT INTO playedgames (playedId, idUsers, game) VALUES('', '$id', '$checked')";

	if(mysqli_query($conn, $sql)) {
		header("Location: ../html/vidDB.php?save=success");
		exit();
	} else {
		echo ("Error description: " . mysqli_error($conn));
		exit();
	}
	mysqli_close($conn);
}