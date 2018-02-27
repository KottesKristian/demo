$(document).ready(function () {
  $('#delete').find('a').on('click', function (e) {
      if(confirm("Ви справді хочете видалити запис ?")) {
          return true;
      } else {
          e.preventDefault();
          return false;
      }
  });
});	
