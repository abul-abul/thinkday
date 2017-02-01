$(document).ready(function(){

	window.width = $(window).width();
	var offsetUs = $(".us_place").offset().top;

	$(window).scroll(function(){

		var scrollTop = $(window).scrollTop();

		if(scrollTop >= 128){
			$(".center_right").css({
				"position":"fixed",
				"top":"0px",
			});

			$(".header_right").css({
				"position":"fixed",
				"top":"0px",
				"left":"-30px",
			});
		}else{
			$(".center_right").css({
				"position":"relative",
			});

			$(".header_right").css({
				"position":"absolute",
				"bottom":"0px",
				"left":"-10px",
			});
		};

		if(scrollTop >= 200){
			$(".back_to_top").css({
				"display":"block",
			});
		}else{
			$(".back_to_top").css({
				"display":"none",
			});
		};
	});

	$("#contact").click(function(){
		$('body').animate({
		    scrollTop: offsetUs - 100
		}, 1000);
	});

	$(".back_to_top").click(function(){
		$("body").animate({
			scrollTop:0,
		}, 1000);
	});

	$(".fa-search").before().click(function(){
		$(this).css({
			"display":"none",
		});
		$(".fa-times").css({
			"display":"block",
		});
		$(".search").css({
			"display":"block",
		});
	});

	$(".fa-times").before().click(function(){
		$(this).css({
			"display":"none",
		});
		$(".fa-search").css({
			"display":"block",
		});
		$(".search").css({
			"display":"none",
		});
	});


// user page

	var settings = 0;

	$("body").click(function(){
		$(".user_img_abs2").css({
			"display":"none",
		});
	})

	$(".set_child_abs").click(function(){
		if(settings == 0){
			$(".user_set_abs").css({
				"right":"0px",
			});
			settings++;
		}else if(settings == 1){
			$(".user_set_abs").css({
				"right":"-200px",
			});
			settings = 0;
		}
	});

	$(".user_img_place_child").click(function(e){
		e.stopPropagation();
		$(".user_img_abs2").css({
			"display":"block",
		});
	});

	$(".choose_yes").click(function(e){
		e.stopPropagation(function(){
			return false;
		});
		$(".user_img_abs2").css({
			"display":"none",
		});
	});

	$(".choose_no").click(function(e){
		e.stopPropagation(function(){
			return false;
		});
		$(".user_img_abs2").css({
			"display":"none",
		});
	});

// user page

});