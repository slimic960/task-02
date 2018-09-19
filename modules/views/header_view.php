<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Task</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <?php
                if (Session::get('yes_auth') == true) {
                    echo '<li class="nav-item"><a id="auth-user-info" class="nav-link" href="#"><i class="far fa-user"></i>' . $_SESSION['auth_name'] . '</a></li>';
                } else {
                    echo '<li id="reg-auth-title" class="nav-item"><a class="nav-link top-auth" href="#">Вход</a></li>'
                    . '<li id="reg-auth-title" class="nav-item"><a class="nav-link" href="registration">Регистрация</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<div id="block-top-auth">
    <div class="container">
        <form method="post">
            <ul id="input-email-pass">
                <h3>Вход</h3>
                <p id="message-auth">Неверный Логин и(или) Пароль</p>

                <li><center><input type="text" id="auth_login" placeholder="Логин или E-mail" /></center></li>
                <li><center><input type="password" id="auth_pass" placeholder="Пароль" /><span id="button-pass-show-hide" class="pass-show"><i class="far fa-eye"></i></span></center></li>

                <ul id="list-auth">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" name="rememberme" id="rememberme">
                        <label class="form-check-label" for="rememberme">
                            Запомнить меня
                        </label>
                    </div>                
                    <li><a id="remindpass" href="#">Забыли пароль?</a></li>
                </ul>

                <p align="right" id="button-auth" ><button  type="button" class="btn btn-success">Вход</button></p>
                <p align="right" class="auth-loading"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></p>

            </ul>
        </form>

        <div id="block-remind">
            <div class="container">
                <h3>Восстановление пароля</h3>
                <p id="message-remind" class="message-remind-success"></p>
                <input type="text" id="remind-email" placeholder="Ваш E-mail" />
                <p id="button-remind"><button type="button" class="btn btn-success">Готово</button></p>
                <p class="auth-loading" ><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></p>
                <p id="prev-auth"><button type="button" class="btn btn-danger">Назад</button></p>
            </div>
        </div>
    </div>
</div>

<div id="block-user" >
    <ul>
        <?php
        if (Session::get('yes_auth') == true) {
            echo'<li><a href="#"><i class="far fa-address-card"></i>Профиль</a></li>
                 <li><a id="logout" href="users/logout"><i class="fas fa-sign-out-alt"></i>Выход</a></li>';
        }
        ?>
    </ul>
</div>