$('#monFormulaire').on('submit', function(e) {
  e.preventDefault();
  $(this).replaceWith('<p>Bonjour ' + $('#fullName').val()
  + '<br>Email :'        + $('#email').val()
  + '<br> Téléphone : '  + $('#tel').val()
  + '<br> Sujet : '      + $('#sujet').val()
  + " !</p>");
});
