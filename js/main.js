(function(window, document, $) {

	var XXX = XXX || {};
	
	// example
	XXX.example = {
		config: {
			body: $("body")
			//navToggle: $("#show-hide-navigation")
		},
		init: function() {
			var body = this.config.body;
			this.popparuu();
		},
		popparuu: function() {
			//console.log('tää toimii');
	
		}
	};
	
	// init site
	XXX.init = function() {
		XXX.example.init();
	};
	
	// document ready
	$(document).ready(function() {
		XXX.init();
	});
	
})(window, document, jQuery);