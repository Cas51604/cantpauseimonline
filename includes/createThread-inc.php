<?php

session_start();

if (isset($_POST['createThread-submit'])) {
	require 'dbh-inc.php';

	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$content = mysqli_real_escape_string($conn, $_POST['content']);
	$user = $_SESSION['u_uid'];
	$id = $_SESSION['id_users'];

	if (empty($title) || empty($content)) {
		header("Location: ../html/forums/create_thread.php?error=emptyfields");
		exit();
	}

	else{
		$sql = "INSERT INTO threads (threads_id, title, content, authorId, author, thread_date) VALUES('', '$title', '$content', '$id', '$user', NOW())";

		if (mysqli_query($conn, $sql)) {
			$_SESSION['title'] = $row['title'];
			$_SESSION['content'] = $row['content'];
			
			header("Location: ../html/forum.php?creation=success");
			exit();
		} else {
			echo ("Error description: " . mysqli_error($conn));
			exit();
		}
	}

	mysqli_close($conn);
}