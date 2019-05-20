<head>
  <title>Can't Pause I'm Online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>


<header>
  <div class="jumbotron">
    <img src="images/logot.png" id="logo" class="img-responsive" alt="Can't Pause I'm Online Logo">
  </div>

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand">CPIO</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a></li>  
          <?php
          if (isset($_SESSION['u_uid'])) {
            echo "
            <li><a href=\"html/forum.php\">Forums</a></li>
            <li><a href=\"html/vidDB.php\">Video Game Database</a></li>
            <li><a href=\"html/profile.php\">Profile</a></li><li>
            <a class=\"navbar-brand\">{$_SESSION['u_uid']}</a></li></ul>";
          }
          else {
            echo "<li><a href=\"signup.php\"><span class=\"glyphicon glyphicon-user\"></span> Signup</a></li>
            </ul>";
          }
          ?>

          <?php
          if (isset($_SESSION['u_uid'])) {
            echo '<form class="navbar-form navbar-right" action="includes/logout-inc.php" method="post">
            <button type="submit" class="btn btn-default btn-sm" name="logout-submit">
            <span class="glyphicon glyphicon-log-in"></span> Logout
            </button>
            </form>';
          }
          else {
            echo '<form class="navbar-form navbar-right" action="includes/login-inc.php" method="post">
            <div class="form-group">
            <input type="text" class="form-control" name="mailuid" placeholder="Username">
            </div>
            <div class="form-group">
            <input type="password" class="form-control" name="pwd" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default btn-sm" name="login-submit">
            <span class="glyphicon glyphicon-log-in"></span> Login
            </button>
            </form>';
          }
          ?> 
        </div>
      </div>
    </nav>
  </header>