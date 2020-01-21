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
			})
		}else{
			$('.navbar').css({
				'margiin-top':'0px',
				'opacity': '1'
			});
			$('.navbar-dark').css({
				'background-color': 'rgba(20,20,20,0.9)',
				'border-color': '#444'
			})
		}
	});
});