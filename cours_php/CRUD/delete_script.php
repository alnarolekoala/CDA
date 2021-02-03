<?php

require "../BDD/connexion_BDD.php";
$disc_id = $_POST['disc_id'];


try {


$requete = $db->prepare("DELETE FROM disc WHERE disc_id=:disc_id");

$requete->bindValue(':disc_id', $disc_id, PDO::PARAM_INT);

$requete->execute();
$requete->closeCursor();
}
catch (Exception $e) 
{ 
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('Fin du script');
    
}


header("Location: indexCRUD.php");
exit;

?>