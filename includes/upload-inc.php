<?php
session_start();
include_once 'dbh-inc.php';
$id = $_SESSION['id_users'];

if (isset($_POST['submit'])) {
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 10000000) {
				$fileNameNew = "profile".$id.".".$fileActualExt;
				$fileDestination = '../html/uploads/'.$fileNameNew;
				foreach(glob("../html/uploads/profile{$id}.*") as $match) { unlink($match); }
				move_uploaded_file($fileTmpName, $fileDestination);
				correctImageOrientation($fileDestination);
				$sql = "UPDATE profileimg SET status=0 WHERE idUsers = '$id';";
				$result = mysqli_query($conn, $sql);
				header("Location: ../html/changephotos.php?uploadsuccess");
			} else {
				echo "Your file is too big!";
			}
		} else {
			echo "There was an error uploading your file!";
		}
	} else{
		echo "You cannot upload files of this type!";
	}
}
function correctImageOrientation($filename) {
  if (function_exists('exif_read_data')) {
    $exif = exif_read_data($filename);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename);
        $deg = 0;
        switch ($orientation) {
          case 3:
            $deg = 180;
            break;
          case 6:
            $deg = 270;
            break;
          case 8:
            $deg = 90;
            break;
        }
        if ($deg) {
          $img = imagerotate($img, $deg, 0);        
        }
        imagejpeg($img, $filename, 95);
      } 
    } 
  }    
}

