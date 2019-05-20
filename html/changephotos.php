<?php
session_start();
require '../includes/dbh-inc.php';
$id = $_SESSION['id_users'];
?>

<html>
<body>
	<?php
	include_once 'sheader.php';
	?>
	<link rel="stylesheet" type="text/css" href="css/profile.css">
	<script src="java/upload.js"></script>
	<link rel="stylesheet" type="text/css" href="css/changephotos.css">
	<div class="container borders">
		<div class="row">
			<h1 class="sil"><b>Change Profile Picture</b></h1> 
			<hr>    
			<?php
			$sql = "SELECT * FROM users WHERE idUsers = '$id'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				$id = $row['idUsers'];
				$sqlImg = "SELECT * FROM profileimg WHERE idUsers = '$id'";
				$resultImg = mysqli_query($conn, $sqlImg);
				$rowImg = mysqli_fetch_assoc($resultImg);
				echo "<div class='col-sm-6'>";
				if ($rowImg['status'] == 0) {
					$filename = 'uploads/profile' . $id . '.jpg';
					if (file_exists($filename)) {
						echo "<img src='uploads/profile".$id.".jpg?'".mt_rand()." class='img-responsive'>";
					} else {
						echo "<img src='uploads/profile".$id.".jpeg?'".mt_rand()." class='img-responsive'>";
					}
				}
				echo "<p>".$_SESSION['uidUsers']."</p>";
				echo "</div>";


			} else {
				echo "There are no users yet!";
			}
			?>

			<div class="col-sm-6">
				<div class="form-group">
					<label>Upload Profile Image</label>
					<form action="../includes/upload-inc.php" method="POST" enctype="multipart/form-data">
						<div class="input-group">
							<span class="input-group-btn">
								<span class="btn btn1 btn-default btn-file">
									Browse… <input type="file" name="file" id="imgInp">
								</span>
							</span>
							<input type="text" class="form-control" readonly>
						</div>
						<br><button class="btn" type="submit" name="submit">UPLOAD</button>
					</form>
					<img id='img-upload'/>
				</div>
			</div>
		</div>
	</div>
	<?php
	include_once 'sfooter.php'
	?>

</body>
</html>