<?php
    require_once("database.php");
    require_once("models/posts.php");
    
    $link = db_connect();
    $post = posts_get($link ,$_GET['id']);

    include("views/post.php");

?>

