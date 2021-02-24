$(document).ready(function() 
{
    const titre = document.getElementById('titre');
    const sortie = document.getElementById('sortie');
    const nomimg = document.getElementById('nomimg');
    const moyen = document.getElementById('moyen');
    

    $("#solution").load("http://api.themoviedb.org/3/search/movie?api_key=f33cd318f5135dba306176c13104506a&query=avenger", function (lignes) 
    {
        let contenus  = JSON.parse(lignes);
            titre.innerHTML = titre.innerHTML + contenus.results[1].title;
            sortie.innerHTML = sortie.innerHTML + contenus.results[1].release_date;
            nomimg.innerHTML = nomimg.innerHTML + contenus.results[1].poster_path;
            moyen.innerHTML = moyen.innerHTML + contenus.results[1].vote_average;
        
    });
});