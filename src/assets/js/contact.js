$(document).ready(function() {
  $('input[type=text]').keyup(function() {
    var tt = $(this).data('tooltip');
    if ($(this).val() !== '') {
      $('#' + tt).addClass('show');
    } else {
      $('#' + tt).removeClass('show');
    }
  });
});
