<?php
    require_once("database.php");
    require_once("models/posts.php");
    
    $link = db_connect();
    $posts = posts_confirmed($link);

    session_start();

    if( isset( $_POST['submit'] ) ){
        posts_validate($link,$_POST['name'], $_POST['mail'], $_POST['title'], $_POST['content'], $_POST['capcha']);
    }
    $post = array(
        'name' => "",
        'mail' => "",
        'title' => "",
        'content' => "",
        'capcha' => "");

    include("views/header.php");
    include("views/posts.php");
    include("views/post_add.php");
    include("views/footer.php");
?>