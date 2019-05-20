<?php
session_start();
require 'dbh-inc.php';

if (isset($_POST['reply-submit']) && isset($_POST['cont']) && $_POST['cont'] != '' && isset($_GET['tid']) && $_GET['tid'] != '') {

  $cont = mysqli_real_escape_string($conn, $_POST['cont']);
  $thread = $_GET['tid'];
  $id = $_SESSION['id_users'];
  $user = $_SESSION['u_uid'];
  $query = mysqli_query($conn, "SELECT * FROM threads WHERE threads_id = '$thread'");

  if(!$query) {
    die('Error: ' . mysqli_error($conn));
  }
  if(mysqli_num_rows($query) > 0) {
    $sql = "INSERT INTO replies (replies_id, threads_id, content, authorId, author, replies_date) VALUES ('', '$thread', '$cont', '$id', '$user', NOW())";
    if (mysqli_query($conn, $sql)) {
      echo "";
    } else {
      echo ("Error description: " . mysqli_error($conn));
    }
  }
}

$replies = '';
if (isset($_GET['tid']) && $_GET['tid'] != '') {
  $threadsId = $_GET['tid'];
  $query = mysqli_query($conn, "SELECT * FROM threads WHERE threads_id = '$threadsId'");
  if (mysqli_num_rows($query) > 0) {
    $info = mysqli_fetch_array($query);
    $query = mysqli_query($conn, "SELECT * FROM replies WHERE threads_id = '$threadsId'");
    if (mysqli_num_rows($query) > 0) {
      $replies = '
      <div class="row">
      <div class="col-md-12">
      <h2 class="page-header">Comments</h2>
      <section class="comment-list">';
      while ($row = mysqli_fetch_array($query)) {
        $filename = '../uploads/profile' . $row["authorId"] . '.jpg';
        if (file_exists($filename)) {
          $replies .= '
          <article class="row black">
          <div class="col-md-2 col-sm-2 hidden-xs">
          <figure class="thumbnail">
          <img class="img-responsive" src="../uploads/profile'.$row["authorId"].'.jpg?"'.mt_rand().'" onerror="this.src=\'../uploads/profiledefault.jpg\';/>
          <figcaption class="text-center">'.$row["author"].'</figcaption>
          </figure>
          </div>
          <div class="col-md-8 col-sm-10">
          <div class="panel panel-default arrow left">
          <div class="panel-body">
          <header class="text-left">
          <div class="comment-user"><i class="fa fa-user"></i> '.$row["author"].'</div>
          <time class="comment-date"><i class="fa fa-clock-o"></i> '.$row["replies_date"].'</time>
          </header>
          <div class="comment-post">
          <p>
          '.$row["content"].'
          </p>
          </div>'.
          /*<p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>*/'
          </div>
          </div>
          </div>
          </article><hr>';
        } else {
          $replies .= '
          <article class="row black">
          <div class="col-md-2 col-sm-2 hidden-xs">
          <figure class="thumbnail">
          <img class="img-responsive" src="../uploads/profile'.$row["authorId"].'.jpeg?"'.mt_rand().'" onerror="this.src=\'../uploads/profiledefault.jpg\';"/>
          <figcaption class="text-center">'.$row["author"].'</figcaption>
          </figure>
          </div>
          <div class="col-md-8 col-sm-10">
          <div class="panel panel-default arrow left">
          <div class="panel-body">
          <header class="text-left">
          <div class="comment-user"><i class="fa fa-user"></i> '.$row["author"].'</div>
          <time class="comment-date"><i class="fa fa-clock-o"></i> '.$row["replies_date"].'</time>
          </header>
          <div class="comment-post">
          <p>
          '.$row["content"].'
          </p>
          </div>'.
          /*<p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>*/'
          </div>
          </div>
          </div>
          </article><hr>';
        }
      }
      $replies .= '</section>
      </div>
      </div>';
    }
    $title = $info['title'];
    $content = $info['content'];
    $author = $info['author'];
    $authorId = $info['authorId']; 
    $date = $info['thread_date'];
  } else 
  echo "fail";
} else
echo "fail";