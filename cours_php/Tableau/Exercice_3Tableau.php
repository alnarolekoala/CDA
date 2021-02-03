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


$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
);

echo "<h2>1)</h2><br>";

foreach($departements as $cle => $valeur) 
{ 
   echo $cle." : ";

   for($i = 0; count($valeur) > $i; $i++)
   { 
    echo $valeur[$i]." - "; 
   }
   echo " <br>";
   
}

echo "<h2>2)</h2><br>";


foreach($departements as $cle => $valeur) 
{ 
   echo $cle." nombre de département : ".count($valeur)."<br>";

   
   
}



?>
</body>
</html>

