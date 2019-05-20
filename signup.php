<?php
include_once 'mheader.php';
?>
<link rel="stylesheet" type="text/css" href="html/css/smain.css">

<div class="container borders">
  <div class="row">
    <h1 class="sil"><b>Signup</b></h1> 
    <?php
    if (isset($_GET['error'])) {
      if ($_GET['error'] == "emptyfields") {
        echo '<p class="signuperror"> Fill in all fields!</p>';
      }
      else if ($_GET["error"] == "invaliduidmail") {
        echo '<p class="signuperror"> Invalid username and e-mail!</p>';
      }
      else if ($_GET["error"] == "invaliduid") {
        echo '<p class="signuperror"> Invalid username!</p>';
      }
      else if ($_GET["error"] == "invalidmail") {
        echo '<p class="signuperror"> Invalid e-mail!</p>';
      }
      else if ($_GET["error"] == "passwordcheck") {
        echo '<p class="signuperror"> Your passwords do not match!</p>';
      }
      else if ($_GET["error"] == "usertaken") {
        echo '<p class="signuperror"> Username is already taken!</p>';
      }
      else if ($_GET["error"] == "emailinuse"){
        echo '<p class="signuperror"> Email already exists!</p>';
      }
    }
    else if ($_GET["signup"] == "success") {
      echo '<p class="signupsuccess">Signup successful!</p>';
    }
    ?>
    <form class="form" action="includes/signup-inc.php" method="POST">
      <fieldset>

     <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label sil" >Username:</label>  
          <div class="col-md-4">
            <input type="text" name="uid" placeholder="Username" class="form-control input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <br><br>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label sil" >E-mail:</label>  
          <div class="col-md-4">
            <input type="text" name="mail" placeholder="E-mail" class="form-control input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <br><br>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label sil" >Password:</label>  
          <div class="col-md-4">
            <input type="password" name="pwd" placeholder="Password" class="form-control input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <br><br>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label sil" >Repeat Password:</label>  
          <div class="col-md-4">
            <input type="password" name="pwd-repeat" placeholder="Repeat Password" class="form-control input-md">
            <span class="help-block"> </span>  
          </div>
        </div>
        <br><br>

        <!-- Button -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="singlebutton"> </label>
          <div class="col-md-4">
            <button type="submit" name="signup-submit" class="btn">Signup</button>
          </div>
        </div>

      </fieldset>
    </form>
    
  </div>
</div>

<?php
include_once 'mfooter.php'
?>