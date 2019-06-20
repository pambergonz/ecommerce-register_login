<?php
require_once("partials/head.php");
require_once("registerController.php");

session_destroy();

setcookie("email", null, time() -1);

header("location:home.php");



 ?>
