// Global Vars

var map = {
  background: {
    vulkan: '',
    fjerdingen: '',
    brenneriveien: ''
  },
  dom: null,
  campus: {
    vulkan: {
      dom: null,
      background: 'vulkan-map.png'
    },
    fjerdingen: {
      dom: null,
      background: 'fjerdingen-map.png'
    },
    brenneriveien: {
      dom: null,
      background: 'brenneriveien-map.png'
    }
  }
}

$(document).ready(function() {
  // Get map and relevant childred
  map.dom = $('.map');
  map.campus.vulkan.dom = $('#Vulkan');
  map.campus.fjerdingen.dom = $('#Fjerdingen');
  map.campus.brenneriveien.dom = $('#Brenneriveien');

  $.each(map.campus, function() {
    // add hover action
    $(this.dom).data('bg', this.background);
    $(this.dom).mouseover(function() { // Hover function chanes map in background
      map.dom.css('background-image', 'url(assets/imgs/' + $(this).data('bg') + ')');
    });

    $(this.dom).click(function() { // Activate map
      // Show filter on nav bar
      nav.showFilter();
      // Chhange map
      map.dom.css('background-image', 'url(assets/imgs/' + $(this).data('bg') + ')');
      // Add 'standby' class to sibling campus buttons
      $(this).siblings().not('.cover').addClass('standby');
      // remove potential 'active' class
      $(this).siblings().not('.cover').removeClass('active');
      // Remove potential 'standby' class
      $(this).removeClass('standby');
      // add 'active' class to active campus
      $(this).addClass('active');
      // Overrode mouseover function
      $(this).siblings().addBack().not('.cover').off('mouseover');
      $(this).siblings().addBack().not('.cover').mouseover(function() {
        // Show campus name
        showName(this.innerText);
      }).mouseleave(function() {
        // Show campus name
        stopName();
      });
    });
  });

  $('.location').click(function(event) {
    if ( $(this).css('overflow') == 'hidden') {
      $(this).css('overflow', 'visible');
    } else {
      $(this).css('overflow', 'hidden');
    }
  }).children().click(function(e) {
    return false;
  });

});

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

var showNameTracker;

function showName(name) {
  $('body').append('<div class="showName">' + name + '</div>');
  $(document).mousemove(function(e) {
    $('.showName').css({
      'left': e.pageX + 'px',
      'top': e.pageY + 30 + 'px'
    });
  });
}

function stopName() {
  $(document).off('mousemove');
  $('.showName').remove();
}
