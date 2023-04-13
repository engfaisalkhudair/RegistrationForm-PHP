<?php
setcookie("statusLogin" , false , time()); // 15 minutes
header('REFRESH: 0 ; URL = ../index.php');
?>