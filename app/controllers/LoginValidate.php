<?php

class LoginValidator {
    private $data;
    private $model;
    private $errors;
    private static $fields = ['login_email', 'login_password'];
    private $pass_check = [];

    public function __construct($post_data, $usrmodel) {
        $this->data = $post_data;
        $this->model = $usrmodel;
    }

    public function validateForm() {
        //first check if the form fields don't exist, aka arent set
        foreach(self::$fields as $field) {
            if(!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validate_email_login();
        $this->validate_pass_login();
        return $this->errors;
    }
    //first check if the email has a password that is set
    //then check to see if that email matches

    private function validate_email_login() {
        $val = trim($this->data['login_email']);
        if(empty($val)) {
            $this->addLoginError('login_email', 'email cannot be empty');
        } else {
            if(empty($this->model->doesemailexist($this->data['login_email']))) {
                $this->addLoginError('login_email', 'email not found');
            }
        }
    }

    private function validate_pass_login() {
        $val = trim($this->data['login_password']);
        if (empty($val)) {
            $this->addLoginError('login_password', 'Password cannot be empty');
            //if the login password of this user is empty, they dont exist in db
        } elseif (is_bool($this->data['login_email']) || is_null($this->data['login_email'])) {
            $this->addLoginError('login_email', 'email or password does not exist');
//        } elseif(!$this->model->getstringPassmodeled($this->data['login_email']) == $this->data['login_password']);
//            $this->addLoginError('login_password', 'Please enter a password that matches your username');
        }
    }

    private function addLoginError($key, $value) {
        $this->errors[$key] = $value;
    }
}