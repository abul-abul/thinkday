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

	$('.cabaret_gallery').click(function(){
		$('html, body').animate({
            scrollTop: $(".scroll_slider").offset().top
        }, 1000);
	})

	$(".gallery_tour").mCustomScrollbar({
	    axis:"x",
	    theme: 'inset',
	    scrollButtons:{enable:true},
	});

	function setSliderWrapper()
	{
	    var count = 0;

	    $('.gallery_tour .slide').each(function(){
	        $('.img',this).each(function(){
	            count += $(this).outerWidth()+10;
	        });

	        $(this).css('width',count);
	        count = 0;
	    });
	}		
	setSliderWrapper();

});