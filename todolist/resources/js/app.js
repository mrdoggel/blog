import './bootstrap';

$(document).ready(function() {
  $('#check:checkbox').bind('change', function(e) {
    if ($(this).is(':checked')) {
      alert('Checked');
    }
    else {
      alert('Unchecked');
    }
  })
});
