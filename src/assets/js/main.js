/*
 * ### General function used on several pages
 */

function showTimes(e) {
  if ( $(e).attr('data-open') == 'true' ) {
    $(e).parent().css('height', $(e).attr('height'));
    $(e).attr('data-open', 'false');
  } else {
    $(e).attr('height', $(e).css('height'));
    $(e).parent().css('height', $(e).parent()[0].scrollHeight + 'px');
    $(e).attr('data-open', 'true');
  }
}
