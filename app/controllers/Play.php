<?php


class Play extends Controller {
    public function __construct() {

    }

    public function index() {
        $data = ['title'=>'Welcome to play!'];
        $this->view('Play_view', $data);
    }

    public function about() {

    }
}
///yeaa

?>