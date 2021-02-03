<a href="../index.php">Retour au Menu</a> <br>
<?php
echo "<strong>Exercice 1</strong> : Trouvez le numéro de semaine de la date suivante : 14/07/2019.<br><br>";
$oDate = new DateTime();
$oDate->setDate(2019, 7, 14);
echo "Numéro de la semaine du 14/07/2019 : ";
echo $oDate->format('W');


echo "<br><br><strong>Exercice 2</strong> : Combien reste-t-il de jours avant la fin de votre formation.<br><br>";

$start = new DateTime();
$target = new DateTime('2021-09-28');
$interval = $start->diff($target);
echo $interval->format('Il reste : %a jours avant la fin de la formation');

echo "<br><br><strong>Exercice 3</strong> : Comment déterminer si une année est bissextile ?<br><br>";


function est_bissextile($annee)
{
    return date("m-d", strtotime("$annee-02-29")) == "02-29";
}
echo " <form name='test' method='POST' action='Exercice_1Date.php'>
Entrez l'année : <input type='text' name='annee'/> <br/>

<input type='submit' name='check' value='Check'/>
</form>";

if(isset($_POST['check'])){
    $annee=$_POST['annee'];
   
  $oui =  est_bissextile($annee);


if($oui == 1)
{
    echo "l'année est bissextile";
}
else{
    echo "l'année n'est pas bissextile";
}
}





echo "<br><br><strong>Exercice 4</strong> : Montrez que la date du 32/17/2019 est erronée.<br><br>";

$oDate2 =  DateTime::createFromFormat("d/m/Y", "17/25/1966");

$errors = DateTime::getLastErrors();

if ($errors["error_count"]>0 || $errors["warning_count"]>0) {
    echo "La date 17/25/1966 est incorrecte.";
}
else {
    echo "La date 17/25/1966 est correcte.";
}


echo "<br><br><strong>Exercice 5</strong> : Affichez l'heure courante sous cette forme : 11h25.<br><br>";

$oDate3 = new DateTime();
echo "l'heure actuelle est : ";
echo $oDate3->format("H");
echo "h";
echo $oDate3->format("i");


echo "<br><br><strong>Exercice 6</strong> : Ajoutez 1 mois à la date courante.<br><br>";

echo date('d-m-Y', strtotime('+1 Month'));



echo "<br><br><strong>Exercice 7 </strong> : Que s'est-il passé le 1000200000<br><br>";
$date = new DateTime(); 
$date->setTimestamp(1000200000);  
$variable = $date->format('d-m-Y H:i:s'); 
echo $variable."  BOOOM";