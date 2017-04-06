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
      background: 'Vulkan.jpg'
    },
    fjerdingen: {
      dom: null,
      background: 'Fjerdingen.jpg'
    },
    brenneriveien: {
      dom: null,
      background: 'brenneriveien.jpg'
    }
  }
}

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
  // Get map and relevant childred
  map.dom = $('.map');
  map.campus.vulkan.dom = $('#Vulkan');
  map.campus.fjerdingen.dom = $('#Fjerdingen');
  map.campus.brenneriveien.dom = $('#Brenneriveien');

  $.each(map.campus, function() {
    // add hover action
    $(this.dom).data('bg', this.background);
    $(this.dom).mouseenter(function() {
      map.dom.css('background-image', 'url(assets/imgs/' + $(this).data('bg') + ')');
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
