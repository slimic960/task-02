<?php

class Controller_Registration extends Controller {

    function __construct() {
        $this->model = new Model_Registration();
        $this->view = new View();
    }

    function action_index() {
        $this->view->generate('registration_view.php', 'template_view.php', $data);
    }

    public function action_run() {
        $this->model->run();
    }

    public function action_regCaptcha() {
        $this->model->regCaptcha();
    }

    public function action_checkLogin() {
        $this->model->checkLogin();
    }

    public function action_checkCaptcha() {
        $this->model->checkCaptcha();
    }

}
