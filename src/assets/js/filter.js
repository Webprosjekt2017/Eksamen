var filter = {
  type: {
    input: null,
    val: ''
  },
  name: {
    input: null,
    val: ''
  },
  now: function() {
    $('.location').each(function() {
      $(this).find('.title').text();
    });
  },
  match: function(val, target) { // text match. where 'target' is in this case a search string
    // making sure the the the target value is shorter then the searchable string

    val = val.toLowerCase();
    target = target.toLowerCase();

    if(val.length >= target.length) {
      if(val.indexOf(target) > -1) { // checking if the entire target string is in the searchable string
        // Redusing match value based on how mush is left of the searchable
        // string outside of the target string
        var r = 1; // base return val
        var rem = val.length - target.length; // remainder length
        var pRem = rem / val.length; // remainder length in percent
        r -= .5 * pRem;
        return r;
      } else { // the entire target is not containded in the searchable string
        // try to determin how accurate the match is
        var targetArr = target.split(''); // create array of the target string
        var indexer = [];
        var rest = 0;
        var valLength = val.length;

        while(val.length > 0) {
          $.each(targetArr, function(i,v) {
            if(val.length == 0) {
              rest++;
              return false;
            }

            indexer.push(val.indexOf(v));
            if(indexer[indexer.length - 1] > -1) {
              val = val.replace(v, '');
            } else {
              val = val.substring(1);
            }
          });
        } // END while

        var r = .5;
        for (var i = 0; i < indexer.length; i++) {
          if(indexer[i] == -1) {
            r -= .2 / indexer.length;
          } else if (i > 0 && indexer[i-1] == indexer[i]) {
            r += .5 / indexer.length;
          } else if(i > 0 && indexer[i-1] != indexer[i]) {
            r += .2 / indexer.length;
          } else if(i < 1 && indexer[i] > -1) {
            r += .2 / indexer.length;
          }
        }

        return r;
      }
    } // if target is longer then value

    return /*0 - 1*/ 1;
  }
}


$(document).ready(function() {

  // Get dom
  filter.type.input = $('#filter-type').on('change', function() {
    filter.type.val = this.value;
    filter.now();
  });
  filter.name.input = $('#filter-name').on('keyup', function() {
    filter.name.val = this.value;
    filter.now();
  });

});
