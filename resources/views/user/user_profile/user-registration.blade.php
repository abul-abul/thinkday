<html>
	<head>
		{!! HTML::style( asset('assets/admin/plugins/css/font-awesome.css')) !!}
		{!! HTML::style( asset('assets/user/css/login_reg.css')) !!}
	</head>
	<body>
		<div class="login_content">
			<div class="logo_place_abs">
				<a href="{{action('UsersController@getHome')}}" class="back_logo_link">
					<img src="/assets/user/images/logo.png" class="back_logo_img" />
				</a>
			</div>
			<div class="login_reg_place">
				<div class="reg_place">
					<div class="login_title">
						<span>Sing up</span>
					</div>
					<form action="" method="post">
						<input type="text" class="user_login" name="user_log" placeholder="Name" />
						<input type="text" class="user_login" name="user_log" placeholder="Surname" />
						<input type="text" class="user_login" name="user_log" placeholder="Username" />
						<input type="text" class="user_login" name="user_log" placeholder="Age" />
						<input type="text" class="user_login" name="user_log" placeholder="Country" />
						<input type="text" class="user_login" name="user_log" placeholder="City / Town" />
						<input type="text" class="user_login" name="user_log" placeholder="Address" />
						<input type="email" class="user_login" name="user_log" placeholder="Email" />
						<input type="text" class="user_login" name="user_reg" placeholder="Password" />
						<input type="text" class="user_login" name="user_reg" placeholder="Re-Type Password" />
						<a href="{{action('UsersController@getLogin')}}" class="back_to_login">
							login
						</a>
						<input type="submit" class="reg_btn" value="submit" />
					</form>
				</div>
			</div>
		</div>
	</body>
</html>