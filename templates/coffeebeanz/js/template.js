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
		$(".item-120").hover(function(){
			//$("._login").show();
			$("._login").css({"height": "20vmax", opacity: 1});
		}, function() {});
		
		$("._login").hover(function() {}, function(){
			if(!$("._login input").is(":focus")) {
				$("._login").css({"height": "0", opacity: 0});
			//$("._login").animate({height: 0}, 800, function(){ $(this).hide()});
			}
		});
		
		
		
		
		$(".pllx-layer1").parallax(.8, true, .01);
		$(".pllx-layer2").parallax(.4, true, .05);
		//$(".pllx-l3").parallax(0, false, .01);
		$(".pllx-layer4").parallax(.5, true, .02);
		$(".pllx-layer5").parallax(.8, false, .08);
		
		if(!$(".pllx-layer1 img").length) {
			console.log("no image");
			$(".custom_parallax, .moduletable_parallax").css("height", "10vh");
			$("div#aside, #system-message-container").css("margin-top", "13vh");
		}

	})// end document ready
})(jQuery);





