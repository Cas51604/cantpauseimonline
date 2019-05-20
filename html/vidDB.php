<?php
session_start();
?>

<html>
<?php
include_once 'sheader.php';
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/threadPage.css">

<body>
	<div class="container borders">
		<br>
		<form class="bar" action="vidDB.php" method="post">
			<input type="text" placeholder="Search Keyword.." name="search">
			<button type="submit" name="searchbar"><i class="fa fa-search"></i></button>
		</form>

		<p class="sil"> The video game database is from IGDB.com's API. If a game is not found, then it may not be in their database. 
		Also, being more specific in the search will improve results. Clicking the checkboxes on games and then submitting will add the games to your have played games list.</p>

		<?php
		if (isset($_GET['save'])) {
			if ($_GET["save"] == "success") {
				echo '<p class="signupsuccess"> The selected game or games have been added to your list.</p>';
			}
		}
		?>

	</div>
	<?php
	if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['searchbar']))
	{
		func();
	}
	function func()
	{
		include 'src/class.igdb.php';

		$IGDB = new IGDB('cc0f8341940aaaa7aee9dc4d1b79aad2');
		$options = array(
			'search' => $_POST['search'],
			'fields' => array('name', 'cover.image_id')
		);

		$result = $IGDB->game($options);

		echo '<div class="container trans"><form class="row" action="../includes/game-inc.php" method="POST">';
		
		foreach ($result as $game){
			if(property_exists($game, 'cover'))		
				echo '<div class="col-md-3 center size borders"><br>' .
			'<div><label class="center"><input type="checkbox" name="played[]" value="' . $game->name . '"><h3>' . $game->name . '</h3></label></div>' .
			'<img src="https://images.igdb.com/igdb/image/upload/t_logo_med/' . 
			$game->cover->image_id . '.jpg"></div>';
			
			else
				echo '';
		}  
		echo '<div class="col-md-6 borders size2">
		<button type="submit" name="played-submit" class="btn3 btn btn-primary btnreply">Submit</button>
		</div>
		</form></div>';
	}
	?>
	
</body>
<?php
include_once 'sfooter.php';
?>
</html>