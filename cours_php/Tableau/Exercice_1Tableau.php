<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../index.php">Retour au Menu</a> <br>
<table>
    <?php
$tableau = array("Janvier" => "31",
"Février" => "28",
"Mars" => "31",
"Avril" => "30",
"Mai" => "31",
"Juin" => "30",
"Juillet" => "31",
"Aout" => "31",
"Septembre" => "30",
"Octobre" => "31",
"Novembre" => "30",
"Decembre" => "31"
); 
echo "<h2>1)</h2><br>";
foreach($tableau as $cle => $valeur) 
{ 
echo "<tr><td>".$cle ."</td> <td>".$valeur."</td></tr>"; 
}
echo "</table>";
echo "<br><br><br>";
echo "<table>";

$tableau2 = array("Janvier" => "31",
"Février" => "28",
"Mars" => "31",
"Avril" => "30",
"Mai" => "31",
"Juin" => "30",
"Juillet" => "31",
"Aout" => "31",
"Septembre" => "30",
"Octobre" => "31",
"Novembre" => "30",
"Decembre" => "31"
); 

asort($tableau2);

echo "<h2>2)</h2><br>";
foreach($tableau2 as $cle => $valeur) 
{ 
echo "<tr><td>".$cle ."</td> <td>".$valeur."</td></tr>"; 
}

    ?>

    </table>
</body>
</html>