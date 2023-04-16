<?php
setcookie("statusLogin" , false , time()); // 15 minutes
header("Location: ../index.php");

?>