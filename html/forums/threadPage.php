<?php
session_start();
?>

<html>
<body>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" type="text/css" href="../css/reply.css">
  <link rel="stylesheet" type="text/css" href="../css/threadPage.css">
  <script src="../java/ShowHide.js"></script>

  <?php
  include_once 'fheader.php';
  require '../../includes/threadPage-inc.php';
  ?>

  <div class="borders">
    <div class="row">
      <div class="col-md-12">
        <h1 class="sil"><b><?php echo $title; ?></b></h1><br>
        <section class="comment-list">
          <article class="row black">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail">
                <?php

                $filename = '../uploads/profile' . $authorId . '.jpg';
                if (file_exists($filename)) {
                  echo '<img class="img-responsive" src="../uploads/profile'.$authorId.'.jpg?"'.mt_rand().'" onerror="this.src=\'../uploads/profiledefault.jpg\';/>
                <figcaption class="text-center">'.$author.'</figcaption>';
                } else {
                  echo '<img class="img-responsive" src="../uploads/profile'.$authorId.'.jpeg?"'.mt_rand().'" onerror="this.src=\'../uploads/profiledefault.jpg\';"/>
                <figcaption class="text-center">'.$author.'</figcaption>';
                }
                ?>
              </figure>
            </div>
            <div class="col-md-8 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <?php
                  echo '
                  <header class="text-left">
                  <div class="comment-user"><i class="fa fa-user"></i> '.$author.'</div>
                  <time class="comment-date"><i class="fa fa-clock-o"></i> '.$date.'</time>
                  </header>';
                  ?>
                  <div class="comment-post">
                    <?php
                    echo '
                    <p>
                    '.$content.'
                    </p>';
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </article>
        </section>

      </div>
      <div class="row">
        <button onclick="ShowHide()" class="btn3 btn btn-primary"><i class="fa fa-reply"></i> Reply</button>
        <div id="space" class="col-md-12 sil"><hr>
          <form action=<?php echo 'threadPage.php?tid='.$_GET['tid'];?> method= "POST">
            <label class="col-xs-1 control-label" >Reply:</label>  
            <div class="col-md-6">
              <textarea name="cont" placeholder="Message" class="form-control" rows="7"></textarea>
              <button type="submit" name="reply-submit" class="btn3 btn btn-primary btnreply">Submit</button>
            </div>
          </form>
          <br>
        </div>
      </div>
      <?php echo $replies; ?>
    </div>
  </div>
  <?php
  include_once 'ffooter.php'
  ?>

</body>
</html>