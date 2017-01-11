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
					<div class="fill" style="background-image:url('images/slide1.jpg');"></div>
					<div class="carousel-caption">
						<h2>
							<a href="#" class="slider_link">Caption 1</a>
						</h2>
					</div>
				</div>
				<div class="item">
					<!-- Set the second background image using inline CSS below. -->
					<div class="fill" style="background-image:url('images/slide2.jpg');"></div>
					<div class="carousel-caption">
						<h2>
							<a href="#" class="slider_link">Caption 2</a>
						</h2>
					</div>
				</div>
				<div class="item">
					<!-- Set the third background image using inline CSS below. -->
					<div class="fill" style="background-image:url('images/slide3.jpg');"></div>
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
		<p class="services_text">
			Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без
		</p>
		<div class="services_place clear">
			<div class="services_blocks">
				<a href="#">
					<div class="ser_bg_abs"></div>
					<img src="images/service1.jpg" class="service_image" />
					<div class="service_abs">
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
						<span class="ser_abs_text">our works</span>
					</div>
				</a>
			</div>
			<div class="services_blocks">
				<a href="#">
					<div class="ser_bg_abs"></div>
					<img src="images/service2.jpg" class="service_image" />
					<div class="service_abs">
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
						<span class="ser_abs_text">our partners</span>
					</div>
				</a>
			</div>
			<div class="services_blocks">
				<a href="#">
					<div class="ser_bg_abs"></div>
					<img src="images/service3.jpg" class="service_image" />
					<div class="service_abs">
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
						<span class="ser_abs_text">our blogs</span>
					</div>
				</a>
			</div>
			<div class="services_blocks">
				<a href="#">
					<div class="ser_bg_abs"></div>
					<img src="images/service4.jpg" class="service_image" />
					<div class="service_abs">
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
						<span class="ser_abs_text">our videos</span>
					</div>
				</a>
			</div>
			<div class="services_blocks">
				<a href="#">
					<div class="ser_bg_abs"></div>
					<img src="images/service5.jpg" class="service_image" />
					<div class="service_abs">
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
						<span class="ser_abs_text">our images images images</span>
					</div>
				</a>
			</div>
			<div class="services_blocks">
				<a href="#">
					<div class="ser_bg_abs"></div>
					<img src="images/service6.jpg" class="service_image" />
					<div class="service_abs">
						<i class="fa fa-arrow-right" aria-hidden="true"></i>
						<span class="ser_abs_text">our works</span>
					</div>
				</a>
			</div>
		</div>
		<div class="all_services">
			<a href="#" class="all_link">
				<span class="all_ser_text">view all news</span>
			</a>
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
				<span class="us_title">contact us</span>
			</div>
			<form action="" method="post">
				<input type="email" class="question_email" placeholder="Email" />
				<br>
				<textarea placeholder="write your question"></textarea>
				<br>
				<input type="submit" value="send" class="question_send" />
			</form>
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
		<p class="services_text">
			Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без
		</p>
		<p class="services_text">
			Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без
		</p>
		<div class="services_place clear">
			<div class="services_blocks">
				<a href="#">
					<div class="ser_bg_abs_1">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
					<img src="images/service1.jpg" class="service_image" />
				</a>
			</div>
			<div class="services_blocks">
				<a href="#">
					<div class="ser_bg_abs_1">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
					<img src="images/service2.jpg" class="service_image" />
				</a>
			</div>
			<div class="services_blocks">
				<a href="#">
					<div class="ser_bg_abs_1">
						<i class="fa fa-link" aria-hidden="true"></i>
					</div>
					<img src="images/service3.jpg" class="service_image" />
				</a>
			</div>
		</div>
		<div class="all_services">
			<a href="#" class="all_link">
				<span class="all_ser_text">view all services</span>
			</a>
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
				<span class="us_title">TESTIMONIALS</span>
			</div>
			<div class="carousel_place">

			</div>
		</div>
		<div class="us_abs">
			<div class="us_rel">
				<div class="us_abs_2"></div>
			</div>
		</div>
	</div>

@endsection

