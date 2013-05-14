
function resizeContainer(){
	
	docHeight    = $(window).height()
	headerHeight = $("header").height();
	navHeight    = $("nav").height();
	footerHeight = $("footer").height();
	
	
	
		
	containerHeight = (docHeight - (headerHeight + navHeight + footerHeight));
	
	if(containerHeight >= $("#content").height()){
		$("#container").height(containerHeight);		
	}

	
}	

$(document).ready(function(){
	
	resizeContainer();

});


$(window).resize(function(){
	
	resizeContainer();

});
