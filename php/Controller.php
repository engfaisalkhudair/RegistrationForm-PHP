<?php
session_start();

function RegisterValidation($name , $email , $password , $url , $phone){
    $error = [];
    if (empty($name) || empty($email) || empty($password) || empty($url) || empty($phone)) {
        $errors['public'] = "Please fill in all input fields";
    }else{
        if (!preg_match("/^[a-zA-Z]{3,}+$/i" , $name)){
            $error['name'] = "please enter your name more than 3 character";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error['email'] = "please enter your email finished @gmail.com";
        }

        if (!filter_var($url , FILTER_VALIDATE_URL)) {
            $error['url'] = "please enter URL";
        }
        if (!preg_match("/^[A-Z]+[a-z]{8,}$/" , $password)) {
            $error['pass'] = "please enter Password include one capital letter and more than 8 character";
        }
        $strPhone = strval($phone);
        if(!str_contains($strPhone, "059") ){
            $error['phone'] = "please enter your number started 059...";
        }else if(strlen($strPhone) != 10){
            $error['phone'] = "please enter your number count 10 only ";
        }
    }

    return $error;
};

function loginValidation($username, $password) {
    $errors = [];

    if (empty($username) || empty($password)) {
        $errors['public'] = "Please fill in both username and password fields";
    } else {
        if (isset($_SESSION['users'][$username])) {
            $userPassword = $_SESSION['users'][$username]['password'];
            if (password_verify($password, $userPassword)) {
                $_SESSION["userName"] = $username;
                setcookie("statusLogin", true, time() + (15 * 60)); // 15 minutes
                header("refresh:0;url=./php/homePage.php");
            } else {
                $errors['public'] = "Incorrect username or password";
            }
        } else {
            $errors['public'] = "Incorrect username or password";
        }
    }
    return $errors;
}