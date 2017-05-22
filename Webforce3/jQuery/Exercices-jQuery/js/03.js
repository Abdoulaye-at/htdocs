// Initialisation de jQuery (DOM Ready) //

$(function() {

/*---------------------------------------------
  TRAITEMENT DE MON FORMULAIRE
----------------------------------------------*/

  // Détection de la soumission du formulaire //

  //-- Arrêt de la propagation du bouton submit
  $('#contact').on('submit', function(e) {
    e.preventDefault();

    //Récupération des champs à vérifier
        var nom, prenom, email, tel;
        nom = $('#nom');
        prenom = $('#prenom');
        email = $('#email');
        tel = $('#tel');

    // Vérifications des informations
    var infosValides = true;

    //-- Vérif des données --//
      //-- Vérif du nom --//
      if (nom.val().length == 0) {
        infosValides = false;
      };

      //-- Vérif du prenom --//
      if(prenom.val().length == 0) {
        infosValides = false;
      };

      //-- Vérification de la validité d'un email --//
      function validateEmail(email){
      	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
      	var valid = emailReg.test(email);

      	if(!valid) {
              return false;
          } else {
          	return true;
          }
      };

      if(!validateEmail(email.val())) {
          infosValides = false;
      }


      //-- Vérif du telephone --//
      if(prenom.val().length < 10) {
        infosValides = false;
      };

    //-- Tout est correct, préparation du contact
    if(infosValides) {

    } else {
            //-- Infos incorrectes
            alert('Attention, veuillez bien remplir tous les champs');
    }


    // Déclaration de variables //
    var Contacts = {  'Nom' : nom.val(),
                      'Prénom' : prenom.val(),
                      'Email' : email.val(),
                      'Téléphone' : tel.val()
                    };
    var Nom = $('');

    // Déclaration de fonctions //
    /* Fonction ajouter contact : Ajouter contact dans le tableau HTML,
                                  mettre à jour le tableau
                                    réinitialiser le formulaire
                                  afficher une notification  */
    function ajouterContact(Contact) {
      console.log($('#LesContacts').children('thead').find('th').eq(1));
    };

    /* Réinitialiser mon formulaire */
    //   $('#contact').on('submit', function efface_formulaire(e) {
    //     $(':input')
    //     .not(':button, :submit, :reset, :hidden')
    //     .val('')
    //     .prop('checked', false)
    //     .prop('selected', false);
    //   }
    // }
    // });

    /* Affichage de la notification */
    $('#contact').on('submit', function affichNotif() {
      $('.alert-contact').css('display', 'block') ;
    });

    /* Vérification de la présence d'un Contact dans Contacts */
    function verifPresenceContact() {

    };

    /* Vérification de la validité d'un email */
    function validateEmail(email){
    	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    	var valid = emailReg.test(email);

    	if(!valid) {
            return false;
        } else {
        	return true;
        }
    };

  // $champ.keyup(function(){
  //
  //   if($(this).val().length == 0){ // si la chaîne de caractères est inférieure à 5
  //     $(this).css({ // on rend le champ rouge
  //       borderColor : 'red',
  //       color : 'red'
  //       });
  //   }
  //     else{
  //       $(this).css({ // si tout est bon, on le rend vert
  //         borderColor : 'green',
  //         color : 'green'
  //         });
  //       }
  // });

    //   $champ = $('.form-control');
    //   function verifier(champ){
    //
    //    if(champ.val() == ""){ // si le champ est vide
    //
    //        $erreur.css('display', 'block'); // on affiche le message d'erreur
    //
    //        champ.css({ // on rend le champ rouge
    //
    //            borderColor : 'red',
    //
    //            color : 'red'
    //
    //        });
    //    }
    // }


  }); // Fin du submit
});
