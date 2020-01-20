/*show and hide menu*/

$(document).ready(function () {
	'use strict';
	$(window).scroll(function () {
		'use strict';
		if($(window).scrollTop() < 80) {
			$('.navbar').css({
				'margiin-top':'-100px',
				'opacity': '1'
			});
			$('.navbar-dark').css({
				'background-color': 'rgba(20,20,20,0)'
			});
		}else{
			$('.navbar').css({
				'margiin-top':'0px',
				'opacity': '1'
			});
			$('.navbar-dark').css({
				'background-color': 'rgba(20,20,20,0.9)',
				'border-color': '#444'
			});
		}
	});
});




//add smooth scrolling
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});

