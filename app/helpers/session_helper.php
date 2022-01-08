<?php

//what were going to use for session start
//session variabgle is temporary variable
//when login, sotre user info in session, and when logout
//you want to destroy session and those variables
//$_SESSION['user'] = 'Brad';

session_start();
// EXAMPLE - flash('register_success', 'you are now registered')
function flash($name='', $message = '') {
    //make sure name is passed in
    if(!empty($name)) {
        //if there is a message but its not set in the session
        if(!empty($message) && empty($_SESSION[$name])) {
            //check to see if their are people already logged in
            if(!empty($_SESSION[$name])) {
                unset($_SESSION[$name]);
            }
            $_SESSION[$name] = $message;
        }
        //if it is there in a a session
    } elseif(empty($message) && !empty($_SESSION[$name])) {
        unset($_SESSION[$name]);
//        echo '<div>' $_SESSION[$name]; '</div>'
    }
}

function isLoggedIn() {
    if(isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}







?>