<script>$(document).ready(function () {
        validateRegistration();
    });</script> 
<section>
    <div class="container">
        <div class="row align-items-center">

            <div class="p-5">
                <h2>Регистрация</h2>

                <form method="post" id="form_reg" action="/registration/run">
                    <p id="reg_message"></p>
                    <div id="block-form-registration">
                        <ul id="form-registration">
                            <li>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Логин</span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Логин" name="reg_login" id="reg_login" aria-label="Логин" aria-describedby="basic-addon1">
                                </div>
                            </li>

                            <li>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2">Пароль</span>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Пароль" name="reg_pass" id="reg_pass" aria-label="Пароль" aria-describedby="basic-addon2">
                                </div>
                            </li>

                            <li>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon3">Фамилия</span>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Фамилия" name="reg_surname" id="reg_surname" aria-label="Фамилия" aria-describedby="basic-addon3">
                                </div>
                            </li>

                            <li>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon4">Имя</span>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="Имя" name="reg_name" id="reg_name" aria-label="Имя" aria-describedby="basic-addon4">
                                </div>                              
                            </li>                    

                            <li>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon5">E-mail</span>
                                    </div>
                                    <input type="text" class="form-control"  placeholder="E-mail" name="reg_email" id="reg_email" aria-label="E-mail" aria-describedby="basic-addon5">
                                </div>                             
                            </li>

                            <li>
                                <div id="block-captcha">                                     
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon6"><img src="/registration/regCaptcha"/></span>
                                        </div>
                                        <input type="text" class="form-control"  placeholder="Введите код с картинки" name="reg_captcha" id="reg_captcha"  aria-label="Введите код с картинки" aria-describedby="basic-addon6">                                           
                                    </div> 
                                    <a href="#" id="reloadcaptcha">Обновить</a>
                                </div>
                            </li>

                        </ul>
                        <p align="right"><button type="submit" id="form_submit" class="btn btn-primary btn-lg">Регистрация</button></p>
                    </div>

                </form>

            </div>
        </div>
    </div>
</section>
