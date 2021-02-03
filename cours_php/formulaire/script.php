<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../index.php">Retour au Menu</a> <br>


<?php
$nom = $_REQUEST['nom'];
$prenom = $_REQUEST['prenom'];
$city = $_REQUEST['city'];
$cp = $_REQUEST['cp'];


echo "Le nom est : ". $nom;
echo "<br>Le prénom est : ". $prenom;
echo "<br>La ville est : ". $city;
echo "<br>Le CP est : ". $cp;

?>
</body>
</html>