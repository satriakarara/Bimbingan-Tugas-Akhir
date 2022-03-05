(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);

var modalBtn = document.querySelector('.modal-btn');
var modalBg = document.querySelector('.modal-bg');
var x = document.querySelector('.x');

modalBtn.addEventListener('click',function(){
	modalBg.classList.add('bg-active');
});

x.addEventListener('click',function(){
	modalBg.classList.remove('bg-active');
});
