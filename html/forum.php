<?php
session_start();
?>

<html>
<body>
	<?php
	include_once 'sheader.php';
	?>
  <link rel="stylesheet" type="text/css" href="css/forums.css">
  
  <div class="center">
    <div class="row">       
      <section class="borders panel panel-info">
        <h2 class="sil">Forums:</h2> 
        <?php
        if (isset($_GET['error'])) {
          if ($_GET["error"] == "emptyfields") {
            echo '<p class="signuperror"> Please fill all fields/p>';
          }
        }
        else if ($_GET['creation'] == "success"){
          echo '<p class="signupsuccess">Thread has been created.</p>';
        }
        ?>
        <header>
          <div class="btn-group threadlink">
            <a href="forum.php" class="btn btn-primary btn2">Forum Home</a>
            <a href="forums/create_thread.php" class="btn btn-primary btn2">Create a Thread</a>
          </div>
          <hr>
        </header>

        <?php
        include_once '../includes/thread-inc.php';
        ?>

      </section>
    </div>
  </div>

  <?php
  include_once 'sfooter.php'
  ?>

</body>
</html>