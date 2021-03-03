<?php
include "login_script.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../CRUD/CSS/loginCSS.css">
    <title>Document</title>
</head>
<body>
<?php 
if (isset($_POST['submit']) && count($formError) === 0) 
{
?>
      <div>cool</div>
<?php
}
else 
{


?>
  <div class="container">
    <form action="" method="POST" class="col-4">
      <div class="mb-3">
        <label for="exampleInputEmail1" name="identifiant" class="form-label">Identifiant :</label>
        <input type="text" class="form-control" name="identifiant" id="identifiant" aria-describedby="emailHelp" value="<?= isset($_POST['identifiant']) ? $_POST['identifiant'] : '' ?>">
        <div id="identifiantHelp" class="form-text">     <span class="error"><?= isset($formError['identifiant']) ? $formError['identifiant'] : '' ?></span></div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" name="password" class="form-label">Mot de passe :</label>
        <input type="password" class="form-control" name="password" id="password">
        <div id="passwordHelp" class="form-text">     <span class="error"><?= isset($formError['password']) ? $formError['password'] : '' ?></span></div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" name="password_confirm" class="form-label">Confirmation mot de passe :</label>
        <input type="password" class="form-control" name="password_confirm" id="password_confirm">
        <div id="password_confirmHelp" class="form-text">     <span class="error"><?= isset($formError['password_confirm']) ? $formError['password_confirm'] : '' ?></span></div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" name="name" class="form-label">Nom :</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= isset($_POST['name']) ? $_POST['name'] : '' ?>">
        <div id="nomHelp" class="form-text">     <span class="error"><?= isset($formError['name']) ? $formError['name'] : '' ?></span></div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" name="prenom" class="form-label">Prenom :</label>
        <input type="text" class="form-control" name="prenom" id="prenom" value="<?= isset($_POST['prenom']) ? $_POST['prenom'] : '' ?>">
        <div id="prenomHelp" class="form-text">     <span class="error"><?= isset($formError['prenom']) ? $formError['prenom'] : '' ?></span></div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" name="mail" class="form-label">Adresse e-mail :</label>
        <input type="mail" class="form-control" name="mail" id="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>">
        <div id="mailHelp" class="form-text">     <span class="error"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></span></div>
      </div>
      
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
<?php 
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>