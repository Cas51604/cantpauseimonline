<?php

session_start();

require 'dbh-inc.php';

$id = $_SESSION['id_users'];

$sql = "SELECT game FROM playedgames WHERE idUsers = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		$games = $row['game'];

		$array = explode(',', $games);

		foreach ($array as $game) {
			echo "<li>$game</li>";
		} 
	}
}else {
			echo ("No Games Listed");
		}