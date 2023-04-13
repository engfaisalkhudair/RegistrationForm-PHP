<?php
session_start();

function RegisterValidation($name , $email , $password , $url , $phone){
    $error = [];
    if(!empty($name) && !empty($email) && !empty($password) && !empty($url) && !empty($phone)){
        if (!preg_match("/^[a-zA-Z]{3,}+$/i" , $name)){
            $error['name'] = "please enter your name more than 3 character";
        }
        if (!preg_match("/^[a-zA-Z0-9_]+@(gmail)\.com$/i" , $email)) {
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
    }else{
        $error['public'] = "please enter All Input";
    }
    return $error;
};

function LoginValidation($name,$password ){
    $error = [];
    if (isset($_SESSION['users'][$name]) && $_SESSION['users'][$name]['password'] == $password) {
        $_SESSION["userName"] = $name;
        setcookie("statusLogin" , true , time() + (15 * 60)); // 15 minutes
        header( "refresh:0;url=./php/homePage.php" );
    }else{
        $error['public'] = "please enter All Input And Check From Value";
    }
    return $error;
}
