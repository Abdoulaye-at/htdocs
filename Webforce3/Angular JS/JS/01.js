$(function() {
  $('input').on('keyup', function() {
    $('h3').text('Bonjour ' + $(this).val() + ' !');
  });
});
