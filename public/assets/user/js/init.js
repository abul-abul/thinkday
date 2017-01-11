$(document).ready(function(){

	window.width = $(window).width();

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

		if(scrollTop >= 700){
			$(".back_to_top").css({
				"display":"block",
			});
		}else{
			$(".back_to_top").css({
				"display":"none",
			});
		};
	});

	$(".back_to_top").click(function(){
		$("body").animate({
			scrollTop:0,
		}, "slow");
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

});