$(document).ready(function() 
{
    menux = document.getElementById('select1');
    menux.innerHTML ="";
    $("#solution2").load("listeoptions4.php", function (lignes) 
    {
        var contenus  = JSON.parse(lignes);
        console.log(contenus.length);
        for($i = 0; $i < contenus.length; $i++) 
        {  
            console.log(contenus[$i].reg_id);
            menux.innerHTML = menux.innerHTML +  ('<option>' + contenus[$i].reg_id + '</option>');   
        }
    });
    $("#select1").change(function() 
    {
        menus = document.getElementById('select2');
        menus.innerHTML ="";
        $("#solution").load("listeoptions3.php?id_region="+$("#select1").val(), function (data) 
        {  
                var contenu  = JSON.parse(data);
                console.log(contenu.length);
                for($i = 0; $i < contenu.length; $i++) 
                {     
                    menus.innerHTML = menus.innerHTML +  ('<option>' + contenu[$i].dep_nom + '</option>');      
                }
        });
    });
});



