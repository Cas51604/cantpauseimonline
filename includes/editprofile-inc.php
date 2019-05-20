<?php

session_start();

if (isset($_POST['editprofile-submit'])) {

	require 'dbh-inc.php';

	$firstname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lastname = mysqli_real_escape_string($conn, $_POST['lname']);
	$age = mysqli_real_escape_string($conn, $_POST['age']);
	$gamerid = mysqli_real_escape_string($conn, $_POST['gamername']);
	$discordname = mysqli_real_escape_string($conn, $_POST['discordname']);
	$syscon = mysqli_real_escape_string($conn, $_POST['system']);
	$favgame = mysqli_real_escape_string($conn, $_POST['favgame']);
	$prefergenres = mysqli_real_escape_string($conn, $_POST['prefgenres']);
	$aboutme = mysqli_real_escape_string($conn, $_POST['about']);
	$id = $_SESSION['id_users'];

    $query = mysqli_query($conn, "SELECT * FROM profile WHERE idUsers = '$id'");
		if(!$query){
			die('Error: ' . mysqli_error($conn));
		}
		if(mysqli_num_rows($query) > 0){
			$sql = "UPDATE profile SET idUsers = '$id', FName = '$firstname', LName = '$lastname', age = '$age', gamerId = '$gamerid', discordName = '$discordname', sysCon = '$syscon', favGame = '$favgame', preferGenres = '$prefergenres', aboutMe = '$aboutme' WHERE idUsers = '$id'";

			if (mysqli_query($conn, $sql)){
				header("Location: ../html/profile.php?edit=success");
				exit();

			} else {
				header("Location: ../html/profile.php?error=sqlerror");
				exit();
			}
		}

		else{
			$sql="INSERT INTO profile (idUsers, FName, LName, age, gamerId, discordName, sysCon, favGame, preferGenres, aboutMe) VALUES ('$id', '$firstname', '$lastname', '$age', '$gamerid', '$discordname', '$syscon', '$favgame', '$prefergenres', '$aboutme')";

			if(mysqli_query($conn, $sql)){
				$_SESSION['fname'] = $row['FName'];
				$_SESSION['lname'] = $row['LName'];
				$_SESSION['age'] = $row['age'];
				$_SESSION['gamer_id'] = $row['gamerId'];
				$_SESSION['discord_name'] = $row['discordName'];
				$_SESSION['sys_con'] = $row['sysCon'];
				$_SESSION['fav_game'] = $row['favGame'];
				$_SESSION['prefer_genres'] = $row['preferGenres'];
				$_SESSION['about_me'] = $row['aboutMe'];

				header("Location: ../html/profile.php?edit=success");
				exit();
			} 
			else {
				header("Location: ../html/editprofile.php?error=sqlerror");
				exit();
			}
		}

	mysqli_close($conn);
}