<?php
session_start();
?>

<html>
<body>

  <?php
  include_once 'mheader.php'; /*Contains Header and Navbar*/
  ?>    

  <?php
  if(isset($_GET['login'])) {
    if ($_GET["login"] == "username") {
      echo '<div class="container notice borders signuperror"> Incorrect Username! </div><br>'; /*Displays warning that username is incorrect*/
    }
    else if ($_GET["login"] == "password") {
      echo '<div class="container notice borders signuperror"> Incorrect Password! </div><br>'; /*Displays warning that password is incorrect*/
    }
  }
  ?>
  
  <div class="row">
    <div class="col-sm-4 borders">
      <h2><u>About CPIO</u></h2>
      <p>
        &emsp;Can't Pause I'm Online (CPIO) is a website dedicated to the video gamer. The name was inspired from the countless amount of times I have been asked to do something while playing online multiplayer. I always responded with, "I can't pause i'm online!"
        <br><br>
        &emsp;The goal of CPIO is to provide players an environment that is about video games. CPIO is a project that is currently being updated.
      </p>
    </div>
    
    <div class="col-sm-6 borders">
      <h1><u>Featured Functions</u></h1>
      <p>
        <h4>Profiles:</h4>
        CPIO users are able to register, login, and create a profile.<br><br>
        
        <h4>Video Game Database:</h4>
        Using IGDB.com's API, users can search for video games using keywords. Users can either browse or add games they have played before onto their profile.
        <br><br>

        <h4>Forums:</h4> Browse forums that have been posted by other users and comment on various topics that peak your interests.
      </p>
    </div>
  </div>

  <?php
  include_once 'mfooter.php'; /*Displays the footer*/
  ?>

</body>
</html>