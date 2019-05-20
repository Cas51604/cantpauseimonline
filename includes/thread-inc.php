<?php

session_start();
require 'dbh-inc.php';

$sql = "SELECT * FROM threads";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['threads_id'];
        $title = $row["title"];
        $content = $row["content"];
        $author = $row['author'];
        $date = $row['thread_date'];

        if (strlen($content) > 100) {
            $a = $cotent;
            $content = '';
            for($i=0;$i<100;$i++) {
                $content .= $a[$i];
            }
        }

        echo '<section class="row panel-body">
        <section class="col-md-6">
        <h3 class="threadlink"> <a href="forums/threadPage.php?tid='.$id.'" class="whitespace btn btn2 btn-primary">
        <i class="glyphicon glyphicon-th-list"></i> '.$title.'</a></h3>
        <h6> '.$content.'</h6>
        </section><br>
        <section class="col-md-3">
        <i class="glyphicon glyphicon-user"></i> '.$author.'<br>
        <i class="glyphicon glyphicon-calendar"></i> '.$date.'
        </section>
        </section>
        <hr>
        ';
    }
}