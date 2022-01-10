<?php

class Users extends Controller {
    protected $login_err;

    public function __construct() {
        $this->usermodel = $this->model('User');
    }
    public function register() {
        if (isset($_POST['wuby'])) {
            require_once "ValidateUser.php";
            $guy = new UserValidator($_POST);
            $err = $guy->validateForm();
            //grab the email from err and check if it already exists
            if (isset($err)) {
//                print_r($err);
                $this->view('users/Register_view', $err);
            }
            if (isset($err['perfectemail'])) {
                $usr_email = $err['perfectemail'];
                $findornot = $this->usermodel->findemail($usr_email);
                if ($findornot == false) {
                    echo 'Email is already taken     :(';
                    //if not do this last isset, then create account throws warning cuz perfpass can not be filled in
                } elseif(isset($err['perfectusername'], $err['perfectpassword'], $err['perfectemail'])) {
                    $perfusername = $err['perfectusername'];
                    $perfpass = $err['perfectpassword'];
                    $perfemail = $err['perfectemail'];
                    //insert user into database
                    $this->usermodel->InsertIntoDatabase($perfusername, $perfpass, $perfemail);
                    flash('register_successful', "You are registered and can log in");
                    redirect('users/login');
                }
            }
        } else {
            $this->view('users/Register_view');
        }
    }
    public function login(){
        if (isset($_POST['login_submit'])) {
//            print_r($_POST['login_email']);
            require_once "LoginValidate.php";
            $mehigh = new LoginValidator($_POST, $this->usermodel);
            $errors = $mehigh->validateForm();

            if(isset($errors)) {
                $this->view('users/Login_view', $errors);
            }


            //**extremely important, returns a row
            $loggedInUser = $this->usermodel->login($_POST['login_email'], $_POST['login_password']);
            //if login function returns the row with all the id, name, pass and email of user, and it evals to true, then..
            if($loggedInUser) {
                //create session
//                die('successful you is, sir Jude');
                //start session and put stuff into session variables
                $this->createUserSession($loggedInUser);
            } else {
                $errors['login_password'] = 'The password is incorrect';
                $this->view('users/Login_view', $errors);
            }
//            $this->view('users/Login_view', $errors);
        } else {
            $this->view('users/Login_view');
        }
    }

    public function createUserSession($loggedInUser) {
        //setting the user_id to a session variable
        //do the same for the email and the name
        $_SESSION['user_id'] = $loggedInUser->id;
        $_SESSION['user_email'] = $loggedInUser->email;
        $_SESSION['user_name'] = $loggedInUser->name;
        //redirect to a certain location/file after loggint in
        redirect('posts');
    }

    public function logout() {
        //just getting rid of session variables that we created
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn() {
        if(isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
