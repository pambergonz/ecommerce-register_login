<?php
require_once("registerController.php");


if (isset($_SESSION["contador"])) {
  echo $_SESSION["contador"];
}


if ($_POST){
if (isset($_POST["incrementar"])){
    $_SESSION["contador"] ++;
}
if(isset($_POST["reiniciar"])){
 $_SESSION["contador"] = 0;
 }
 var_dump($_POST);
 var_dump($_SESSION);
}

 ?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">

      <input type="submit" name="incrementar"> INCREMENTAR
      <input type="submit" name="reiniciar"> REINICIAR

    </form>

  </body>
</html>
