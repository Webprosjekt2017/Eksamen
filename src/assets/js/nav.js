var nav = {
  links: null,
  linkWrapper: null,
  drawerKnow: null,
  filterWrapper: null,
  selector: null,
  selectorWidth: null,
  showFilter: function() {
    nav.linkWrapper.addClass('closed');
    nav.drawerKnow.addClass('show');
    setTimeout(function() {
      nav.filterWrapper.addClass('show');
    }, 800)
  },
  hideFilter: function() {
    nav.linkWrapper.removeClass('closed');
    nav.drawerKnow.removeClass('show');
    nav.filterWrapper.removeClass('show');
  },
  hoverController: function hoverController(l){
    nav.selector.css({
        'left': (l.offsetLeft - nav.sel[0].offsetLeft) + 'px',
        'width': $(l).width() * nav.selectorWidth + 'px'
    });
  },
  setSel: function(l) {
    l.append(nav.selector);
    nav.sel.find('.selector').remove();
    nav.sel = l;
  }
};

$(document).ready(function() {

  // Add eventlistner 'mouseEnter' to navLinks
  nav.links = $('.navLink');
  nav.links.mouseenter(function() {
    nav.hoverController(this);
  });

  // find navLinkWrapper and add event 'mouseleave'
  nav.linkWrapper = $('.navLinkWrapper');
  nav.linkWrapper.mouseleave(function() {
    nav.hoverController(nav.sel[0]);
  });

  // Get nav drawer knob
  nav.drawerKnow = $('#navDrawerKnob');
  nav.drawerKnow.click(function(){
    $(this).parent().toggleClass('closed');
  });

  // Get filterWrapper
  nav.filterWrapper = $('.filterWrapper');

  // replace nav.sel(index) with corresponding element
  nav.sel = $(nav.links[nav.sel]);

  // Add div.selector to active tab
  var selector = document.createElement( "div" );
  selector.className = 'selector';
  nav.sel.append( selector );
  nav.selector = $(selector);
  nav.selectorWidth = Math.round( 100 * (nav.selector.width() / nav.sel.width()) ) / 100;

}); // END document ready function
