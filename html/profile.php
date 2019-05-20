<?php
session_start();
?>

<?php
include_once 'sheader.php';
require '../includes/profilequery-inc.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/profile.css">

<!------ Include the above in your HEAD tag ---------->

<body>
    <div class="container main-secction borders">
        <div class="row">
            <div class="row user-left-part">
                <div class="col-md-3 col-sm-3 col-xs-12 user-profil-part pull-left sectcolor">
                    <div class="row ">
                        <div class="col-md-12 col-md-12-sm-12 col-xs-12 user-image text-center">
                            <?php
                            require '../includes/profilepic-inc.php';
                            ?>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12 user-detail-section1 text-center">
                            <a href='changephotos.php' class="btn btn-block follow btn1">Change Profile Photos</a> 
                            <a href='editprofile.php' class="btn btn-block btn2">Edit Profile</a>                               
                        </div>
                        <div class="row user-detail-row">
                            <div class="col-md-12 col-sm-12 user-detail-section2 pull-left">
                                <div class="border"></div>
                                <?php echo "<h1>{$_SESSION['u_uid']}</h1>"; ?>
                            </div>                           
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12 pull-right profile-right-section">
                    <div class="row profile-right-section-row">
                        <div class="col-md-12 profile-header">
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-6 profile-header-section1 pull-left">
                                 <?php echo "<h1 class=\"sil\">{$_SESSION['fname']} {$_SESSION['lname']}</h1>"; ?>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                      <a class="silver nav-link active sil" href="#profile" role="tab" data-toggle="tab"><i class="fas fa-user-circle"></i>Info</a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link sil" href="#buzz" role="tab" data-toggle="tab"><i class="fas fa-info-circle"></i> Games Played</a>
                                  </li>                                                
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade active in" id="profile">
                                    <div class="row"><br>
                                        <div class="col-md-4">
                                            <label>Age:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo "<p>{$_SESSION['age']}</p>"; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Online Gamer IDs:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo "<p>{$_SESSION['gamer_id']}</p>"; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Discord Username:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo "<p>{$_SESSION['discord_name']}</p>"; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Systems/Consoles:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo "<p>{$_SESSION['sys_con']}</p>"; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Favorite Games:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo "<p>{$_SESSION['fav_game']}</p>"; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Preferred Genres:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <?php echo "<p>{$_SESSION['prefer_genres']}</p>"; ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label><u>About Me</u></label>
                                        </div>
                                    </div>
                                    <div class="row"><br>
                                        <div class="col-md-12">
                                            <?php echo "<p>{$_SESSION['about_me']}</p>"; ?>
                                        </div>

                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="buzz">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <?php
                                            require '../includes/gamequery-inc.php';
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>

<?php
include_once 'sfooter.php';
?>