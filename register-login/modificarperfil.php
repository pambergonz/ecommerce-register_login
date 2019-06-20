<?php
$title = "Actulizar datos";
require_once("registerController.php");
require_once("partials/head.php");

$countries = [
  'ar' => 'Argentina',
  'br' => 'Brasil',
  'bo' => 'Bolivia',
  'co' => 'Colombia',
  'cl' => 'Chile',
  'ec' => 'Ecuador',
  'pe' => 'Perú',
  've' => 'Venezuela',
];

echo "<pre>";
var_dump($_COOKIE);
echo "</pre>";
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

if ($_POST) {
  $fullNameInPost= trim($_POST['name']);
  $emailInPost= trim($_POST['email']);

  $errorsInRegister = registerValidate();
  if (!$errorsInRegister){
     updateUserDetails($_SESSION["email"]);
  }
}

 ?>

   <form method="post" enctype="multipart/form-data">
     <label> Nombre completo:
       <input type="text" name="name" value= "<?=isset($fullNameInPost) ? $fullNameInPost:"";?>" >
     </label>
     <?php if (isset($errorsInRegister['inFullName'])) : ?>
       <?=$errorsInRegister['inFullName']?>
     <?php endif; ?>
     <br>
     <label> Email:
       <input type="text" name="email" value="<?=isset($emailInPost) ? $emailInPost:"";?>">
     </label>
     <?php if (isset($errorsInRegister['inEmail'])) : ?>
       <?=$errorsInRegister['inEmail']?>
     <?php endif; ?>
     <br>
     <select name="nacionalidad">
       <option value="">
         Elegi tu pais de residencia
       </option>
       <?php foreach ($countries as $code => $country): ?>
         <?php if ($_POST["nacionalidad"] == $code ): ?>
           <option value="<?= $code ?>" selected>
             <?= $country ?> <br>
           </option>
         <?php else: ?>
           <option value="<?= $code ?>" >
             <?= $country ?> <br>
           </option>
         <?php endif; ?>
       <?php endforeach; ?>
       </select>
       <?=isset($errorsInRegister['inCountry'])?$errorsInRegister['inCountry']: "" ?>
       <br>
       <label>Clave:
         <input type="password" name="password">
       </label>
       <?php if (isset($errorsInRegister['inPassword'])) : ?>
         <?=$errorsInRegister['inPassword']?>
       <?php endif; ?>
     </select>
     <br>
     <label>Repeti Clave:
       <input type="password" name="repassword">
     </label>
     <?php if (isset($errorsInRegister['inrePassword'])) : ?>
       <?=$errorsInRegister['inrePassword']?>
     <?php endif; ?>
     <br>
     <label>Recordarme
       <input type="checkbox" name="recordarme" value="si">
     </label>
     <br>
     <input type="submit" value="enviar">
   </form>
 <?php require_once 'partials/footer.php'; ?>
