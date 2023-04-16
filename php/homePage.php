<?php
session_start();
if(!isset($_COOKIE["statusLogin"]) && time() > $_COOKIE["cookie_name"]) {
    header("Location: ../index.php");
}else{
    $name = $_SESSION['userName'];
    $password =  $_SESSION['users'][$name]['password'];
    $email =  $_SESSION['users'][$name]['email'];
    $phone =  $_SESSION['users'][$name]['phone'];
    $url =  $_SESSION['users'][$name]['url'];
}
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styleHome.css">

</head>
<body>
<div class="container">
    <div id="logo"><h1 class="logo">Profile</h1>
        <a href="./logout.php" class="CTA">
            LOGOUT
        </a>
    </div>
    <div class="leftbox">
        <nav>

        </nav>
    </div>
    <div class="rightbox">
        <div class="profile">

            <h1>Personal Info</h1>
            <div class="marginTop">
            <h2>Full Name</h2>
            <p><?php echo $name; ?></p>
            </div>

            <div class="marginTop">
            <h2>Email</h2>
            <p><?php echo $email; ?></p>
            </div>

            <div class="marginTop">
            <h2>Phone</h2>
            <p><?php echo $phone; ?></p>
            </div>

            <div class="marginTop">
            <h2>Url</h2>
            <p><?php echo $url; ?></p>
            </div>

            <div class="marginTop">
                <h2>Password</h2>
                <p><?php echo $password; ?></p>
            </div>

        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
<script>
    /*active button class onclick*/
    $('nav a').click(function(e) {
        e.preventDefault();
        $('nav a').removeClass('active');
        $(this).addClass('active');
        if(this.id === !'payment'){
            $('.payment').addClass('noshow');
        }
        else if(this.id === 'payment') {
            $('.payment').removeClass('noshow');
            $('.rightbox').children().not('.payment').addClass('noshow');
        }
        else if (this.id === 'profile') {
            $('.profile').removeClass('noshow');
            $('.rightbox').children().not('.profile').addClass('noshow');
        }
        else if(this.id === 'subscription') {
            $('.subscription').removeClass('noshow');
            $('.rightbox').children().not('.subscription').addClass('noshow');
        }
        else if(this.id === 'privacy') {
            $('.privacy').removeClass('noshow');
            $('.rightbox').children().not('.privacy').addClass('noshow');
        }
        else if(this.id === 'settings') {
            $('.settings').removeClass('noshow');
            $('.rightbox').children().not('.settings').addClass('noshow');
        }
    });
</script>
</body>
</html>