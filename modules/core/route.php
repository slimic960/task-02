<?php

class Route {

    static function run() {
        // контроллер и экшен по умолчанию
        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        // контроллер
        if (!empty($routes[1])) {
            $controller_name = $routes[1];
        }

        //экшен
        if (!empty($routes[2])) {
            $action_name = $routes[2];
        }

        // префиксы
        $model_name = 'Model_' . $controller_name;
        $controller_name = 'Controller_' . $controller_name;
        $action_name = 'action_' . $action_name;

        // с классом модели 

        $model_file = strtolower($model_name) . '.php';
        $model_path = "modules/models/" . $model_file;
        if (file_exists($model_path)) {
            include "modules/models/" . $model_file;
        }

        // с классом контроллера
        $controller_file = strtolower($controller_name) . '.php';
        $controller_path = "modules/controllers/" . $controller_file;
        if (file_exists($controller_path)) {
            include "modules/controllers/" . $controller_file;
        } else {
            Route::ErrorPage404();
        }

        // создаем контроллер
        $controller = new $controller_name;
        $action = $action_name;

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            Route::ErrorPage404();
        }
    }

    function ErrorPage404() {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }

}
