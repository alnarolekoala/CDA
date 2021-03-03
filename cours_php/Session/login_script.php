<?php 

if(isset($_POST['submit'])) 
{
    // connexion a la base de données
    require "../BDD/connexion_bddUser.php";
    // declaration tableau d'erreur
    $formError = [];
    // récuperation des champs
    $identifiant = $_POST['identifiant'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $name = $_POST['name'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['mail'];
    // declaration des regex

    $classicPattern = '/^[\w\_\-]+$/';
    $emailRegex = '/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/';
    $passwordRegex = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/';

                
    if(! empty($identifiant)) {
        if(preg_match($classicPattern, $identifiant)) 
        {
            // vérification si identifiant existe deja dans la BDD            
            $requete =$db->prepare("SELECT * FROM utils WHERE utils_identifiant=:identifiant");
            $requete->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);   
            $requete->execute();
            $nbLigne = $requete->rowCount();
            // si un résultat est déja présent
            if ($nbLigne!=0) 
            {
                $formError['identifiant'] = '* identifiant existant !' ; 
            }
        }
        // si pas conforme a la regex enregistre l'erreur
        else 
        {
            $formError['identifiant'] = '* Caractères non autorisé'; 
        }

    } 
    // si le champ est vide enregistre l'erreur
    else 
    {
        $formError['identifiant'] = '* le champ identifiant est vide';
    }    

    if(! empty($name)) {
        if(!preg_match($classicPattern, $name)) 
        {
            // si pas conforme a la regex enregistre l'erreur
            $formError['name'] = '* Caractères non autorisé';
        }
    // si le champ est vide enregistre l'erreur
    } 
    else 
    {
        $formError['name'] = '* le champ name est vide';
    }  

    if(! empty($prenom)) {
        if(!preg_match($classicPattern, $prenom)) 
        {
            // si pas conforme a la regex enregistre l'erreur
            $formError['prenom'] = '* Caractères non autorisé'; 
        }
    // si le champ est vide enregistre l'erreur
    } 
    else 
    {
        $formError['prenom'] = '* le champ prenom est vide';
    } 

    if(! empty($mail)) {
        if(!preg_match($emailRegex, $mail)) 
        {
            // si pas conforme a la regex enregistre l'erreur
            $formError['mail'] = '* Caractères non autorisé';
        }
    // si le champ est vide enregistre l'erreur
    } 
    else 
    {
        $formError['mail'] = '* le champ mail est vide';
    } 
    if(! empty($password)) {
        if(!preg_match($passwordRegex, $password)) 
        {
            // si pas conforme a la regex enregistre l'erreur
            $formError['password'] = '* Caractères non autorisé'; 
        }
    // si le champ est vide enregistre l'erreur
    } 
    else 
    {
        $formError['password'] = '* le champ password est vide';
    } 

    if(! empty($password_confirm)) {
        if(!preg_match($passwordRegex, $password_confirm)) 
        {
            // si pas conforme a la regex enregistre l'erreur
            $formError['password_confirm'] = '* Caractères non autorisé';
        }
    // si le champ est vide enregistre l'erreur
    } 
    else 
    {
        $formError['password_confirm'] = '* le champ password_confirm est vide';
    } 
    // si le mot de passe et la confirmation ne sont pas identique
    if($password != $password_confirm)   
    {
        $formError['password'] = '* les mots de passe ne sont pas identique';
        $formError['password_confirm'] = '* les mots de passe ne sont pas identique';
    }


    // si il n'y a pas d'erreur de saisie
    if(count($formError)===0)
    {

        //mdp hashé
        $password_hash = password_hash($password, PASSWORD_DEFAULT);


        $requete = $db->prepare("INSERT INTO utils (utils_identifiant, utils_name, utils_prenom, utils_mail, utils_password) 
        VALUES (:identifiant, :name, :prenom, :mail, :password)");
        
        $requete->bindValue(':identifiant', $identifiant, PDO::PARAM_STR);
        $requete->bindValue(':name', $name, PDO::PARAM_STR);
        $requete->bindValue(':prenom', $prenom, PDO::PARAM_STR);
        $requete->bindValue(':mail', $mail, PDO::PARAM_STR);  
        $requete->bindValue(':password', $password_hash, PDO::PARAM_STR);  
        $requete->execute();
        
    }

}



?>

