<?php

class Model {

    public function clear_string($cl_str) {
        $cl_str = strip_tags($cl_str);
        $cl_str = trim($cl_str);

        return $cl_str;
    }

    function fungenpass() {
        $number = 7;

        $arr = array('a', 'b', 'c', 'd', 'e', 'f',
            'g', 'h', 'i', 'j', 'k', 'l',
            'm', 'n', 'o', 'p', 'r', 's',
            't', 'u', 'v', 'x', 'y', 'z',
            '1', '2', '3', '4', '5', '6',
            '7', '8', '9', '0');

        $pass = "";

        for ($i = 0; $i < $number; $i++) {
            $index = rand(0, count($arr) - 1);
            $pass .= $arr[$index];
        }
        return $pass;
    }

    function send_mail($from, $to, $subject, $body) {
        $charset = 'utf-8';
        mb_language("ru");
        $headers = "MIME-Version: 1.0 \n";
        $headers .= "From: <" . $from . "> \n";
        $headers .= "Reply-To: <" . $from . "> \n";
        $headers .= "Content-Type: text/html; charset=$charset \n";

        $subject = '=?' . $charset . '?B?' . base64_encode($subject) . '?=';

        echo "$to \n", "$subject \n", "$body \n", "$headers \n";
//        mail($to, $subject, $body, $headers);
    }

}
