<?php
session_start();
?>

<html>
<body>

  <?php
  include_once 'fheader.php';
  require '../../includes/createThread-inc.php';
  ?>
  <link rel="stylesheet" type="text/css" href="../../css/signup.css">

  <div class="container borders">
    <div class="row">
      <h1 class="sil"><b>Create Thread</b></h1> 
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

      <form class="form" action="../../includes/createThread-inc.php" method="POST">
        <fieldset>
          <hr><br>
          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label sil" >Title:</label>  
            <div class="col-md-4">
              <input type="text" name="title" placeholder="An interesting title" class="form-control input-md">
              <span class="help-block"> </span>  
            </div>
          </div>
          <br><br>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label sil" >Content:</label>  
            <div class="col-md-6">
              <textarea name="content" placeholder="Your text post" class="form-control" rows="10"></textarea>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group ">
            <label class="col-md-4 control-label" for="singlebutton"> </label>
            <div class="col-md-4"><br>
              <button type="submit" name="createThread-submit" class="btn">Submit</button>
            </div>
          </div>

        </fieldset>
      </form>

    </div>
  </div>

  <?php
  include_once 'ffooter.php'
  ?>

</body>
</html>
