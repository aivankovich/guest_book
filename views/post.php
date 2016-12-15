<?php include("header.php"); ?>
<div class="post">
    <h3><?=$post['title']?></h3>
    <p><?=$post['content']?></p>
    <em>Автор:<?=$post['name']?></em>
    <p>Почта:<?=$post['mail']?></p>
</div>
<?php include("footer.php"); ?>