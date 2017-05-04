var str_sim = require('string-similarity');

var filter = {
  type: {
    input: null,
    val: '0'
  },
  name: {
    input: null,
    val: ''
  },
  map: function() {
    if(this.type.val == '0' && this.name.val == '') {
      this.resetLocs();
      return false;
    }

    $('.location').addClass('dim').each(function() {
      if (filter.matchTag(this, filter.type.val) || filter.type.val == "0") {
        var title = $(this).find('.title').text();
        if(str_sim.compareTwoStrings(title, filter.name.val) > .5) {
          $(this).removeClass('dim').addClass('highlight');
        }
      }
    });
  },
  matchTag: function(dom, tag) {
    $(dom).find('.tags').children().each(function(){
      if($(this).text() == tag) return true;
    });
    return false;
  },
  resetLocs: function() {
    $('.location').removeClass('highlight dim');
  }
}


$(document).ready(function() {

  // Get dom
  filter.type.input = $('#filter-type').on('change', function() {
    filter.type.val = this.value;
    filter.map();
  });
  filter.name.input = $('#filter-name').on('keyup', function() {
    filter.name.val = this.value;
    filter.map();
  });

});

module.exports = filter;
