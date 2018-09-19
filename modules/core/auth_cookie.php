<?php

$logged = Session::get('yes_auth');
if ($logged == false && $_COOKIE["rememberme"]) {
    $db = new Database;
    $str = $_COOKIE["rememberme"];

    $all_len = strlen($str);
    $login_len = strpos($str, '+');
    $login = Model::clear_string(substr($str, 0, $login_len));
    $pass = Model::clear_string(substr($str, $login_len + 1, $all_len));

    $result = $db->prepare("SELECT login,password,surname,name,email FROM `users` WHERE (login=? OR email=?) AND password=?");
    $result->execute(array($login, $login, $pass));
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            Session::set('yes_auth', true);
            $_SESSION['auth_pass'] = $row["pass"];
            $_SESSION['auth_login'] = $row["login"];
            $_SESSION['auth_surname'] = $row["surname"];
            $_SESSION['auth_name'] = $row["name"];
            $_SESSION['auth_patronymic'] = $row["patronymic"];
            $_SESSION['auth_phone'] = $row["phone"];
            $_SESSION['auth_email'] = $row["email"];
        }
    }
}
?>