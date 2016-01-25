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
		
		$(".pllx-l1").parallax(.8, true, .01);
		$(".pllx-l2").parallax(.4, true, .05);
		//$(".pllx-l3").parallax(0, false, .01);
		$(".pllx-l4").parallax(.1, true, .08);
		$(".pllx-l5").parallax(.8, false, .08);
		
		$(".pllx-l1").append("<img src='./templates/protostar/images/layer1.png' />");
		$(".pllx-l2").append("<img src='./templates/protostar/images/layer2.png' />");
		$(".pllx-l3").append("<img src='./templates/protostar/images/coffee.png' />");
		$(".pllx-l4").append("<img src='./templates/protostar/images/layer4.png' />");
		$(".pllx-l5").append("<img src='./templates/protostar/images/saying.png' />");
		
		$(window).scroll(function() {
			if($(window).scrollTop()  > $(window).height()/2) {
				
			}
		});
		
		
		
	})// end document ready
})(jQuery);





