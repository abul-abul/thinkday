<html>
<head>
	<title></title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	{!! HTML::style( asset('assets/admin/plugins/css/bootstrap.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/font-awesome.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace-fonts.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace.css')) !!}
	{!! HTML::style( asset('assets/admin/plugins/css/ace-rtl.css')) !!}


	{!! HTML::style( asset('assets/user/css/full-slider.css')) !!}
	{!! HTML::style( asset('assets/user/css/font-face.css')) !!}
	{!! HTML::style( asset('assets/user/css/style.css')) !!}


</head>
<body>

<header>
	<div class="header_center">
		<div class="center_left">
			<div class="header_left">
				<div class="logo_place">
					<a href="index.html">
						<img src="images/logo.png" class="logo" />
					</a>
				</div>
				<div class="center_hide">
					<div class="day_place2">
						<span class="year color">2016</span>
						<span class="day color">Դեկտեդմբեր 29</span>
					</div>
					<div class="currency_place2">
						<div class="currency_place_child">
							<span class="currency_name color">USD</span>
							<span class="currency_number color">482.68</span>
						</div>
						<div class="currency_place_child">
							<span class="currency_name color">EUR</span>
							<span class="currency_number color">504.35</span>
						</div>
						<div class="currency_place_child">
							<span class="currency_name color">RUB</span>
							<span class="currency_number color">7.82</span>
						</div>
					</div>
					<div class="weather_place2">
						<span class="weather color">Yerevan -10°</span>
					</div>
				</div>
			</div>
		</div>
		<div class="center_right_top">
			<div class="weather_place">
				<span class="weather">Yerevan -10°</span>
			</div>
			<div class="currency_place">
				<div class="currency_place_child">
					<span class="currency_name">USD</span>
					<span class="currency_number">482.68</span>
				</div>
				<div class="currency_place_child">
					<span class="currency_name">EUR</span>
					<span class="currency_number">504.35</span>
				</div>
				<div class="currency_place_child">
					<span class="currency_name">RUB</span>
					<span class="currency_number">7.82</span>
				</div>
			</div>
			<div class="day_place">
				<span class="year">2016</span>
				<span class="day">Դեկտեդմբեր 29</span>
			</div>
		</div>
		<div class="center_right">
			<div class="header_right"></div>
			<ul class="header_menu">
				<li class="menu_children">
					<a href="#" class="menu_link">
						<span class="link_border">
							home
							<span class="menu_abs"></span>
						</span>
					</a>
				</li>
				<li class="menu_children">
					<a href="#" class="menu_link">
						<span class="link_border">
							Vehicle Gallery
							<i class="fa fa-sort-desc" aria-hidden="true"></i>
							<span class="menu_abs"></span>
						</span>
					</a>
					<ul class="sub_menu_abs">
						<li class="sub_menu_li">
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
							<a href="#">
								Masonary Gird
							</a>
						</li>
						<li class="sub_menu_li">
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
							<a href="#">
								Gird With Padding
							</a>
						</li>
						<li class="sub_menu_li">
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
							<a href="#">
								Gird With No Padding
							</a>
						</li>
						<li class="sub_menu_li">
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
							<a href="#">
								Cobbies Gird
							</a>
						</li>
					</ul>
				</li>
				<li class="menu_children">
					<a href="{{action('UsersController@getNews')}}" class="menu_link">
						<span class="link_border">
							News
							<span class="menu_abs"></span>
						</span>
					</a>
				</li>
				<li class="menu_children">
					<a href="#" class="menu_link">
						<span class="link_border">
							Pages
							<span class="menu_abs"></span>
						</span>
					</a>
				</li>
				<li class="menu_children">
					<a href="#" class="menu_link">
						<span class="link_border">
							Blog
							<span class="menu_abs"></span>
						</span>
					</a>
				</li>
				<li class="menu_children">
					<a href="#us" class="menu_link">
						<span class="link_border">
							Contacts
							<span class="menu_abs"></span>
						</span>
					</a>
				</li>
				<li class="menu_children">
					<i class="fa fa-search" aria-hidden="true"></i>
					<i class="fa fa-times" aria-hidden="true"></i>
					<input type="text" class="search" placeholder="search" />
				</li>
			</ul>
		</div>
	</div>
</header>


	<div>
		@yield('user-content')
	</div>


<footer>
	<div class="footer_center">
		<div class="footer_logo_place">
			<a href="index.html">
				<img src="images/logoold.png" class="logo" />
			</a>
		</div>
		<div class="footer_text_place">
			<p class="footer_text">
				&copy; 2017 All Rights Reserved.
			</p>
		</div>
		<div class="footer_social_place">
			<a href="#" class="social_link">
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</a>
			<a href="#" class="social_link">
				<i class="fa fa-google-plus" aria-hidden="true"></i>
			</a>
			<a href="#" class="social_link">
				<i class="fa fa-twitter" aria-hidden="true"></i>
			</a>
		</div>
	</div>
</footer>
<div class="back_to_top">
	<i class="fa fa-angle-up" aria-hidden="true"></i>
</div>


	{!! HTML::script( asset('assets/user/js/jquery.js') ) !!}
	{!! HTML::script( asset('assets/user/js/bootstrap.min.js') ) !!}
	{!! HTML::script( asset('assets/user/js/init.js') ) !!}
	{!! HTML::script( asset('assets/user/js/user_main.js') ) !!}



	@yield('script')
</body>
</html>