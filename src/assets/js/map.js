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
  backBtn: null,
  seeAllBtn: null,
  cover: null,
  mapText: null,
  classIgnore: '.cover, .location, .title, .desc, .scrollArrow, .mapText, .backBtn, .seeAllBtn'
};

var loc = {
  dom: null,
  pos: null,
  printLoops: 0,
  printLocs: function() {

    this.clear();

    if((this.dom === null || this.pos === null)) {
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
      });
      if(val.y < 33) {
        $('#' + key + ' .locInfo').addClass('top');
      } else if(val.y > 66) {
        $('#' + key + ' .locInfo').addClass('bottom');
      }
      if(val.x > 80) {
        $('#' + key + ' .locInfo').addClass('left');
      }
    });

    // fade in locations in 1000 - (loc.printLoops * 100)
    setTimeout(function() {
      $('.location').css('opacity', 1);
    }, 1000 - (loc.printLoops * 100));

  }, // ##### END printLocs()
  clear: function() {
    // clear locations if any before loading new ones
    $('.location').remove();
  },
  addOnClick: function() {
    $('.location').click(function() {
      loc.hide(); // close all location before opening this one
      $(this).toggleClass('show');
    }).children().click(function() {
      return false;
    });
  },
  hide: function() {
    $('.location').removeClass('show');
  }
};

$(document).ready(function() {
  // Get map and relevant childred
  map.dom = $('.map');
  map.campus.vulkan.dom = $('#Vulkan');
  map.campus.fjerdingen.dom = $('#Fjerdingen');
  map.campus.brenneriveien.dom = $('#Brenneriveien');
  map.cover = $('#mapCover');
  map.mapText = $('.mapText');
  map.backBtn = $('.backBtn');
  map.seeAllBtn = $('.seeAllBtn');

  // Close location info when ckicking outside them
  map.cover.click(function(e) {
    if (e.target !== this) return;

    loc.hide();
  });

  // Setup back button
  map.backBtn.click(function() {
    map.cover.removeClass('hide');
    map.mapText.removeClass('hide');
    map.backBtn.removeClass('show');
    map.seeAllBtn.removeClass('show');
    $('.campus').removeClass('active standby').off('mouseover').mouseover(function() {
      // Hover function chanes map in background
      map.dom.css('background-image', 'url(assets/imgs/' + $(this).data('bg') + ')');
    });
    loc.clear();
    nav.hideFilter();

    nav.setSel($('.navLink:eq(0)')); // Set selected tab to 'home'
  });

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

    /*
     * #### Click function
     * #### Place campus on map
     * #### Get locations
     * #### Hide cover, title, desc and show back botton
     */
    $(this.dom).click(function() { // ##### Activate map

      // Hide mapCover, title and desc. And set new active tab
      map.cover.addClass('hide');
      map.mapText.addClass('hide');
      map.backBtn.addClass('show');
      map.seeAllBtn.addClass('show');

      nav.setSel($('.navLink:eq(1)')); // Set selected tab to 'map'

      // ### Reset location obj
      loc.dom = null;
      loc.pos = null;
      loc.printLoops = 0;

      // Start ajax request first, as it takes the longest
      $.ajax({ // ##### LOAD map locations
        type: 'POST',
        url: 'includes/mapContent.php',
        data: {campus: $(this).text().trim().toLowerCase()}
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
  if ( $(e).attr('data-open') == 'true' ) {
    $(e).parent().css('height', $(e).attr('height'));
    $(e).attr('data-open', 'false');
  } else {
    $(e).attr('height', $(e).css('height'));
    $(e).parent().css('height', $(e).parent()[0].scrollHeight + 'px');
    $(e).attr('data-open', 'true');
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
