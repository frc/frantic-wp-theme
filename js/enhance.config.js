/*
	enhance.config: this example file uses the enhance.js api to:
		 * determine whether a browser is qualified for enhancements
		 * define available CSS and JS assets
		 * test features and device conditions and environment to determine which files to load
		 * load those files via a single concatenated call
*/
(function( win ){

	// re-reference ejs var locally
	var ejs = win.ejs,
		docElem = win.document.documentElement;


	// Add your qualifications for major browser experience divisions here.
	// For example, you might choose to only enhance browsers that support document.querySelectorAll (IE8+, etc).
	// Use case will vary, but basic browsers: last stop here!
	if( !( "querySelectorAll" in win.document ) ){
		return;
	}
	
	// Add "enhanced" class to HTML element
	docElem.className += " enhanced";
	
	// Configure css and js paths, if desirable.
	/*ejs.basepath.js = "js/";
	ejs.basepath.css = "css/";*/
	
	// Define potential JS files for dynamic loading
	ejs.files.js = {
		jquery : "vendor/jquery-1.9.1.min.js",
		plugs : "plugins.min.js", // insert plugins here and minify
		//ajaxinc : "lib/ajaxinclude.js",
		//touch	: "touch.js",
		//widescreen	: "widescreen.js", 
		//slider	: "vendor/flexslider.min.js", 
		general	: "main.js" // insert basic jquery functions here
		//form : "form.min.js"

	};
	
	// Define potential CSS files for dynamic loading
	ejs.files.css = {
		
	};

	
	
	// Start queueing files for load. 
	// Pass js or css paths one at a time to ejs.addFile 
	
	// Add general js enhancements to all qualified browsers
	
	

	ejs.addFile( ejs.files.js.jquery );
	
	ejs.addFile( ejs.files.js.plugs );
	//ejs.addFile( ejs.files.js.ajaxinc );
	ejs.addFile( ejs.files.js.general );
	
	// if touch events are supported, add touch file
	
	/*if( "ontouchend" in win.document ){
		ejs.addFile( ejs.files.js.touch );
	}*/
	
	// if screen is wider then 500px add js
	/*
	if( screen.width > 500 ){
		ejs.addFile( ejs.files.js.widescreen );
	}
	
*/
	
	

	
	// Note: since we're using hasClass to check if the body element has a class or not, we need to wrap all remaining logic in a call to ejs.isDefined
	ejs.bodyReady( function(){

	
	
		/* ADD Contact form if body class is something

		if( ejs.hasClass( win.document.body, "contact" ) ){
			ejs.addFile( ejs.files.js.form );
		}
		
		*/

		
		// Load the files, enhance page
		ejs.enhance();
		
	});

}( window ));