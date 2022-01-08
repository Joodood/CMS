<?php

class UserValidator{
    private $data;
    private $errors = [];
    private static $fields = ['username', 'email', 'password', 'confirm_password'];
    private $pass_check = [];
    private $perfectarray = [];
    public function __construct($post_data){
        $this->data = $post_data;
        //data we pass inf
    }

    public function validateForm() {
        //you want to do something if the fields form does not exist,
        //or if something in the fields isn't present
        //for each the for loop and check if self::$fields
        //if any key exists in the for loop
        //we use :: because it is a static data type
        foreach (self::$fields as $field) {
            //post_data we send in -> this->data is an array
            if (!array_key_exists($field, $this->data)) {
                trigger_error("$field is not present in data");
                return;
            }
        }
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePassword();
        $this->validateConfirmPassword();
        $new = array_merge($this->errors, $this->perfectarray);
        return $new;
    }

    private function validateUsername() {
        //we are only getting here because this array key exists
        //trim whitespace from data
        $val = trim($this->data['username']);

        //check is that value empty
        //you could have a space or press submit
        if (empty($val)) {
            //add to the error errors so, so when the error array goes back it can notify the user
            $this->addError('username', 'username cannot be empty');
        } else {
            //regular expression: if a certain string matched sa certain pattern
            //you only want to do something if it is false
            //so put the '!'\
            //passing val, or the username into val and checking it against the pattern in preg_match()
            if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $val)) {
                $this->addError('username', 'username must be 6-12 chars and alphanumeric');
            }
            $this->addPerfectArray('perfectusername', $val);
        }
    }

    private function validateEmail() {

        $val = trim($this->data['email']);

        //check is that value empty
        //you could have a space or press submit
        if (empty($val)) {
            //add to the error errors so, so wehn the error array goes back it can notify thte user
            $this->addError('email', 'email cannot be empty');
        } else {
            //regular expression: if a certain string matched sa certain pattern
            //you only want to do something if it is false
            //so put the '!'\
            //passing val, or the username into val and checking it against the pattern in preg_match()
            //value you want to evaluate first, then filter that you want to use
            //FILTER_VALIDATE_EMAIL): makes sure its a valid email - returns true if so, returns false if not
            //i only want to adderror if the filter_validate_email returns false, so i put ! in front of filter_var
            if (!filter_var($val, FILTER_VALIDATE_EMAIL)) {
                $this->addError('email', 'email must be 6-12 chars and alphanumeric');
            }
            $this->addPerfectArray('perfectemail', $val);
        }

    }

    private function validatePassword(){
        $val = trim($this->data['password']);
        $this->pass_check['password'] = $val;
        if (empty($val)) {
            $this->addError('password', 'password cannot be empty');
        } elseif (strlen($val < 6)) {
            $this->addError('password', 'password must be greater than 6 characters');

        }
    }

        private function validateConfirmPassword() {
            $val = trim($this->data['confirm_password']);
            $this->pass_check['confirm_password'] = $val;
            if (empty($val)) {
                $this->addError('confirm_password', 'the confirmed password cannot be empty');
            } else {
            $this->twopasscheck();
            }
        }

        private function twopasscheck() {
            $pass = $this->pass_check['password'];
            $confirm_pass = $this->pass_check['confirm_password'];

            if ($pass !== $confirm_pass) {
                $this->addError('matchy', 'passwords must match');
            }
            $this->addPerfectArray('perfectpassword', $pass);
        }


    private function addError($key, $val){
        //if an error happens with any of these arrays, dont worry
        //assinging it othe key and setting it equal to the value
        $this->errors[$key] = $val;
    }

    private function addPerfectArray($key, $val){
        $this->perfectarray[$key] = $val;
    }

//    private function doesemailexist() {
//        $val = trim($this->data['email']);
//
//    }
}


