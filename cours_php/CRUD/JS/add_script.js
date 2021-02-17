// récupération des champs que l'on utilise 
let discTitle = document.getElementById('title');
let genre = document.getElementById('genre');
let annee = document.getElementById('annee');
let label = document.getElementById('label');
let price = document.getElementById('price');

// regex utilisé pour vérifier les champs
const titleRegex = /[A-ÿ ]$/;
const labelRegex = /[A-ÿ ]$/;
const anneeRegex = /[0-9]{4,4}/;
const genreRegex = /[A-ÿ \,\/]+$/;
const priceRegex = /^([1-9][0-9]{,2}(,[0-9]{3})*|[0-9]+)(\.[0-9]{1,2})?$/;
// fonction qui va vérifier les champs
function check (){
    // champ title
    //reset du champ 
    let valeurErreur0 = document.getElementById("MsgErreur0");
    valeurErreur0.innerHTML = "";
    // si le champ est vide
    if(discTitle.value == "")
    {
        alert('yo');
        valeurErreur0 = document.getElementById("MsgErreur0");
        valeurErreur0.innerHTML = "* Remplir le champ 'Title' svp"
        return false;
        
    }
    // si ca ne correspond pas a la regex 
    else if(!(discTitle.value.match(titleRegex))){
        
        valeurErreur0 = document.getElementById("MsgErreur0");//récupération de l'élément html
        valeurErreur0.innerHTML = "* Caractère(s) non autorisé(s) sur le champ 'Title'"// on ajoute du texte
        return false;
    }


    //champ year
    //reset du champ
        let valeurErreur1 = document.getElementById("MsgErreur1");//récupération de l'élément html
        valeurErreur1.innerHTML = "";// on ajoute du texte
    // si le champ est vide
        if(annee.value == "")
        {
        
        valeurErreur1 = document.getElementById("MsgErreur1");//récupération de l'élément html
        valeurErreur1.innerHTML = "* Remplir le champ 'Year' svp"// on ajoute du texte
        return false;
        }
    // si ca ne correspond pas a la regex 
        else if(!(annee.value.match(anneeRegex)))
        {
        valeurErreur1 = document.getElementById("MsgErreur1");//récupération de l'élément html
        valeurErreur1.innerHTML = "* Caractère(s) non autorisé(s) sur le champ 'Year'"// on ajoute du texte
        return false;
        }


        
    //champ genre
    //reset du champ
    let valeurErreur2 = document.getElementById("MsgErreur2");//récupération de l'élément html
    valeurErreur2.innerHTML = "";// on ajoute du texte
    // si le champ est vide
    if(genre.value == "")
    {

    valeurErreur2 = document.getElementById("MsgErreur2");//récupération de l'élément html
    valeurErreur2.innerHTML = "* Remplir le champ 'genre' svp"// on ajoute du texte
    return false;
    }
    // si ca ne correspond pas a la regex 
    else if(!(genre.value.match(genreRegex)))
    {
    valeurErreur2 = document.getElementById("MsgErreur2");//récupération de l'élément html
    valeurErreur2.innerHTML = "* Caractère(s) non autorisé(s) sur le champ 'genre'"// on ajoute du texte
    return false;
    }


    //champ label
    //reset du champ
    let valeurErreur3 = document.getElementById("MsgErreur3");//récupération de l'élément html
    valeurErreur3.innerHTML = "";// on ajoute du texte
    // si le champ est vide
    if(label.value == "")
    {

    valeurErreur3 = document.getElementById("MsgErreur3");//récupération de l'élément html
    valeurErreur3.innerHTML = "* Remplir le champ 'label' svp"// on ajoute du texte
    return false;
    }
    // si ca ne correspond pas a la regex 
    else if(!(label.value.match(labelRegex)))
    {
    valeurErreur3 = document.getElementById("MsgErreur3");//récupération de l'élément html
    valeurErreur3.innerHTML = "* Caractère(s) non autorisé(s) sur le champ 'label'"// on ajoute du texte
    return false;
    }

    //champ price
    //reset du champ
    let valeurErreur4 = document.getElementById("MsgErreur4");//récupération de l'élément html
    valeurErreur4.innerHTML = "";// on ajoute du texte
    // si le champ est vide
    if(price.value == "")
    {

    valeurErreur4 = document.getElementById("MsgErreur4");//récupération de l'élément html
    valeurErreur4.innerHTML = "* Remplir le champ 'price' svp"// on ajoute du texte
    return false;
    }
    // si ca ne correspond pas a la regex 
    else if(!(price.value.match(priceRegex)))
    {
    valeurErreur4 = document.getElementById("MsgErreur4");//récupération de l'élément html
    valeurErreur4.innerHTML = "* Caractère(s) non autorisé(s) sur le champ 'price'"// on ajoute du texte
    return false;
    }

}

document.getElementById("ajoutForm").addEventListener("submit", check);

