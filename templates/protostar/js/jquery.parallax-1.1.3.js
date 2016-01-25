/*
Plugin: jQuery Parallax
Version 1
Author: David Barrera

Dual licensed under the MIT and GPL licenses:
http://www.opensource.org/licenses/mit-license.php
http://www.gnu.org/licenses/gpl.html
*/

(function( $ ){
	var $win = $(window);
	var $doc = $(document);
	

	$.fn.parallax = function(speed, mouseMove, mouseSpeed) {
		var $this = $(this);
		var x = 0;
		var y = 0;
		var moveTheMouse = mouseMove || false;
		mouseSpeed = mouseSpeed || .01;
		
		// function to be called whenever the window is scrolled or resized
		function update(event){
			var pos = $win.scrollTop();
			var curX = $this.position().left;
			x = event.originalEvent.pageX;
			y = event.originalEvent.pageY;			

			if($win.scrollTop() > $win.height()/2) {
				$this.css("opacity", 0);
			} else {
				$this.css("opacity", 1);
				
				//$this.css({"transform": 		"translate("+curX+"px, " + pos * speed +"px)"});
				//$this.css({"-webkit-transform": "translate("+curX+"px, " + pos * speed +"px)"});
				
				$this.css({"-webkit-transition": ".4s"});
				$this.css({"transition": ".4s"});
				$this.css({"top": -pos * speed +"px"});
				
			}
			
			if(mouseMove) {
				$this.css({"transform": 		"translate("+x*mouseSpeed+"px, "+y*mouseSpeed+"px)"});
				$this.css({"-webkit-transform": "translate("+x*mouseSpeed+"px, "+y*mouseSpeed+"px)"});
			}

		}

		$win.bind('scroll', update).resize(update);
		$doc.bind('mousemove', update).resize(update);
		//update();
	};
})(jQuery);
