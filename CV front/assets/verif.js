document.getElementById('formulaire_du_mail').onsubmit = function() 
{
   var subjectmail = document.getElementById('subjectmail').value;// récupération du sujet 
   var mail = document.getElementById('mail').value;// récupération de l'adresse mail 
   var msg = document.getElementById('msg').value;// récupération du contenudu message 
   var erreur = document.getElementById('erreur') 
   var erreur2 = document.getElementById('erreur2') // récuperation des div pour message erreur 
   var erreur3 = document.getElementById('erreur3')
    tabError = new Array ();
    var i = 0;
   const regex1 = new RegExp (/[A-ÿ ]$/gm); // regex générale toutes lettre majuscule, minuscule, lettre avec accent et quelques symbole
   const regexmail = new RegExp (/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/gm);// regex pour le mail 
    if (subjectmail.length < 1 )
    {
       tabError[0] = 'Erreur';//tableau des erreurs
       
    }
    
    if (mail.length < 1 )
    {
       tabError[1] = 'Erreur';
       
    }


    if (msg.length < 1 )
    {
        tabError[2] = 'Erreur';
       
    }
  
    if (!(subjectmail.match(regex1)))
    {
       tabError[3] = 'Erreur';
       
    }
    
    if (!(mail.match(regexmail)))
    {
       tabError[4] = 'Erreur';
       
    }


    if (!(msg.match(regex1)))
    {
        tabError[5] = 'Erreur';
       
    }


     if(tabError.length !== 0) {

         if (tabError[0] !== 0) {
            erreur.innerText = '* Veuillez remplir le champ' 
         }
         if (tabError[1] !== 0) {
            erreur2.innerText = '* Veuillez remplir le champ' 
         }
         if (tabError[2] !==  0) {
            erreur3.innerText = '* Veuillez remplir le champ' 
         }
         if (tabError[3] !== 0) {
            erreur.innerText = '* Veuillez saisir un sujet valide' 
         }
         if (tabError[4] !== 0) {
            erreur2.innerText = '* Veuillez saisir une adresse mail valide' 
         }
         if (tabError[5] !==  0) {
            erreur3.innerText = '* Veuillez saisir un message valide' 
         }
         while (tabError.length > i) {
            tabError.pop();
        }

        
        return false;
       
     }
    
   else {
       alert("mail envoyé");
       return true;
   }
    
}



