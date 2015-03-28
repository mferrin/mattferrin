$ = jQuery;

$(window).on( "load", function(){
	show_sections();	
});

$(document).on( "ready", function(){
	if (!Modernizr.svg) {
    $('img[src$=".svg"]').each(function(){
        $(this).attr('src', $(this).attr('src').replace('.svg', '.png'));
    });
	}
});


function show_sections(){
	$("section, footer").fadeIn( 500 );
}


function check_nav () {
	var pos = $(window).scrollTop();
			
	if ( pos <= 190 ) {
		$("#site-navigation").css({
			"position":"absolute",
			"top":"190px",
		}); 
	} else {
		$("#site-navigation").css({
			"position":"fixed",
			"top":"0px",
		}); 
	}
}