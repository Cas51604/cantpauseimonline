<?php

$sql = "SELECT * FROM users WHERE idUsers = '$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
	$id = $row['idUsers'];
	$sqlImg = "SELECT * FROM profileimg WHERE idUsers = '$id'";
	$resultImg = mysqli_query($conn, $sqlImg);
	$rowImg = mysqli_fetch_assoc($resultImg);
	if ($rowImg['status'] == 0) {
		$filename = 'uploads/profile' . $id . '.jpg';
		if (file_exists($filename)) {
			echo "<img class='img-responsive' src='uploads/profile".$id.".jpg?'".mt_rand().">";
		} else {
			echo "<img class='img-responsive' src='uploads/profile".$id.".jpeg?'".mt_rand().">";
		}
	} else {
		echo "<img class='img-responsive' src='uploads/profiledefault.jpg'>";
	}
} 