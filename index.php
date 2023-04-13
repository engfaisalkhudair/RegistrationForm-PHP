<?php
require_once("./php/Controller.php");
if (isset($_POST['submitData'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $error = LoginValidation($name , $password);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--    link css    -->
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
<div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
</div>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

    <h3>Login Here</h3>
    <?php
    if (isset($_POST['submitData']) && isset($error['public'])) {
        echo "<p style='color:red; text-align:center; padding-top:10px;'>".$error['public'] ."</p>";
    }

    ?>
    <label for="Name">Name</label>
    <input type="text" placeholder="Name" name="name" id="Name">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" name="password" id="password">

    <button type="submit" name="submitData">Log In</button>

    <p style="margin-top: 20px;font-size:13px">Do You Not Have An Account?<a href="php/register.php">Create Account</a></p>
    <div class="social">
        <div class="go"><i class="fab fa-google"></i>  Google</div>
        <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
    </div>
</form>
</body>
</html>
