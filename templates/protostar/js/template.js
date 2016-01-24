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
		
		//$(window).scroll(function() {
			/*$(".pllx-l1").parallax("50%", .5);
			$(".pllx-l2").parallax("50%", .3);
			$(".pllx-l3").parallax("50%", -.4, true);
			
			$(".pllx-l3").css("background-position-y", "12px");
			
		$(window).scroll(function() {
			var scroll = $(window).scrollTop();
			if(scroll < 1) {
				$(".pllx-l3").css("background-position-y", "12px");
			}
		});*/
		try {
			$(".pllx-l1").scrollingParallax({
			enableHorizontal: true,
			staticSpeed : .2, 
			loopIt : true
		});
		$(".pllx-l2").scrollingParallax({
			enableHorizontal: true,
			staticSpeed : .4, 
			loopIt : true
		});
		
		} catch(e) {
			console.debug(e);
		}
		/*
		$(".pllx-l1").scrollingParallax({
			enableHorizontal: true,
			staticSpeed : .2, 
			loopIt : true
		});
		$(".pllx-l2").scrollingParallax({
			enableHorizontal: true,
			staticSpeed : .4, 
			loopIt : true
		});
		$(".pllx-l3").scrollingParallax({
			enableHorizontal: true,
			staticSpeed : .3, 
			reverseDirection: true,
			loopIt : true
		});
		*/
		
		
		/*
		$(".customhed").parallax("80%", .4, true);
		$(".menu li a").css({ color: "#F3F3F3" });
		
		$(window).scroll(function() { 
			var scroll = $(window).scrollTop();
			if(scroll > 10) {
				$(".header").css({backgroundColor: "rgba(244, 241, 239, .9)"});
				$(".menu li a").css({ color: "#231F20" });
			} else {
				$(".header").css({backgroundColor: "rgba(0,0,0,0)"});
				$(".menu li a").css({ color: "#F3F3F3" });
			}
		});*/
		
	})// end document ready
})(jQuery);





