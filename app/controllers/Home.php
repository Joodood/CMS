<?php


class Home extends Controller {
    public function __construct() {

    }

    public function index() {

        if(isLoggedIn()) {
            redirect('posts');
        }


        $data = ['title'=>'Welcome to home!'];
        $this->view('Luke_Home', $data);
    }

    public function about(){

}
}