<?php


class Contact extends Controller {
    public function __construct() {

    }

    public function index() {
        $data = ['title' => 'Contact Us!'];
        $this->view('Contact_view', $data);
    }

    public function about() {

    }
}