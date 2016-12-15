<h2>Оставить отзыв</h2>
<form method="post" action ="index.php">
    <p>
        <label>
            Имя
        </label>
        <input type="text" name="name" value="<?=$post['name'];?>" class="form-item" placeholder="Введите имя" autofocus-required>
    </p>
    <p>
        <label>
            Почта
        </label>
        <input type="mail" name="mail" value="<?=$post['mail'];?>" class="form-item" placeholder="Введите адрес электронной почты" autofocus-required>
    </p>
    <p>
        <label>
            Заголовок
        </label>
        <input type="text" name="title" value="<?=$post['title'];?>" class="form-item" placeholder="Введите заголовок" autofocus-required>
    </p>
    <p>
        <label>
            Сообщение
        </label>
        <textarea class="form-item" name="content" placeholder="Введите текст сообщения"><?=$post['content'];?></textarea>      
    </p>
    <p>
        <img style="border: 1px solid gray; background: url('img/bg_capcha.png');" src = "captcha.php" width="120" height="40"/>
    </p>
    <p>
        <label>
            CAPTCHA
        </label>
        <input type="text" name="capcha" placeholder="Введите символы с изображения" class="form-item" autofocus-required>
    </p>
    <p>
        <input name="submit" type="submit" value="Отправить" class="btn">
    </p>
</form>