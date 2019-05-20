<?php
session_start();
?>

<html>
<body>

  <?php
  include_once 'sheader.php';
  require '../includes/profilequery-inc.php';
  ?>
  <link rel="stylesheet" type="text/css" href="css/signup.css">

  <div class="container borders">
    <div class="row">
      <h1 class="sil"><b>Edit Profile</b></h1> 

      <?php
      if (isset($_GET['error'])) {
        if ($_GET["error"] == "emptyfields") {
          echo '<p class="signuperror"> Please fill in all fields</p>';
        }
      }
      else if ($_GET['edit'] == "success"){
        echo '<p class="signupsuccess">Edit Successful! Click profile above to see the changes.</p>';
      }
      ?>

      <form class="form" action="../includes/editprofile-inc.php" method="POST">
        <fieldset>
          <div class="form-group">
            <label class="col-md-4 control-label sil" >First Name:</label>  
            <div class="col-md-4">
              <?php
              if(isset($_SESSION['fname'])){ 
                echo "<input type=\"text\" name=\"fname\" value=\"{$_SESSION['fname']}\" class=\"form-control input-md\">";
              }
              else {
                echo "<input type=\"text\" name=\"fname\" placeholder=\"John\" class=\"form-control input-md\">";
              }
              ?>
              <span class="help-block"> </span>  
            </div>
          </div>
          <br><br>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label sil" >Last Name:</label>  
            <div class="col-md-4">
              <?php
              if(isset($_SESSION['lname'])) {
                echo "<input type=\"text\" name=\"lname\" value=\"{$_SESSION['lname']}\" class=\"form-control input-md\">";
              }
              else {
                echo "<input type=\"text\" name=\"lname\" placeholder=\"Doe\" class=\"form-control input-md\">";
              }
              ?>
              <span class="help-block"> </span>  
            </div>
          </div>
          <br><br>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label sil" >Age:</label>  
            <div class="col-md-2">
              <select name="age" class="form-control">
                <?php for ($i = 13; $i <= 65; $i++) : ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php endfor; ?>
              </select>
              <span class="help-block"> </span>  
            </div>
          </div>
          <br><br>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label sil" >Online Gamer IDs:</label>  
            <div class="col-md-6">
              <?php
              if(isset($_SESSION['gamer_id'])) { 
                echo "<input type=\"text\" name=\"gamername\" value=\"{$_SESSION['gamer_id']}\" class=\"form-control input-md\">";
              }
              else {
                echo "<input type=\"text\" name=\"gamername\" placeholder=\"Gamer Name\" class=\"form-control input-md\">";
              }
              ?>
              <span class="help-block">Xbox Live Gamertag, PSN Name, Steam Name, etc. </span>  
            </div>
          </div>
          <br><br><br>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label sil" >Discord Username:</label>  
            <div class="col-md-3">
              <?php
              if(isset($_SESSION['discord_name'])) { 
                echo "<input type=\"text\" name=\"discordname\" value=\"{$_SESSION['discord_name']}\" class=\"form-control input-md\">";
              }
              else {
                echo "<input type=\"text\" name=\"discordname\" placeholder=\"Username#digits\" class=\"form-control input-md\">";
              }
              ?>
              <span class="help-block">CPIO#5151, N/A if not available</span>  
            </div>
          </div>
          <br><br><br>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label sil" >Systems:</label>  
            <div class="col-md-6">
              <?php
              if(isset($_SESSION['sys_con'])) { 
                echo "<input type=\"text\" name=\"system\" value=\"{$_SESSION['sys_con']}\" class=\"form-control input-md\">";
              }
              else {
                echo "<input type=\"text\" name=\"system\" placeholder=\"Consoles\" class=\"form-control input-md\">";
              }
              ?>
              <span class="help-block">Xbox One, Playstation 4, Nintendo Switch, PC, etc. </span>  
            </div>
          </div>
          <br><br><br>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label sil" >Favorite Games:</label>  
            <div class="col-md-4">
              <?php
              if(isset($_SESSION['fav_game'])) {
                echo "<input type=\"text\" name=\"favgame\" value=\"{$_SESSION['fav_game']}\" class=\"form-control input-md\">";
              }
              else {
                echo "<input type=\"text\" name=\"favgame\" placeholder=\"Legend of Zelda: Ocarina of Time\" class=\"form-control input-md\">";
              }
              ?>
              <span class="help-block"> </span>  
            </div>
          </div>
          <br><br>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label sil" >Preferred Genres:</label>  
            <div class="col-md-4">
              <?php
              if(isset($_SESSION['prefer_genres'])) { 
                echo "<input type=\"text\" name=\"prefgenres\" value=\"{$_SESSION['prefer_genres']}\" class=\"form-control input-md\">";
              }
              else {
                echo "<input type=\"text\" name=\"prefgenres\" placeholder=\"Genres\" class=\"form-control input-md\">";
              }
              ?>
              <span class="help-block">Action, Shooters, Adventure, Puzzle, Fighting, RPG </span>  
            </div>
          </div>
          <br><br><br>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label sil" >About Me:</label>  
            <div class="col-md-6">
              <?php
              if (isset($_SESSION['about_me'])) {
                echo "<textarea name=\"about\" class=\"form-control\" rows=\"7\">{$_SESSION['about_me']}</textarea>";
              }
              else {
                echo "<textarea name=\"about\" placeholder=\"Describe yourself\" class=\"form-control\" rows=\"7\"></textarea>";
              }
              ?>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group btnspace"><br>
            <label class="col-md-4 control-label" for="singlebutton"> </label>
            <div class="col-md-2">
              <a href="profile.php" class="btn btn-block">Cancel</a>
            </div><br><br><br>
            <div class="form-group">
              <label class="col-md-4 control-label" for="singlebutton"> </label>
              <div class="col-md-2">
                <button type="submit" name="editprofile-submit" class="btn btn-block">Submit</button>
              </div>
            </div>
          </div>
        </fieldset>
      </form>

    </div>
  </div>

  <?php
  include_once 'sfooter.php'
  ?>

</body>
</html>