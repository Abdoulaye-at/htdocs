$(function() {
  $('#contact').on('submit', fonction(e) {

    // Arret de la propagation du submit
    e.preventDefault();

    //Récupération des champs à vérifier
    var nom, prenom, email, tel;
    nom = $('#nom');
    prenom = $('#prenom');
    email = $('#email');
    tel = $('#tel');

    // Vérifications des informations
    var infosValides = true;

      // Vérif du nom
      if(nom.val()length == 0) {
        infosValides = false;
      }
  }); //Fin du submit
});


// Initialisation de jQuery (DOM Ready) //

// Déclaration de variables //

// Déclaration de fonctions //
/* Fonction ajouter contact : Ajouter contact dans le tableau HTML,
                              mettre à jour le tableau
                              réinitialiser le formulaire
                              afficher une notification  */

/* Réinitialiser mon formulaire */
/* Affichage de la notification */
/* Vérification de la présence d'un Contact dans Contacts */
/* Vérification de la validité d'un email */
/*---------------------------------------------
            TRAITEMENT DE MON FORMULAIRE
----------------------------------------------*/

// Détection de la soumission du formulaire //

  //-- Arrêt de la propagation du bouton submit
  //-- Récup des champs à vérifier
  
  //-- Vérif des informations
    //-- Vérif des données
    //-- Tout est correct, préparation du contact
    //-- Infos incorrectes
