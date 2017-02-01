@extends('app-user')
@section('user-content')
hello {{Auth::User()->firstname}}

		


		<div class="user_content">
			<div class="user_set_abs">
				<div class="set_abs_child">
					<div class="set_child_abs">
						<i class="fa fa-power-off" aria-hidden="true"></i>
					</div>
					<div class="logout">
						<a href="#" class="set_menu_link">
							<span>logout</span>
						</a>
					</div>
				</div>
			</div>
			<div class="user_info_place">
				<div class="user_info_left">
					<div class="user_img_place">
						<div class="user_img_place_child">
							<img src="/assets/user/images/user.jpg" class="user_img" />
							<div class="user_img_abs"></div>
							<div class="user_img_abs2">
								<div class="choose_img_place">
									<span>choose image</span>
								</div>
								<div class="choose_yes">
									<i class="fa fa-check" aria-hidden="true"></i>
								</div>
								<div class="choose_no">
									<i class="fa fa-window-close" aria-hidden="true"></i>
								</div>
							</div>
						</div>
					</div>
					<div class="username_place">
						<div class="username_center">
							<span class="user_status"></span>
							<span class="username">
								Mr. Green
							</span>
						</div>
						<div class="username_abs1"></div>
						<div class="username_abs2"></div>
					</div>
					<div class="user_sms_place">
						<p class="send_sms">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<span class="send_sms_text">
								Отправить письмо
							</span>
						</p>
					</div>
					<div class="user_soc_place">
						<a href="#" class="user_soc_links">
							<i class="fa fa-facebook-square" aria-hidden="true"></i>
						</a>
						<a href="#" class="user_soc_links">
							<i class="fa fa-google-plus-square" aria-hidden="true"></i>
						</a>
						<a href="#" class="user_soc_links">
							<i class="fa fa-twitter-square" aria-hidden="true"></i>
						</a>
					</div>
				</div>
				<div class="settings_place">
					<div class="col-xs-12">
						<div class="tabbable">
							<ul class="nav nav-tabs padding-18 tab-size-bigger" id="myTab">
								<li class="active">
									<a data-toggle="tab" href="#faq-tab-1">
										Profile
									</a>
								</li>
								<li>
									<a data-toggle="tab" href="#faq-tab-2">
										Settings
									</a>
								</li>
							</ul>
							<div class="tab-content no-border padding-24">
								<div id="faq-tab-1" class="tab-pane fade in active">
									<div class="user_info_right">
										<div class="right_info_left">
											<p>Name</p>
											<p>Surname</p>
											<p>Username</p>
											<p>Age</p>
											<p>Country</p>
											<p>City</p>
											<p>Address</p>
											<p>Email</p>
										</div>
										<div class="right_info_right">
											<p>George</p>
											<p>Benson</p>
											<p>Mr. Green</p>
											<p>29</p>
											<p>Russia</p>
											<p>Moscow</p>
											<p>Pushkin. St.</p>
											<p>mrgreen@gmail.com</p>
										</div>
									</div>
								</div>
								<div id="faq-tab-2" class="tab-pane fade">
									<form action="" method="post">
										<input type="text" class="change"
											   placeholder="Change Name" />
										<input type="text" class="change"
											   placeholder="Change Surname" />
										<input type="text" class="change"
											   placeholder="Change Username" />
										<input type="number" class="change"
											   placeholder="Change Age" />
										<input type="text" class="change"
											   placeholder="Change Country" />
										<input type="text" class="change"
											   placeholder="Change City" />
										<input type="text" class="change"
											   placeholder="Change Address" />
										<input type="email" class="change"
										   placeholder="Change Email" />
										<input type="pass" class="change"
											   placeholder="Change Password" />
										<input type="pass" class="change"
											   placeholder="Re-Password" />
										<input type="submit" value="submit"
												class="change_submit" />
									</form>
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="us_place">
	        <div class="us_abs">
	            <div class="us_rel">
	                <div class="us_abs_1"></div>
	            </div>
	        </div>
	        <div class="us_place_center">

	            <div class="us_title_place">
	                <span class="us_title">Контакт с нами</span>
	            </div>

	            @include('message')

	            {!! Form::open(['action' => ['UsersController@postSubscripe'], ]) !!}

	                {!! Form::text('email',null, ['placeholder' => 'Эл.адрес', 'class' => 'e-mail form-control','id' => 'question_email']) !!}
	                <br>
	                {!! Form::textarea('question',null, ['placeholder' => 'пишите свой вопрос', 'class' => 'e-mail']) !!}
	                <br>
	                <input type="submit" value="Отправить" class="question_send" />
	                {!! Form::close() !!}
	        </div>
	        <div class="us_abs">
	            <div class="us_rel">
	                <div class="us_abs_2"></div>
	            </div>
	        </div>
	    </div>


@endsection