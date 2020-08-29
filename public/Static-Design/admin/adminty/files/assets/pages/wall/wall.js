  'use strict';
  //gallery
  $(document).ready(function() {

      // $('#lightgallery').lightGallery();
      // $('#lightgallery1').lightGallery();
      // $('#lightgallery2').lightGallery();
      // $('#lightgallery3').lightGallery();
      // $('#lightgallery4').lightGallery();
      // $('#lightgallery5').lightGallery();
      // $('#lightgallery6').lightGallery();
      // $('#lightgallery7').lightGallery();
      // $('#lightgallery8').lightGallery();
      // $('#lightgallery9').lightGallery();
      // $('#lightgallery10').lightGallery();
      // $('#lightgallery11').lightGallery();




      $('#Post-new').hide();
      $('#Post-message').keyup(function() {
          if (($(this).val() != "")) {
              $('#Post-new').show();
          } else
              $('#Post-new').hide();
      });

  });
