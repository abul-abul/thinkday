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


	{!! HTML::style( asset('assets/user/css/font-face.css')) !!}
	{!! HTML::style( asset('assets/user/css/style.css')) !!}


</head>
<body>

<header>
	<!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    
	      <!-- Modal content-->
	      <div class="modal-content modal_place">
	        <div class="modal-header modal_head">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <span class="modal-title login_title" data-toggle="collapse" data-parent="#accordion" href="#collapse1">Логин</span>
	          <span class="log_middle">/</span>
	          <span class="modal-title login_title" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Регистрация</span>
	        </div>	          
			  <div class="panel-group" id="accordion">
			    <div class="panel panel-default">
			      <div id="collapse1" class="panel-collapse collapse in">
			        <div class="panel-body">
				        <input type="email" class="email" placeholder="Эл.адрес" />
				        <input type="password" class="pass" placeholder="Пароль" />
				        <a href="#" class="user_soc_links">
							<i class="fa fa-facebook-square" aria-hidden="true"></i>
						</a>
						<a href="#" class="user_soc_links">
							<i class="fa fa-google-plus-square" aria-hidden="true"></i>
						</a>
						<a href="#" class="user_soc_links">
							<i class="fa fa-twitter-square" aria-hidden="true"></i>
						</a>
				        <input type="submit" class="log_btn" value="Логин">
			        </div>
			      </div>
			    </div>
			    <div class="panel panel-default">
			      <div id="collapse2" class="panel-collapse collapse">
			      	<div class="panel-body">
			        	<form action="" method="post">
			        		<input type="text" class="name" placeholder="Имя" />
			        		<input type="text" class="name" placeholder="Фамиля" />
			        		<input type="email" class="email" placeholder="Эл.адрес" />
			        		<input type="password" class="pass" placeholder="Пароль" />
			        		<input type="password" class="pass" placeholder="Пов-пароль" />
			        		<input type="submit" class="reg_btn" value="Регистрация">
			        	</form>
			        </div>
			      </div>
			    </div>
			  </div>   
	      </div>
	    </div>
	  </div>
	<!-- End Modal -->
	<div class="header_center">
		<div class="center_left">
			<div class="header_left">
				<div class="logo_place">
					<a href="{{action('UsersController@getHome')}}">
						<img src="/images/logo.png" class="logo" />
					</a>
				</div>
				<div class="center_hide">
					<div class="login_place2">
						<span class="login_btn" data-toggle="modal" data-target="#myModal">
							Логин / Регистрация
						</span>
					</div>
				</div>
			</div>
		</div>
		<div class="center_right_top">
			<div class="login_place">
				<span class="login_btn" data-toggle="modal" data-target="#myModal">
					Логин / Регистрация
				</span>
			</div>
		</div>
		<div class="center_right">
			<div class="header_right"></div>
			<ul class="header_menu">
				<li class="menu_children">
					<a href="{{action('UsersController@getHome')}}" class="menu_link">
						<span class="link_border">
							Главный
							<span class="menu_abs"></span>
						</span>
					</a>
				</li>
				{{--<li class="menu_children">--}}
					{{--<a href="#" class="menu_link">--}}
						{{--<span class="link_border">--}}
							{{--Vehicle Gallery--}}
							{{--<i class="fa fa-sort-desc" aria-hidden="true"></i>--}}
							{{--<span class="menu_abs"></span>--}}
						{{--</span>--}}
					{{--</a>--}}
					{{--<ul class="sub_menu_abs">--}}
						{{--<li class="sub_menu_li">--}}
							{{--<i class="fa fa-angle-double-right" aria-hidden="true"></i>--}}
							{{--<a href="#">--}}
								{{--Masonary Gird--}}
							{{--</a>--}}
						{{--</li>--}}
						{{--<li class="sub_menu_li">--}}
							{{--<i class="fa fa-angle-double-right" aria-hidden="true"></i>--}}
							{{--<a href="#">--}}
								{{--Gird With Padding--}}
							{{--</a>--}}
						{{--</li>--}}
						{{--<li class="sub_menu_li">--}}
							{{--<i class="fa fa-angle-double-right" aria-hidden="true"></i>--}}
							{{--<a href="#">--}}
								{{--Gird With No Padding--}}
							{{--</a>--}}
						{{--</li>--}}
						{{--<li class="sub_menu_li">--}}
							{{--<i class="fa fa-angle-double-right" aria-hidden="true"></i>--}}
							{{--<a href="#">--}}
								{{--Cobbies Gird--}}
							{{--</a>--}}
						{{--</li>--}}
					{{--</ul>--}}
				{{--</li>--}}
				<li class="menu_children">
					<a href="{{action('UsersController@getNews')}}" class="menu_link">
						<span class="link_border">
							Новости
							<span class="menu_abs"></span>
						</span>
					</a>
				</li>
				<li class="menu_children">
					<a href="{{action('UsersController@getSport')}}" class="menu_link">
						<span class="link_border">
							Спорт
							<span class="menu_abs"></span>
						</span>
					</a>
				</li>
				<li class="menu_children">
					<a href="{{action('UsersController@getInteres')}}" class="menu_link">
						<span class="link_border">
							Интересно
							<span class="menu_abs"></span>
						</span>
					</a>
				</li>
				<li class="menu_children">
					<a href="{{action('UsersController@getGame')}}" class="menu_link">
						<span class="link_border">
							Игры
							<span class="menu_abs"></span>
						</span>
					</a>
				</li>
				<li id="contact" class="menu_children">
					<a class="menu_link">
						<span class="link_border">
							Контакт
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
				<img src="/images/logo.png" class="logo" />
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
	{!! HTML::script(asset('assets/user/js/show_more.js') ) !!}
	{!! HTML::script( asset('assets/user/js/init.js') ) !!}
	{!! HTML::script( asset('assets/user/js/user_main.js') ) !!}



	@yield('script')
</body>
</html>