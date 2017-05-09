var str_sim = require('string-similarity');

var filter = {
  page: null,
  type: {
    input: null,
    val: '0'
  },
  name: {
    input: null,
    val: ''
  },
  map: function() {

    this.resetLocs();
    loc.hide();

    if(this.type.val == '0' && this.name.val == '') return false;

    $('.location').addClass('dim').each(function() {
      if (filter.matchTag(this, filter.type.val) || filter.type.val == '0') {
        var title = $(this).find('.hover-title').text().toLowerCase();
        if(str_sim.compareTwoStrings(title, filter.name.val) > .4
           || filter.name.val == ''
           || title.indexOf(filter.name.val) > -1) {
          $(this).removeClass('dim').addClass('highlight');
        }
      }
    });
  },
  all: function() {

    if(this.page == 0) {
      this.resetLocs();
    } else {
      this.resetCards();
    }
    loc.hide();

    if(this.type.val == '0' && this.name.val == '') return false;

    $('.infokort').addClass('dim').each(function() {
      if (filter.matchTag(this, filter.type.val) || filter.type.val == '0') {
        var title = $(this).find('.title').text().toLowerCase();
        if(str_sim.compareTwoStrings(title, filter.name.val) > .4
           || filter.name.val == ''
           || title.indexOf(filter.name.val) > -1) {
          $(this).removeClass('dim').addClass('highlight');
        }
      }
    });
  },
  matchTag: function(dom, tag) {
    var r = false;
    $(dom).find('.tags').children().each(function(){
      if($(this).text() == tag) {
        r = true
        return false;
      }
    });
    return r;
  },
  resetLocs: function() {
    $('.location').removeClass('highlight dim');
  },
  resetCards: function() {
    $('.infokort').removeClass('highlight dim');
  }
}


$(document).ready(function() {

  if(typeof filterPage != undefined) {
    filter.page = filterPage;
  }

  // Get dom
  if(filter.page == 0) {
    filter.type.input = $('#filter-type').on('change', function() {
      filter.type.val = this.value;
      filter.map();
    });
  } else if(filter.page == 1) {
    filter.type.input = $('#filter-type-onpage').on('change', function() {
      filter.type.val = this.value;
      filter.all();
    });
  }
  if(filter.page == 0) {
    filter.name.input = $('#filter-name').on('keyup', function() {
      filter.name.val = this.value.toLowerCase();
      filter.map();
    });
  } else if(filter.page == 1) {
    filter.name.input = $('#filter-name-onpage').on('keyup', function() {
      filter.name.val = this.value.toLowerCase();
      filter.all();
    });
  }

});

exports.module = filter;
