@extends('app-user')
@section('user-content')
    <div class="google_place">
        GOOGLE PLACE
    </div>

    <div class="games_content">
        <ul class="games_left_menu">
            @include('user.game.game-menu')
        </ul>
        <div class="game_right_menu">
            <h1>{{$one_game_page->name}}</h1>
            @foreach($game_categorys as $game_category)
                <div class="game_place">
                    <a href="#" class="big_link">
                        <img src="/page_uploade/game/category_images/{{$game_category->image}}" class="game_img_big" />
                        <p class="game_name">{{$game_category->title}}</p>
                        <div class="big_link_abs">
                            <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
            @endforeach
            <div class="pageination">
                {{ $game_categorys->links() }}
            </div>
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

@endsection