<?php
require "connexion_bdd.php";





$requete = $db->query("SELECT * FROM regions");
$lignes = $requete->fetchAll(PDO::FETCH_OBJ); 
echo json_encode($lignes);


  
