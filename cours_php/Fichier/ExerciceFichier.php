<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<a href="../index.php">Retour au Menu</a> <br>

<?php 
function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

echo "<h2>1)</h2><br>";
$fp = fopen("essai.txt", "r"); 

// Boucle jusqu'à la fin du fichier
while (!feof($fp)) 
{ 
    // Lecture d'une ligne, le contenu de la ligne est affecté à la variable $ligne  
    $ligne = fgets($fp, 4096); 
    ?>
    <a href="<?php echo $ligne?>"><?php echo $ligne."</a><br>"; 
    
} 
echo "<h2>2)</h2><br>";

    $delimiter = " ";
    $delimiter2= ",";
    $homepage = file_get_contents('http://bienvu.net/misc/customers.csv');
    //  $separer = explode($delimiter,$homepage);
     $separer = multiexplode(array(",","\n"),$homepage);
   
    ?>
    <table class="table table-dark">
        <thead>
            <tr>
                <th scope="col">Surname</th>
                <th scope="col">Firstname</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">City</th>
                <th scope="col">State</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sixTour = 0;
    for($i = 0; count($separer) > $i; $i++)
    {
        if($sixTour == 0){
            echo "<tr>";
        }
        echo "<td>".$separer[$i]."</td>";
        if($sixTour == 5){
            echo "</tr>";
            $sixTour = 0;
            
        }
        else {
            $sixTour++;
        }
    }
?>

        </tbody>
    </table>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>