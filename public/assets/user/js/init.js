$(document).ready(function(){

	window.width = $(window).width();
	var offsetUs = $(".us_place").offset().top;

	var days = ["1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
	
	var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
	
	var years = ["2017","2016","2015","2014","2013","2012","2011","2010","2009","2008","2007","2006","2005","2004","2003","2002","2001","2000","1999","1998","1997","1996","1995","1994","1993","1992","1991","1990","1989","1988","1987","1986","1985","1984","1983","1982","1981","1980","1979","1978","1977","1976","1975","1974","1973","1972","1971","1970","1969","1968","1967","1966","1965","1964","1963","1962","1961","1960","1959","1958","1957","1956","1955","1954","1953","1952","1951","1950","1949","1948","1947","1946","1945","1944","1943","1942","1941","1940","1939","1938","1937","1936","1935","1934","1933","1932","1931","1930","1929","1928","1927","1926","1925","1924","1923","1922","1921","1920","1919","1918","1917","1916","1915","1914","1913","1912","1911","1910","1909","1908","1907","1906","1905","1904","1903","1902","1901","1900"];
	
	for(i = 0; i < days.length; i++){
		$(".bday").append("<option>" + days[i] + "</option>");
	}
	
	for(i = 0; i < months.length; i++){
		$(".bmonth").append("<option>" + months[i] + "</option>");
	}
	
	for(i = 0; i < years.length; i++){
		$(".byear").append("<option>" + years[i] + "</option>");
	}

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

	$(window).on("load",function(){
		var amount=Math.max.apply(Math,$(".content-1 li").map(function(){return $(this).outerWidth(true);}).get());
		$(".content-1").mCustomScrollbar({
			axis:"x",
			theme:"inset",
			advanced:{
				autoExpandHorizontalScroll:true
			},
			scrollButtons:{
				enable:true,
				scrollType:"stepped"
			},
			keyboard:{scrollType:"stepped"},
			snapAmount:amount,
			mouseWheel:{scrollAmount:amount}
		});
	});

	$('.cabaret_gallery').click(function(){
		$('html, body').animate({
            scrollTop: $(".scroll_slider").offset().top
        }, 1000);
	});

	//light gallery and scroll slider

	$('.gall').lightGallery();

	$(window).on("load",function(){
		var amount=Math.max.apply(Math,$("#content-1 li").map(function(){return $(this).outerWidth(true);}).get());
		$("#content-1").mCustomScrollbar({
			axis:"x",
			theme:"inset",
			advanced:{
				autoExpandHorizontalScroll:true
			},
			scrollButtons:{
				enable:true,
				scrollType:"stepped"
			},
			keyboard:{scrollType:"stepped"},
			snapAmount:amount,
			mouseWheel:{scrollAmount:amount}
		});
		
		
	});
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

	//end light gallery and scroll slider

});