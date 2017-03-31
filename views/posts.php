<?php foreach($posts as $a): ?>
    <div class="post">
        <h3><a href="post.php?id=<?=$a['id']?>"><?=$a['title']?></a></h3>
        <h4><?=$a['name']?></h4>
        <p><?=posts_intro($a['content'])?></p>
        <em>конская залупа: <?=$a['mail']?></em>
    </div>
<?php endforeach ?>   
