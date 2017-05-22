function validateEmail(email){
	var emailReg = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	var valid = emailReg.test(email);

	if(!valid) {
        return false;
    } else {
    	return true;
    }
}


// Initialisaiton de jQuery //

$(function() {
  $('#contact').on('submit', function(event) {

    // 'event' correspond à notre évènement 'submit' //
    event.preventDefault();

    // Réinitialisation des erreurs //
    $('#contact .has-error').removeClass('has-error');
    $('#contact .text-danger').remove();
    $('#contact .alert').remove();


    // Déclaration des variables ( Champs à vérifier )//
    nom = $('#nom');
    prenom = $('#prenom');
    email = $('#email');
    tel = $('#tel');

    // Vérification de chaque champ //

    // Vérification du nom //
    if(nom.val().length == 0) {
      nom.parent().addClass('has-error');
      $("<p class='text-danger'>N'oubliez pas de saisir votre Nom !</p>").appendTo(nom.parent());
    }

    // Vérification du Prénom //
    if(prenom.val().length == 0) {
      prenom.parent().addClass('has-error');
      $("<p class='text-danger'>N'oubliez pas de saisir votre Prénom !</p>").appendTo(prenom.parent());
    }

    // Vérification de l'email //
    if(!validateEmail(email.val())) {
      email.parent().addClass('has-error');
      $("<p class='text-danger'>N'oubliez pas de saisir votre email !</p>").appendTo(email.parent());
    }

    // Vérification du telephone //
    if(tel.val().length == 0 || $.isNumeric(tel.val()) == false ) {
      tel.parent().addClass('has-error');
      $("<p class='text-danger'>N'oubliez pas de saisir votre Numéro !</p>").appendTo(tel.parent());
    }

    // // Je procède à la validation si aucune erreur est détectée ; dans le cas contraire, j'affiche une message d'alerte   //
    if($(this).find('.has-error').length == 0) {

      $(this).replaceWith("<div class= 'alert alert-success'> Félicitations, votre demande à bien été envoyée; nous vous répondrons das les meilleurs délais !</div>");
    } else {

      $(this).prepend("<div class= 'alert alert-danger'> Nous navons pas été en mesure de valider votre demande. Veuillez vérifier vos informations.</div>");
    }
  });
});
