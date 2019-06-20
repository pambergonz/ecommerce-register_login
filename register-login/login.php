<?php
$title = "registrate";
require_once("registerController.php");
require_once("partials/head.php");

if ($_POST) {

  $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
  $email = trim($_POST['email']);
  $errorsInLogin = loginValidate();

  if (!$errorsInLogin) {
     userLogin($email);
     echo "<pre>";
     var_dump($_SESSION);
     echo "</pre>";
     echo "<pre>";
     var_dump($_COOKIE);
     echo "</pre>";

     header("location:perfil.php");
  }
}

?>

  <form method="post" enctype="multipart/form-data">
    <label> Email:
      <input type="text" name="email" value="<?=isset($email) ? $email:"";?>">
    </label>
    <?php if (isset($errorsInLogin['inEmail'])) : ?>
      <?=$errorsInLogin['inEmail']?>
    <?php endif; ?>
    <br>
    <label>Clave:
      <input type="password" name="password">
    </label>
    <?php if (isset($errorsInLogin['inPassword'])) : ?>
      <?=$errorsInLogin['inPassword']?>
    <?php endif; ?>
    <br>
    <label>Recordarme
      <input type="checkbox" name="recordarme" value="si">
    </label>
    <br>
    <input type="submit" value="Submit">
  </form>
  <?php require_once 'partials/footer.php'; ?>
