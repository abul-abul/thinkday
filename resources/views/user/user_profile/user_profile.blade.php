@extends('app-user')
@section('user-content')


		<div class="user_content">
			<div class="user_info_place">
				<div class="user_info_left">
					<div class="user_img_place">
						<div class="user_img_place_child">
							<img src="/assets/user/images/user.jpg" class="user_img" />
							<div class="user_img_abs"></div>
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
				</div>
				<div class="settings_place">
					<div>
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
								<div id="faq-tab-1" class="tab-pane new_tab fade in active">
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
								<div id="faq-tab-2" class="tab-pane new_tab fade">
									<div class="container">
									    <div class="panel-group new_group" id="accordion">
									    <div class="panel panel-default new_panel1">
									      <div class="panel-heading new_head nH">
									        <h4 class="panel-title">
									          <a data-toggle="collapse" data-parent="#accordion" href="#collapse99" class="a">Personal info</a>
									        </h4>
									      </div>
									      <div id="collapse99" class="panel-collapse new_collapse collapse in">
									        <div class="panel-body new_body">
									        	<form action="" method="post">
										        	<input type="text" id="change" placeholder="Change Name" />
													<input type="text" id="change" placeholder="Change Surname" />
													<input type="text" id="change" placeholder="Change Username" />
													<input type="number" id="change" placeholder="Change Age" />
													<input type="text" id="change" placeholder="Change Country" />
													<input type="text" id="change" placeholder="Change City" />
													<input type="text" id="change" placeholder="Change Address" />
													<input type="email" id="change" placeholder="Change Email" />
													<input type="submit" value="submit" id="change_submit" />
												</form>
									        </div>
									      </div>
									    </div>
									    <div class="panel panel-default new_panel1">
									      <div class="panel-heading new_head">
									        <h4 class="panel-title">
									          <a data-toggle="collapse" data-parent="#accordion" href="#collapse88" class="a">Change Avatar</a>
									        </h4>
									      </div>
									      <div id="collapse88" class="panel-collapse new_collapse collapse">
									        <div class="panel-body new_body" style="width: 180px;">
									        	<form action="" method="post">
									        		<div class="new_image_place">
									        			<img src="" class="new_image"/>
									        		</div>
									        		<p class="choose_image">choose image</p>
									        		<input type="submit" value="cancel" id="change_submit" />
									        		<input type="submit" value="submit" id="change_submit" />
									        	</form>
									        </div>
									      </div>
									    </div>
									    <div class="panel panel-default new_panel1">
									      <div class="panel-heading new_head">
									        <h4 class="panel-title">
									          <a data-toggle="collapse" data-parent="#accordion" href="#collapse77" class="a">Change Password</a>
									        </h4>
									      </div>
									      <div id="collapse77" class="panel-collapse new_collapse collapse">
									        <div class="panel-body new_body">
									        	<form action="" method="post">
									        		<input type="password" id="change" placeholder="Current Password" />
									        		<input type="password" id="change" placeholder="Change Password" />
													<input type="password" id="change" placeholder="Re-Password" />
													<input type="submit" value="submit" id="change_submit" />
									        	</form>
									        </div>
									      </div>
									    </div>
									    </div> 
									</div>
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