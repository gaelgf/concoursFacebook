




resize_nav();




$(window).resize( function(){

	resize_nav();

	var height = $(window).height();
	$(".nav").css("width",height);
});





function resize_nav(){
	$(".list-nav").each( function(){
		height_img = $(this).children('img').height() -1;
		$(this).css("height", height_img);
	});
}