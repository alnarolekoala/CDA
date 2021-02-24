<?php 
require "connexion_bdd.php";


$requete = $db->query("SELECT * FROM regions");
while ($ligne = $requete->fetch(PDO::FETCH_OBJ)) {
   echo "<option>".$ligne->reg_id."</option>";
 
  
}