function showTimes(e) {
  if ( $(e).data('open') ) {
    $(e).parent().css('height', $(e).data('height'));
    $(e).data('open', false);
  } else {
    $(e).data('height', $(e).css('height'));
    $(e).parent().css('height', $(e).parent()[0].scrollHeight + 'px');
    $(e).data('open', true);
  }
}

$(document).ready(function() {
  $('.location').on('click', function(event) {
    if ( $(this).css('overflow') == 'hidden') {
      $(this).css('overflow', 'visible');
    } else {
      $(this).css('overflow', 'hidden');
    }
  }).children().click(function(e) {
    return false;
  });;
});
