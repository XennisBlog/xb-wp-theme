jQuery(document).ready(function(){

	/**
	 * Checks if the current is the homepage. WordPress adds the page slug to
	 * the body element as class.
	 * 
	 * @returns {Boolean} True, if the current page is the homepage
	 */
	var isHomepage = function() {
		return jQuery('body.home').length > 0;
	};

	var resizeBackground = function() {
		// For homepage only
		fullscreenBackground('body.home .site-branding', {
			width: 2048,
			height: 1018
		});
	};
		
	jQuery(window).on('resize', function(){
		resizeBackground();
	});
	
	resizeBackground();
	//$(window).on('hashchange', function() {
	//	console.log(window.location.hash)
	//});
	
	animatedNavbar('.site-header nav li a', {
		duration: 200,
		height: 60
	});
	
	// Use scrollTo only on the homepage
	if (isHomepage()) {
		jQuery('a[href^="#"]').LightweightScrollTo({
			offset: 70
		});		
	} else {
		// Rewrite anchors in the navbar, so they are links to the homepage
		jQuery('a[href^="#"]').attr('href', function(index, value) {
			return '/' + value;
		});
	}
});
