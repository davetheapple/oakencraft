/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

(function($)
{
	$(document).ready(function()
	{
		$('*[rel=tooltip]').tooltip()

		// Turn radios into btn-group
		$('.radio.btn-group label').addClass('btn');
		$(".btn-group label:not(.active)").click(function()
		{
			var label = $(this);
			var input = $('#' + label.attr('for'));

			if (!input.prop('checked')) {
				label.closest('.btn-group').find("label").removeClass('active btn-success btn-danger btn-primary');
				if (input.val() == '') {
					label.addClass('active btn-primary');
				} else if (input.val() == 0) {
					label.addClass('active btn-danger');
				} else {
					label.addClass('active btn-success');
				}
				input.prop('checked', true);
			}
		});
		$(".btn-group input[checked=checked]").each(function()
		{
			if ($(this).val() == '') {
				$("label[for=" + $(this).attr('id') + "]").addClass('active btn-primary');
			} else if ($(this).val() == 0) {
				$("label[for=" + $(this).attr('id') + "]").addClass('active btn-danger');
			} else {
				$("label[for=" + $(this).attr('id') + "]").addClass('active btn-success');
			}
		});
		
		// additional custom content below
		$(".cart-icon").hover(function(){
			
			
		}, function() {
			
		});
		
		/*
		$(document).alton({
		    fullSlideContainer: 'body', // Tell Alton the full height container
		    singleSlideClass: 'slide', // Tell Alton the full height slide class
		    useSlideNumbers: true, // Set to false if you don't want to use pagination
		    slideNumbersBorderColor: '#fff', // Set the outside color of the pagination items
		    slideNumbersColor: 'transparent', // Set the inner color of the pagination items
		    bodyContainer: 'slider-container', // Tell Alton the body class
		});
		
		$(".pllx-l1").parallax("50%", -.5);
		$(".pllx-l2").parallax("50%", .2);
		//$(".pllx-l3").parallax("50%", 1);
		$(".pllx-l4").parallax("50%", .3);*/
		
		$(window).scroll(function() {
			$(".pllx-l1").css({"background-position-y": $(window).scrollTop()*.2, translateZ: 0});
			$(".pllx-l2").css({"background-position-y": $(window).scrollTop()*-.4, translateZ: 0});
			$(".pllx-l3").css({"background-position-y": $(window).scrollTop()*-.06, translateZ: 0});
			$(".pllx-l4").css({"background-position-y": $(window).scrollTop()*.2, translateZ: 0});
		});
		
		//$(".pllx-l2").stellar();
		//$(".pllx-l3").stellar();
		//$(".pllx-l4").stellar();
		//$(window).scroll(function(e) {
		//alert();
		//	console.debug($("#slide2").css("background-position-y"));
		//	$("#slide2").css({"background-position-y": parseInt($("#slide2").css("background-position-y"))*$("#slide2").data("stellar-background-ratio")+"px" });
		//});
		
		
	})// end document ready
})(jQuery);





