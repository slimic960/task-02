<?php

class Controller_Users extends Controller {

    function __construct() {
        $this->model = new Model_Users();
    }

    function action_index() {

    }

    public function action_run() {
        $this->model->run();
    }

    public function action_logout() {
        $this->model->logout();
    }

    public function action_remindPass() {
        $this->model->remindPass();
    }

}
