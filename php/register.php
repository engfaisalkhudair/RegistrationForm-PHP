
<?php

require_once("./Controller.php");

if (isset($_POST['submitData'])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $url = $_POST["url"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $error = RegisterValidation($name , $email, $password , $url ,$phone);
    if(count($error) == 0 ){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $_SESSION['users'][$name] = array(
            "name" => $name,
            "email" => $email,
            "url" => $url,
            "phone" => $phone,
            "password" => $hashed_password
        );
        $printMessageStatus = "<div style='padding:20px 80px;background-color:green;border-radius:10px;margin:25px'>Sign Is Successfuly</div>";
        header("Location: ../index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <!--        link css    -->
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <h3>Register Here</h3>
        <?php
        if(!empty($printMessageStatus)){
            echo  $printMessageStatus;
        }
        if(isset($_POST['submitData']) && isset($error['public'])){
                echo "<p style='color:red; text-align:center'>".$error['public'] ."</p>";
        }
        ?>

        <label for="username">Username</label>
        <input type="text" placeholder="Name" name="name" id="username">
        <?php
            if(isset($error["name"])){
                echo "<p style='color:red'>".$error['name'] ."</p>";
            }
        ?>
        <label for="Email">Email</label>
        <input type="Email" placeholder="Email" name="email" id="Email">
        <?php
            if (isset($error['email'])) {
               echo "<p style='color:red'>".$error['email'] ."</p>";
            }
        ?>
        <label for="URL">URL</label>
        <input type="Text" placeholder="URL" name="url" id="URL">
        <?php
            if (isset($error['url'])) {
               echo "<p style='color:red'>".$error['url'] ."</p>";
            }
        ?>
        <label for="Phone">Phone Number</label>
        <input type="number" placeholder="Phone Number" name="phone" id="Phone">
        <?php
            if (isset($error['phone'])) {
               echo "<p style='color:red'>".$error['phone'] ."</p>";
            }
        ?>
        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" id="password">
        <?php
            if (isset($error['pass'])) {
               echo "<p style='color:red'>".$error['pass'] ."</p>";
            }
        ?>
        <button type="submit" name="submitData">Sign</button>

        <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div>
    </form>
</body>
</html>
