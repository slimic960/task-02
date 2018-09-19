<?php

class Model_Registration extends Model {

    public function run() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = new Database;
            $error = array();

            $login = strtolower(parent::clear_string($_POST['reg_login']));
            $pass = strtolower(parent::clear_string($_POST['reg_pass']));
            $surname = parent::clear_string($_POST['reg_surname']);
            $name = parent::clear_string($_POST['reg_name']);
            $email = parent::clear_string($_POST['reg_email']);


            if (strlen($login) < 5 or strlen($login) > 15) {
                $error[] = "Логин должен быть от 5 до 15 символов!";
            } else {
                $result = $db->prepare("SELECT login FROM `users` WHERE login=?");
                $result->execute(array($login));
                if ($result->rowCount() > 0) {
                    $error[] = "Логин занят!";
                }
            }

            if (strlen($pass) < 7 or strlen($pass) > 15)
                $error[] = "Укажите пароль от 7 до 15 символов!";
            if (strlen($name) < 3 or strlen($name) > 15)
                $error[] = "Укажите Имя от 3 до 15 символов!";
            if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", trim($email)))
                $error[] = "Укажите корректный email!";


            if ($_SESSION['img_captcha'] != strtolower($_POST['reg_captcha']))
                $error[] = "Неверный код с картинки!";
            unset($_SESSION['img_captcha']);

            if (count($error)) {
                echo implode('<br />', $error);
            } else {
                $pass = md5($pass);
                $pass = strrev($pass);
                $pass = "5nm4rv8qqqe" . $pass . "3yo1zzy2";
                $ip = $_SERVER['REMOTE_ADDR'];
                $date = date('Y-m-d H:i:s');

                try {
                    $result = $db->prepare("INSERT INTO users(login,password,surname,name,email,datetime,ip) VALUES (?,?,?,?,?,?,?)");
                    $result->execute(array($login, $pass, $surname, $name, $email, $date, $ip));
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }

                header('Location: /main');
            }
        }
    }

    public function regCaptcha() {
        $width = 100;                       //Ширина изображения
        $height = 50;                       //Высота изображения
        $font_size = 17.5;                  //Размер шрифта
        $let_amount = 4;                    //Количество символов, которые нужно набрать
        $fon_let_amount = 30;               //Количество символов, которые находятся на фоне
        $path_fonts = 'webfonts/captcha/';  //Путь к шрифтам 


        $letters = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'j', 'k', 'm', 'n', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '2', '3', '4', '5', '6', '7', '9');
        $colors = array('10', '30', '50', '70', '90', '110', '130', '150', '170', '190', '210');

        $src = imagecreatetruecolor($width, $height);
        $fon = imagecolorallocate($src, 255, 255, 255);
        imagefill($src, 0, 0, $fon);

        $fonts = array();
        $dir = opendir($path_fonts);
        while ($fontName = readdir($dir)) {
            if ($fontName != "." && $fontName != "..") {
                $fonts[] = $fontName;
            }
        }
        closedir($dir);

        for ($i = 0; $i < $fon_let_amount; $i++) {
            $color = imagecolorallocatealpha($src, rand(0, 255), rand(0, 255), rand(0, 255), 100);
            $font = $path_fonts . $fonts[rand(0, sizeof($fonts) - 1)];
            $letter = $letters[rand(0, sizeof($letters) - 1)];
            $size = rand($font_size - 2, $font_size + 2);
            imagettftext($src, $size, rand(0, 45), rand($width * 0.1, $width - $width * 0.1), rand($height * 0.2, $height), $color, $font, $letter);
        }

        for ($i = 0; $i < $let_amount; $i++) {
            $color = imagecolorallocatealpha($src, $colors[rand(0, sizeof($colors) - 1)], $colors[rand(0, sizeof($colors) - 1)], $colors[rand(0, sizeof($colors) - 1)], rand(20, 40));
            $font = $path_fonts . $fonts[rand(0, sizeof($fonts) - 1)];
            $letter = $letters[rand(0, sizeof($letters) - 1)];
            $size = rand($font_size * 2.1 - 2, $font_size * 2.1 + 2);
            $x = ($i + 1) * $font_size + rand(4, 7);
            $y = (($height * 2) / 3) + rand(0, 5);
            $cod[] = $letter;
            imagettftext($src, $size, rand(0, 15), $x, $y, $color, $font, $letter);
        }

        $_SESSION['img_captcha'] = implode('', $cod);

        header("Content-type: image/gif");
        imagegif($src);
    }

    public function checkLogin() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $db = new Database;

            $login = parent::clear_string($_POST['reg_login']);

            $result = $db->prepare("SELECT login FROM `users` WHERE login=?");
            $result->execute(array($login));
            if ($result->rowCount() > 0) {
                echo 'false';
            } else {
                echo 'true';
            }
        }
    }

    public function checkCaptcha() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($_SESSION['img_captcha'] == strtolower($_POST['reg_captcha'])) {
                echo 'true';
            } else {
                echo 'false';
            }
        }
    }

}
