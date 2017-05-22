
    $('#monFormulaire').on('submit', function(e) {
      e.preventDefault();
      $(this).replaceWith('<p>Bonjour ' + $('#nomComplet').val() + " !</p>");
  });
