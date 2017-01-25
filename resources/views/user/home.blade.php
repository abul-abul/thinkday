@extends('app-user')
@section('user-content')

	<div class="slide_place">
		<div id="myCarousel" class="carousel slide">
	        <!-- Indicators -->
	        <ol class="carousel-indicators">
	            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	            <li data-target="#myCarousel" data-slide-to="1"></li>
	            <li data-target="#myCarousel" data-slide-to="2"></li>
	        </ol>

	        <!-- Wrapper for Slides -->
	        <div class="carousel-inner">
	            <div class="item active">
	                <!-- Set the first background image using inline CSS below. -->
	                <div class="fill" style="background-image:url('/assets/user/images/slide1.jpg');"></div>
	                <div class="carousel-caption">
	                    <h2>
	                    	<a href="#" class="slider_link">Caption 1</a>
	                    </h2>
	                </div>
	            </div>
	            <div class="item">
	                <!-- Set the second background image using inline CSS below. -->
	                <div class="fill" style="background-image:url('/assets/user/images/slide2.jpg');"></div>
	                <div class="carousel-caption">
	                    <h2>
	                    	<a href="#" class="slider_link">Caption 2</a>
	                    </h2>
	                </div>
	            </div>
	            <div class="item">
	                <!-- Set the third background image using inline CSS below. -->
	                <div class="fill" style="background-image:url('/assets/user/images/slide3.jpg');"></div>
	                <div class="carousel-caption">
	                    <h2>
	                    	<a href="#" class="slider_link">Caption 3</a>
	                    </h2>
	                </div>
	            </div>
	        </div>

	        <!-- Controls -->
	        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
	            <span class="icon-prev"></span>
	        </a>
	        <a class="right carousel-control" href="#myCarousel" data-slide="next">
	            <span class="icon-next"></span>
	        </a>

	    </div>
	</div>
	<div class="content">
		<div class="services_title">
			Our services
		</div>
		<div class="services_place clear">
			@foreach($interests as $interest)
				<div data-id="{{$interest->id}}" class="services_blocks interest_show_block">
					<a href="{{action('UsersController@getInteresCategory',$interest->id)}}">
						<div class="ser_bg_abs"></div>
						<img src="/page_uploade/interes/{{$interest->image}}" class="service_image" />
						<div class="service_abs">
							<i class="fa fa-arrow-right" aria-hidden="true"></i>
							<span class="ser_abs_text">{{$interest->title}}</span>
						</div>
					</a>
				</div>
			@endforeach
			<div class="interst_block_show"></div>
		</div>
		<div class="content_right_place">
		<div class="posts_place">
				@foreach($news_rands as $news_rand)
					<div class="posts">
						<a href="{{action('UsersController@getNewsCategory',$news_rand->id)}}">
							<div class="posts_image_place">
								<img src="/page_uploade/news/{{$news_rand->image}}" class="posts_image" />
							</div>
							<p class="posts_title">
								{{$news_rand->title}}
							</p>
							<p class="posts_text">
								{{substr($news_rand->description, 0,80)}} ...

							</p>
						</a>
					</div>
				@endforeach
		</div>
		<div class="advertising_place">

		</div>
		</div>
		<div class="more_place show_more_interest">
			<div class="all_services">
				<span class="all_ser_text">Еще</span>
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
				<span class="us_title">contact with us</span>
			</div>

			@include('message')

			{!! Form::open(['action' => ['UsersController@postSubscripe'], ]) !!}

				{!! Form::text('email',null, ['placeholder' => 'Email', 'class' => 'e-mail form-control','id' => 'question_email']) !!}
				<br>
				{!! Form::textarea('question',null, ['placeholder' => 'write your question', 'class' => 'e-mail']) !!}
				<br>
				<input type="submit" value="send" class="question_send" />
				{!! Form::close() !!}
		</div>
		<div class="us_abs">
			<div class="us_rel">
				<div class="us_abs_2"></div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="services_title">
			LATEST NEWS
		</div>
		<div class="services_place clear">
			@foreach($news as $new)
			<div class="services_blocks">
				<a href="#">
					<div class="ser_bg_abs_1">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
					<img src="/page_uploade/news/{{$new->image}}" class="service_image" />
				</a>
			</div>
			@endforeach
		</div>
		<div class="content_right_place">
		<div class="posts_place">
			@foreach($interest_rands as $interest_rand)
				<div class="posts">
					<a href="{{action('UsersController@getInteresCategory',$interest_rand->id)}}">
						<div class="posts_image_place">
							<img src="/page_uploade/interes/{{$interest_rand->image}}" class="posts_image" />
						</div>
						<p class="posts_title">
							{{$interest_rand->title}}
						</p>
						<p class="posts_text">
							{{substr($interest_rand->description, 0,80)}} ...
						</p>
					</a>
				</div>
			@endforeach
		</div>
		<div class="advertising_place">

		</div>
		</div>
		<div class="more_place">
			<div class="all_services">
				<a href="#" class="all_link">
					<span class="all_ser_text">view more news</span>
				</a>
			</div>
		</div>
	</div>

@endsection

