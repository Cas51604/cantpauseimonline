<?php

session_start();

if (isset($_POST['login-submit'])) {

	include 'dbh-inc.php';

	$mailuid = mysqli_real_escape_string($conn, $_POST['mailuid']);
	$password = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check if inputs are empty
	if (empty($mailuid) || empty($password)) {
		header("Location: ../index.php?login=empty");
		exit();
	} else {
		$sql = "SELECT * FROM users WHERE uidUsers='$mailuid'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../index.php?login=username");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				//De-hashing the password
				$hashingPwdCheck = password_verify($password, $row['pwdUsers']);
				if ($hashingPwdCheck ==false) {
					header("Location: ../index.php?login=password");
					exit();
				} elseif ($hashingPwdCheck == true) {
					//login in the user here
					$_SESSION['u_uid'] = $row['uidUsers'];
					$_SESSION['id_users'] = $row['idUsers'];
					header("Location: ../index.php?login=success");
					exit();
				}
			}
		}
	} 
} else {
	header("Location: ../index.php?login=error3");
	exit();
}