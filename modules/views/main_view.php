<?php if (Session::get('yes_auth') == true): ?>
    <?php foreach ($data as $row): ?>
        <div class="blog-card">
            <div class="meta">
                <div class="photo" style="background-image: url(<?php echo $row['image'] ?>)"></div>
                <ul class="details">
                    <li class="author"><a href="#"><i class="far fa-user-circle"></i><?php echo $row['name'] ?></a></li>
                    <li class="date"><i class="fas fa-calendar-alt"></i><?php echo $row['datetimes'] ?></li>
                </ul>
            </div>
            <div class="description">
                <h1><?php echo $row['tittle'] ?></h1>
                <p><?php echo $row['description'] ?></p>
                <p class="read-more">
                    <a href="#">Подробнее »</a>
                </p>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <h2 class="display-4">Новости не доступны</h2><p>Вы должны <a href="registration">зарегистрироваться</a> или авторизироваться</li> на сайте</p>
<?php endif; ?>