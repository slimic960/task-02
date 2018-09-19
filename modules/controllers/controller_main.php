<?php

class Controller_Main extends Controller {

    function __construct() {
        $this->model = new Model_Main();
        $this->view = new View();
    }

    function action_index() {
        $data = $this->model->run();
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

    public function action_nextNews() {
        $data = $this->model->run();
        $this->view->generate('main_view.php', 'main_view.php', $data);
    }

}
