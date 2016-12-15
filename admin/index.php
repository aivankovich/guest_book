<?php
    require_once("../database.php");
    require_once("../models/posts.php");

    $link = db_connect();

    if(isset($_GET['action']))
        $action = $_GET['action'];
    else
        $action= "";

    if ($action =='delete'){
        $id = $_GET['id'];
        $post = posts_delete($link, $id);
        header("Location: index.php");        
    }
    else if ($action =='confirm'){
        $id = $_GET['id'];
        $post = posts_confirm($link, $id);
        header("Location: index.php");        
    }
    else{
        $posts = posts_all($link);
        include("../views/posts_admin.php");
    }

?>