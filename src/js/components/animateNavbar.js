/**
 * Script implements the animated hover effect of the navbar.
 * 
 * @param {string} element All link selectors, i.e. 'nav li a'
 * @param {object} options Options
 *		- {number} duration Animation time in milliseconds
 *		- {number} height Height of an element in pixel
 */
var animatedNavbar = function(element, options) {
	var element = jQuery(element);
	var height = '-'+options.height+'px';
	
	element.wrapInner('<span class="out"></span>');
	element.each(function() {
		jQuery('<span class="over">' + jQuery(this).text() + '</span>').appendTo(this);
	});

	element.hover(function() {
		jQuery('.out',  this).stop().animate({'top': height}, options.duration); // move down - hide
		jQuery('.over', this).stop().animate({'top': '0px'},  options.duration); // move down - show
	}, function() {
		jQuery('.out',  this).stop().animate({'top': '0px'},  options.duration); // move up - show
		jQuery('.over', this).stop().animate({'top': height}, options.duration); // move up - hide
	});
};