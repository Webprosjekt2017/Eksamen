var nav = {
  tansitionDuration: 500
};


$(document).ready(function() {
  // Add eventlistner 'mouseEnter' to navLinks
  nav.links = $('.navLink');
  nav.links.each(function(l) {
    $(this).mouseenter(function() {
      hoverController($(this)[0]);
    });
  });
  // find navLinkWrapper and add event 'mouseleave'
  nav.linkWrapper = $('.navLinkWrapper');
  nav.linkWrapper.mouseleave(function() {
    hoverController(nav.sel);
  })
  // replace nav.sel(index) with corresponding element
  nav.sel = nav.links[nav.sel];
  // Add div.selector to active tab
  var selector = document.createElement( "div" );
  selector.className = 'selector';
  nav.sel.append( selector );
  nav.selector = selector;
});


function hoverController(l){
  console.log('hover: ' + l.innerText);
  $(nav.selector).css('left', (l.offsetLeft - nav.sel.offsetLeft) )
}
