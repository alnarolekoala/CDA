<?php

try 
{        
    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=users', 'root', '67f6d8355');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage() . "<br>";
    echo "N° : " . $e->getCode();
    die("Fin du script");
} 


?>
