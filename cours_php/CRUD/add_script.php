
<?php

unset($taberror);



$taberror = array();
$title=$_POST['title'];
$annee=$_POST['annee'];
$genre=$_POST['genre'];
$label=$_POST['label'];
$price=$_POST['price'];
$picture=$_FILES['picture']['name'];
$artist=$_POST['artist'];


$erreur0="";
$erreur1="";
$erreur2="";
$erreur3="";
$erreur4="";
$erreur5="";
$erreur6="";

$aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff", "image/jpg");


$finfo = finfo_open(FILEINFO_MIME_TYPE);
$mimetype = finfo_file($finfo, $_FILES["picture"]["tmp_name"]);
finfo_close($finfo);


if(empty($title))
{
       
        $taberror[0]="errorregex";
        $erreur0 = "<p style='color:red;'><i> <sub> *Le champ est vide </sub></i></p>";
}
elseif(!preg_match('/[A-ÿ\ ]$/', $title))
{
        $taberror[0]="error";
        $erreur0 = "<p style='color:red;'><i> <sub>*Le champ possède des caractères non autorisé</sub></i></p>";
}

if(empty($annee))
{
       
        $taberror[1]="errorregex";
        $erreur1 = "<p style='color:red;'><i> <sub> *Le champ est vide </sub></i></p>";
}
elseif(!preg_match('/[0-9]{4,4}/', $annee))
{
        $taberror[1]="error";
        $erreur1 = "<p style='color:red;'><i> <sub> *Le champ possède des caractères non autorisé (annee format : 2021) </sub></i></p>";
}

if(empty($genre))
{
       
        $taberror[2]="errorregex";
        $erreur2 = "<p style='color:red;'><i> <sub> *Le champ est vide </sub></i></p>";
}
elseif(!preg_match('/[A-ÿ \,\/]+$/', $genre))
{
        $taberror[2]="error";
        $erreur2 = "<p style='color:red;'><i> <sub> *Le champ possède des caractères non autorisé</sub></i></p>";
}
if(empty($label))
{
       
        $taberror[3]="errorregex";
        $erreur3 = "<p style='color:red;'><i> <sub> *Le champ est vide </sub></i></p>";
}
elseif(!preg_match('/[A-ÿ ]$/', $label))
{
        $taberror[3]="error";
        $erreur3 = "<p style='color:red;'><i> <sub> *Le champ possède des caractères non autorisé</sub></i></p>";
}
if(empty($price))
{
       
        $taberror[4]="errorregex";
        $erreur4 = "<p style='color:red;'><i> <sub> *Le champ est vide </sub></i></p>";
}
elseif(!preg_match('/^([1-9][0-9]{,2}(,[0-9]{3})*|[0-9]+)(\.[0-9]{1,2})?$/', $price))
{
        $taberror[4]="error";
        $erreur4 = "<p style='color:red;'><i> <sub> *Prix invalide </sub></i></p>";
}
if (!in_array($mimetype, $aMimeTypes))
{
    $taberror[5]="error";
    $erreur5 = "<p style='color:red;'><i> <sub> *Format d'image incorrecte (format valide : gif, jpeg, png, pjeg, x-png, tiff) </sub></i></p>";
}

if(empty($taberror))
{

        require "../BDD/connexion_BDD.php";

        
try{ 


        
        $requete = $db->prepare("SELECT artist_id FROM artist WHERE artist_name=:artist_name");
        $result = $requete->bindValue(':artist_name', $artist, PDO::PARAM_STR);
        

        $requete = $db->prepare("INSERT INTO disc (disc_title, disc_year, disc_genre, disc_label, disc_price, disc_picture, artist_id) 
        VALUES (:title, :annee, :genre, :label , :price , :picture, :artist_id)");
        
        $requete->bindValue(':title', $title, PDO::PARAM_STR);
        $requete->bindValue(':annee', $annee, PDO::PARAM_STR);
        $requete->bindValue(':genre', $genre, PDO::PARAM_STR);
        $requete->bindValue(':label', $label, PDO::PARAM_STR);
        $requete->bindValue(':price', $price, PDO::PARAM_STR);
        $requete->bindValue(':picture', $picture, PDO::PARAM_STR);
        $requete->bindValue(':artist_id', $result, PDO::PARAM_INT);
              
        $requete->execute();
        
        // Libération de la connexion au serveur de BDD
        $requete->closeCursor();
        }
        
        catch (Exception $e) {
        
                echo "La connexion à la base de données a échoué ! <br>";
                echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
                echo "Erreur : " . $e->getMessage() . "<br>";
                echo "N° : " . $e->getCode();
                die("Fin du script");
        }
         
       
          
    
        $disc_picture = $_FILES['picture']['name'];
      
        move_uploaded_file($_FILES['picture']['tmp_name'], '../image/'.$disc_picture);
       
        header("Location: indexCRUD.php");
exit;





}
else {
        header("Location: add_form.php?title=$title&annee=$annee&genre=$genre&label=$label&price=$price&picture=$picture&erreur0=$erreur0&erreur1=$erreur1&erreur2=$erreur2&erreur3=$erreur3&erreur4=$erreur4&erreur5=$erreur5");
}



?>