@extends('app-user')
@section('user-content')

	<div class="google_place">
		GOOGLE PLACE
	</div>
	<div class="games_content">
		<div class="google_place_small">
			GOOGLE PLACE
		</div>
		<div class="game_big_place">
			<h1 class="game_big_name">{{$game->title}}</h1>
			<object width="770" height="500" data="/page_uploade/game/category_game/{{$game->game}}"></object>
		</div>
		<div class="google_place_small">
			GOOGLE PLACE
		</div>
	</div>
	<div class="google_place_second">
		GOOGLE PLACE
	</div>

	<div id="us" class="us_place">
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
				<input type="email" id="question_email" placeholder="Email" />
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


@endsection