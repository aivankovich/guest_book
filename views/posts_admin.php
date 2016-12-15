<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf8">
        <title>Гостевая книга</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        </head>
    <body>
    <div class="container">
        <h1><a href = "http://localhost/gb/">Гостевая книга</a></h1>
        <table class="table">
            <tr>
                <th>Одобрен</th>
                <th>Заголовок</th>
                <th>Ссылка</th>
            </tr>
            <?php foreach($posts as $a): ?>
            <tr>
                <td>
                    <?php 
                        if ($a['confirmed'] == '1'){
                            echo '+';
                        } else{
                            echo '-';
                        }    
                    ?>
                </td>
                <td>
                    <?=$a['title']?></a>
                </td>
                <td>
                    <a href="../post.php?id=<?=$a['id']?>" target="_blank"><p><?=posts_intro($a['content'])?></p></a>
                </td>
                <td>
                    <a href="index.php?action=delete&id=<?=$a['id']?>"><input type="submit" value="Удалить" class="btn"></a>
                </td>
                <td>
                    <a href="index.php?action=confirm&id=<?=$a['id']?>"><input type="submit" value="Подтвердить" class="btn"></a>
                </td>
            </tr>
            <?php endforeach ?>
        </table>
        <div>
            <footer>
                <hr>
                <p>aivankovich<br>Copyright &copy; 2016</p>
            </footer>
        </div>
    </div>
    </body>
</html>
