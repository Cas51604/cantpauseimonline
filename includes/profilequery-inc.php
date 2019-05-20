<?php

session_start();

require 'dbh-inc.php';

$id = $_SESSION['id_users'];

$sql = "SELECT * FROM profile WHERE idUsers = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {

        $_SESSION['fname'] = $row['FName'];
        $_SESSION['lname'] = $row['LName'];
        $_SESSION['age'] = $row['age'];
        $_SESSION['gamer_id'] = $row['gamerId'];
        $_SESSION['discord_name'] = $row['discordName'];
        $_SESSION['sys_con'] = $row['sysCon'];
        $_SESSION['fav_game'] = $row['favGame'];
        $_SESSION['prefer_genres'] = $row['preferGenres'];
        $_SESSION['about_me'] = $row['aboutMe'];
    }
}