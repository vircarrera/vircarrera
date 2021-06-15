$(document).ready(function(){

    carousel();
	carouselrelated();
    scroll();
	closenavwhenclick();

});

// config aos script
AOS.init({
	startEvent: 'DOMContentLoaded',
	offset: 100,
	delay: 300,
	duration: 1000,
	easing: 'ease',
	once: true,
	disable: 'mobile',
});