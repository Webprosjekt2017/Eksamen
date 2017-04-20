// Global Vars

var map = {
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
  },
  cover: null,
  mapText: null,
  classIgnore: '.cover, .location, .title, .desc, .scrollArrow, .mapText'
}

var loc = {
  dom: null,
  pos: null,
  printLoops: 0,
  printLocs: function() {

    this.clearLocs();

    if((this.dom == null || this.pos == null)) {
      if(this.printLoops < 10) {
        this.printLoops++;
        setTimeout(function() {loc.printLocs();}, 100);
      }
      return false;
    }

    $('.map').append(this.dom);

    this.addOnClick();

    // Position locations on the map
    $.each(loc.pos, function(key, val) {
      $('#' + key).css({
        'left': val.x + '%',
        'top': val.y + '%'
      })
    });

    // fade in locations in 1000 - (loc.printLoops * 100)
    setTimeout(function() {
      $('.location').css('opacity', 1);
    }, 1000 - (loc.printLoops * 100));

  }, // ##### END printLocs()
  clearLocs: function() {
    // clear locations if any before loading new ones
    $('.location').remove();
  },
  addOnClick: function() {
    $('.location').click(function() {
      $(this).toggleClass('show');
    }).children().click(function() {
      return false;
    });
  }
}

$(document).ready(function() {
  // Get map and relevant childred
  map.dom = $('.map');
  map.campus.vulkan.dom = $('#Vulkan');
  map.campus.fjerdingen.dom = $('#Fjerdingen');
  map.campus.brenneriveien.dom = $('#Brenneriveien');
  map.cover = $('#mapCover');
  map.mapText = $('.mapText');

  $.each(map.campus, function() {
    // add hover action
    $(this.dom).data('bg', this.background);
    $(this.dom).mouseover(function() { // Hover function chanes map in background
      map.dom.css('background-image', 'url(assets/imgs/' + $(this).data('bg') + ')');
    });

    $(this.dom).keydown(function(e) {
      e.preventDefault();
      // console.log($(this).text().trim() + ' | ' + e.which);
      if (e.which == 32) $(this).click();
    });

    $(this.dom).click(function() { // ##### Activate map

      // Hide mapCover, title and desc
      map.cover.css('opacity', 0);
      map.mapText.css('opacity', 0);

      // ### Reset location obj
      loc.dom = null;
      loc.pos = null;
      loc.printLoops = 0;

      // Start ajax request first, as it takes the longest
      $.ajax({ // ##### LOAD map locations

        url: 'includes/mapContent.local.test.php'

      }).done(function (res){ // ##### DONE function

        loc.dom = res;

      }); // ##### END ajax done function

      // Get positions form json
      $.getJSON( "assets/" + $(this).text().trim().toLowerCase() + ".json", function( data ) {
        loc.pos = data;
      });

      // Start trying to print the locations
      loc.printLocs();

      // Show filter on nav bar
      nav.showFilter();
      // Change map
      map.dom.css('background-image', 'url(assets/imgs/' + $(this).data('bg') + ')');
      // Add 'standby' class to sibling campus buttons
      $(this).siblings().not(map.classIgnore).addClass('standby');
      // remove potential 'active' class
      $(this).siblings().not(map.classIgnore).removeClass('active');
      // Remove potential 'standby' class
      $(this).removeClass('standby');
      // add 'active' class to active campus
      $(this).addClass('active');
      // Overrode mouseover function
      $(this).siblings().addBack().not(map.classIgnore).off('mouseover');
      $(this).siblings().addBack().not(map.classIgnore).mouseover(function() {
        // Show campus name
        showName(this.innerText);
      }).mouseleave(function() {
        // Show campus name
        stopName();
      });
    });
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
