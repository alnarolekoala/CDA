<?php 

require "connexion_bdd.php";


$id_region = $_GET['id_region'];


$requete = $db->query("SELECT * FROM departements where dep_reg_id=".$id_region);
$ligne = $requete->fetchAll(PDO::FETCH_OBJ);
 echo json_encode($ligne);
 
 





    
   

