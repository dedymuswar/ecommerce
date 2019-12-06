(function($) {
    "use strict";
/*--
    Menu Sticky
-----------------------------------*/
var $window = $(window);
$window.on('scroll', function() {
	var scroll = $window.scrollTop();
	if (scroll < 300) {
		$(".sticker").removeClass("stick");
	}else{
		$(".sticker").addClass("stick");
	}
});

    
$('a[href*="#"]:not([href="#"])').click(function() {
if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
  var target = $(this.hash);
  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
  if (target.length) {
	$('html, body').animate({
	  scrollTop: target.offset().top - 75
	}, 1000);
	return false;
  }
}
});
    
/*--
	Counter UP
-----------------------------------*/
$('.counter').counterUp({
    delay: 20,
    time: 3000
});

    
// Product List
//    $('#list-view').click(function() {
//        $('#content .product-grid > .clearfix').remove();
//
//        $('#content .row > .product-grid').attr('class', 'product-layout product-list col-xs-12 product-item');
//        $('#grid-view').removeClass('active');
//        $('#list-view').addClass('active');
//
//
//
//        localStorage.setItem('display', 'list');
//
//    });

    // Product Grid
//    $('#grid-view').click(function() {
//        var cols = $('#column-right, #column-left').length;
//
//        if (cols == 2) {
//            $('#content .product-list').attr('class', 'product-layout product-grid grid-style col-lg-6 col-md-6 col-sm-6 col-xs-6 product-item');
//        } else if (cols == 1) {
//            $('#content .product-list').attr('class', 'product-layout product-grid grid-style col-lg-4 col-md-4 col-sm-6 col-xs-6 product-item');
//        } else {
//            $('#content .product-list').attr('class', 'product-layout product-grid grid-style col-lg-3 col-md-3 col-sm-6 col-xs-6 product-item');
//        }
//
//        $('#list-view').removeClass('active');
//        $('#grid-view').addClass('active');
//
//
//
//        localStorage.setItem('display', 'grid');
//
//    });
//
//    if (localStorage.getItem('display') == 'list') {
//        $('#list-view').trigger('click');
//        $('#list-view').addClass('active');
//    } else {
//        $('#grid-view').trigger('click');
//        $('#grid-view').addClass('active');
    }

// grid-style

//$('.grid-style .item').mouseover(function() {
//    $(this).closest('.grid-style').addClass('active');
//});
//$('.grid-style .item').mouseout(function() {
//    $(this).closest('.grid-style').removeClass('active');
//});    

    
    

})(jQuery);



