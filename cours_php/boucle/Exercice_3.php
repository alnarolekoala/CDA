<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <table style="border: 1px solid black;">
<?php 

echo "<tr> <td>&nbsp;</td>";

for($i = 0; $i < 13; $i++)
{
    echo "<td>$i</td>";
}
for($i = 0; $i < 13; $i++)
{

    echo "<tr>";
    echo "<td>$i</td>";
    for($n = 0; $n < 13;$n++)

{
    echo "<td>".$i*$n."</td>";
}
    echo "</tr>";
}


?>

</table>



<a href="../index.php">Retour au Menu</a> 



</body>
</html>