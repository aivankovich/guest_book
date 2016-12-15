<?php

function posts_confirmed($link){    
    //Zapros k BD
    $query = "SELECT * FROM posts WHERE confirmed ='1' ORDER BY id DESC";
    $result = mysqli_query($link, $query);
    
    if (!$result)
        die(mysqli_error($link));
    
    //Izvlechenie iz BD
    $n = mysqli_num_rows($result);
    $posts = array();
    
    for ($i=0; $i<$n; $i++){
        $row = mysqli_fetch_assoc($result);
        $posts[] = $row;
    }
    
    return $posts;
}

function posts_all($link){    
    //Zapros k BD
    $query = "SELECT * FROM posts ORDER BY id DESC";
    $result = mysqli_query($link, $query);
    
    if (!$result)
        die(mysqli_error($link));
    
    //Izvlechenie iz BD
    $n = mysqli_num_rows($result);
    $posts = array();
    
    for ($i=0; $i<$n; $i++){
        $row = mysqli_fetch_assoc($result);
        $posts[] = $row;
    }
    
    return $posts;
}

function posts_get($link, $id_post){    
    //zapros k BD
    $query = sprintf("SELECT * FROM posts WHERE id = %d", (int)$id_post);
    $result = mysqli_query($link, $query);
    
    if (!$result)
        die(mysqli_error($link));
    
    $post = mysqli_fetch_assoc($result);
    return $post;
}
 function posts_new($link, $name, $mail, $title, $content)
 {    
     //prepairing. rezhem probeli
     $name = trim($name);
     $mail = trim($mail);
     $title = trim($title);
     $content = trim($content);
 
     //proverka
     if ($title == '' or $name =='' or $content =='')
         return false;
     
     //zapros
     $t = "INSERT INTO posts (name, mail, title, content) VALUES ('%s', '%s', '%s', '%s')";
     
     $query = sprintf($t, mysqli_real_escape_string($link, $name), mysqli_real_escape_string($link, $mail), mysqli_real_escape_string($link, $title),  mysqli_real_escape_string($link, $content));
     
    echo $query;
    $result = mysqli_query($link, $query);
    
    if (!$result)
        die(mysqli_error($link));
     
     return true;
 
 }   
 function posts_delete($link, $id)
 { 
     $id = (int)$id;
     //proverka
     if ($id == 0)
         return false;
     
     //query
     $query = sprintf("DELETE FROM posts WHERE id='%d'", $id);
     $result = mysqli_query($link, $query);
     
     if (!$result)
         die(mysqli_error($link));
     
     return mysqli_affected_rows($link);
 }   
function posts_confirm($link, $id)
 { 
     $id = (int)$id;
     //proverka
     if ($id == 0)
         return false;
     
     $query = sprintf("UPDATE posts SET confirmed='1' WHERE id='%d'", $id);
     $result = mysqli_query($link, $query);
     
     if (!$result)
         die(mysqli_error($link));
     
     return mysqli_affected_rows($link);
 }
function posts_intro($text, $len = 50)
{
    if(strlen($text) > 50){
        return mb_substr($text, 0, $len).'...';
    } else {
        return $text;
    }
}

function posts_validate($link, $name, $mail, $title, $content)
{
    if(!empty($_POST)){
         if($_POST['name'] ==''){
            echo 'Введите имя';
        } else if($_POST['mail'] ==''){
            echo 'Введите почту';
        } else if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST['mail']))){
           echo 'Проверьте правильность введения почты';  
         } else if($_POST['title'] ==''){
            echo 'Введите заголовок';
        }  else if($_POST['content'] ==''){
            echo 'Введите текст сообщения';
        } else if(!strtoupper($_POST['capcha']) == $_SESSION['capcha']){
            echo 'Текст с изображения введён не верно';
        } else {
            posts_new($link, $name, $mail, $title, $content);
            header("Location: index.php");
        }
    }
}
?>