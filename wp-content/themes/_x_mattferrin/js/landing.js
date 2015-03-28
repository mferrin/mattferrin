$ = jQuery;

$(window).on( "load", function(){
	var container = $("#work-wrapper");
	set_up_nav_filter_links(container);
	set_up_masonry(container);
	get_url_filter(container);
	show_work_items();
	resize_resume();
});


$(document).on( "ready", function() {
	set_up_nav_links();
	set_up_work_tile_rollover();
	resize_resume();	
});


$(window).on( "resize", function() {
	resize_resume();
});


function set_up_nav_links(){
	
	var navHeight = 135;
	var workLink, resumeLink, bioLink;
	
	/* Set Up links */
	$("#menu-mferrin li.menu-item a").each( function(){
		if( $(this).html() == "work" )
			workLink = $(this);
		if( $(this).html() == "resume" )
			resumeLink = $(this);
		if( $(this).html() == "bio" )
			bioLink = $(this);	
		if( $(this).html() == "clients" )
			clientsLink = $(this);						
	});
	
	/* Contact link */
	workLink.on( "click", function(event){
		event.preventDefault();
		var scrollTrg = $("#work").offset().top;
		$(this).parent().addClass("current-menu-item");
		$("body,html").animate({scrollTop: (scrollTrg-navHeight)+"px"}, 500);
	});	
	
	/* Projects link */
	resumeLink.on( "click", function(event){
		event.preventDefault();
		var scrollTrg = $("#resume").offset().top;
		$(this).parent().addClass("current-menu-item");
		$("body,html").animate({scrollTop: (scrollTrg-navHeight)+"px"}, 500);
	});
	
	/* Bio link */
	bioLink.on( "click", function(event){
		event.preventDefault();
		var scrollTrg = $("#bio").offset().top;
		$(this).parent().addClass("current-menu-item");
		$("body,html").animate({scrollTop: (scrollTrg-navHeight)+"px"}, 500);
	});	
	
	/* Clients link */
	clientsLink.on( "click", function(event){
		event.preventDefault();
		var scrollTrg = $("#clients").offset().top;
		$(this).parent().addClass("current-menu-item");
		$("body,html").animate({scrollTop: (scrollTrg-navHeight)+"px"}, 500);
	});	
		
}


function set_up_masonry(container){
	container.isotope({ 
		itemSelector : '.work-item',
    masonry : {
      columnWidth : 210
    }
	});
}


function set_up_nav_filter_links(container){
	
	$("#work-menu-wrapper ul li.menu-item a").on( "click", function(event){
		var filterCat = $(this).html();
		var filterName = filterCat.toLowerCase();
	  select_current_filter_item( filterName );
	  container.isotope({ filter : '.'+filterName });
	  return false;		
	});
	
	$("#work-menu-wrapper ul li.menu-item div").on( "click", function(event){
		var filterCat = $(this).siblings("a").html();
		var filterName = filterCat.toLowerCase();
	  select_current_filter_item( filterName );
	  container.isotope({ filter : '.'+filterName });
	  return false;		
	});
}


function set_up_work_tile_rollover(){
	$(".work-image-wrapper").on( "mouseenter", function(){
		$(this).children(".work-title-wrapper").fadeIn(250);
	}).on( "mouseleave", function(){
		$(this).children(".work-title-wrapper").fadeOut(250);
	}); 	
}


function get_url_filter(container){
	var urlStr = window.location.href;
	var urlArr = urlStr.split("/");
	Object.size = function(obj) {
    var size = 0, key;
    for (key in obj) {
      if (obj.hasOwnProperty(key)) size++;
    }
    return size;
	};
	var size = Object.size(urlArr);
	if(urlArr[3]){
		var filter = urlArr[3];
		var cat = filter.replace("#","");
	  container.isotope({ filter : '.'+cat });
	  select_current_filter_item( cat );
		return false;
	}
}


function show_work_items(){
	$(".work-item").fadeIn(500);
}


function select_current_filter_item( cat ){
	$.each( $(".menu-item a"), function(){
		var filterCat = $(this).html();
		var filterName = filterCat.toLowerCase();
		if( filterName == cat ) {
			//$(this).addClass("nav-selected");
			$(this).siblings("div.work-button").addClass("work-button-full");
		} else {
			//$(this).removeClass("nav-selected");
			$(this).siblings("div.work-button").removeClass("work-button-full");
		}
	});
}


function resize_resume(){

	var resgraphic = $("#res-graphic");
	var restext = $("#res-text");

	if( $(window).width() > 720 ) {
			
		resgraphic.show();
		restext.hide();
		
		var w = resgraphic.outerWidth();
		var h = resgraphic.outerHeight();
		var ratio = w/h;	
		var nw = $(window).width() - 60;
		var nh = nw / ratio;
		
		resgraphic.attr({
			"width" : nw,
			"height" : nh
		});	
	
	} else {
		
		resgraphic.hide();
		restext.show();
	}	
}



// function filter_post_categories( cat ){
	// $.each( $(".work-item"), function(){
		// if( $(this).hasClass( cat ) ) {
			// $(this).animate({"opacity":"1"}, 1000);
			// //$(this).fadeIn(500);
		// } else {
			// $(this).animate({"opacity":".1"}, 1000);
			// //$(this).fadeOut(500);
		// }
	// })
// }


$.Isotope.prototype._getCenteredMasonryColumns = function() {
  this.width = this.element.width();
  var parentWidth = this.element.parent().width();
  var colW = this.options.masonry && this.options.masonry.columnWidth || 
  this.$filteredAtoms.outerWidth(true) || 
  parentWidth; 
  var cols = Math.floor(parentWidth / colW);
  cols = Math.max(cols, 1);
  this.masonry.cols = cols; 
  this.masonry.columnWidth = colW; 
};


$.Isotope.prototype._masonryReset = function() {
  this.masonry = {};
  this._getCenteredMasonryColumns();
  var i = this.masonry.cols;
  this.masonry.colYs = [];
    while (i--) {
    this.masonry.colYs.push(0);
  }
};


$.Isotope.prototype._masonryResizeChanged = function() {
  var prevColCount = this.masonry.cols;
  this._getCenteredMasonryColumns(); 
  return (this.masonry.cols !== prevColCount);
};


$.Isotope.prototype._masonryGetContainerSize = function() {
  var unusedCols = 0,
  i = this.masonry.cols;
    while (--i) { 
    if (this.masonry.colYs[i] !== 0) {
        break;
    }
    unusedCols++;
  }

  return {
    height: Math.max.apply(Math, this.masonry.colYs),
    width: (this.masonry.cols - unusedCols) * this.masonry.columnWidth 
  };
};