<?php

class Model_Users extends Model {

    public function run() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = new Database;

            $login = parent::clear_string($_POST["login"]);
            $pass = strtolower(parent::clear_string($_POST['pass']));
            $pass = md5($pass);
            $pass = strrev($pass);
            $pass = "5nm4rv8qqqe" . $pass . "3yo1zzy2";

            if ($_POST["rememberme"] == "yes") {
                setcookie('rememberme', $login . '+' . $pass, time() + 3600 * 24 * 31, "/");
            }

            $result = $db->prepare("SELECT login,password,surname,name,email FROM `users` WHERE (login=? OR email=?) AND password=?");
            $result->execute(array($login, $login, $pass));
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    Session::set('yes_auth', true);
                    $_SESSION['auth_password'] = $row["password"];
                    $_SESSION['auth_login'] = $row["login"];
                    $_SESSION['auth_surname'] = $row["surname"];
                    $_SESSION['auth_name'] = $row["name"];
                    $_SESSION['auth_email'] = $row["email"];
                    echo 'yes_auth';
                }
            } else {
                echo 'no_auth';
            }
        }
    }

    public function logout() {
        Session::destroy();
        setcookie('rememberme', '', 0, '/');
        header('Location: /main');
        exit();
    }

    public function remindPass() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = new Database;
            $email = parent::clear_string($_POST["email"]);

            if ($email != "") {
                $result = $db->prepare("SELECT email FROM users WHERE email=?");
                $result->execute(array($email));
                if ($result->rowCount() > 0) {
                    $newpass = parent::fungenpass();

                    $pass = strtolower(parent::clear_string($newpass));
                    $pass = md5($pass);
                    $pass = strrev($pass);
                    $pass = "5nm4rv8qqqe" . $pass . "3yo1zzy2";
                    
                    $update = $db->prepare("UPDATE users SET password=? WHERE email=?");
                    $update->execute(array($pass, $email));

                    parent::send_mail('task@mail.ru', $email, 'Новый пароль для сайта TASK', 'Ваш пароль: ' . $newpass);
         
                } else {
                    echo 'Данный E-mail не найден!';
                }
            } else {
                echo 'Укажите свой E-mail';
            }
        }
    }

}
