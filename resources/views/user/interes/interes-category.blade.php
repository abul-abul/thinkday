@extends('app-user')
@section('user-content')

    {!! HTML::style( asset('assets/user/css/jquery.mCustomScrollbar.css')) !!}
    {!! HTML::style( asset('assets/user/css/lightgallery.css')) !!}


    <div class="content">
        <div class="services_place clear">
            <h1 class="news_title_place">
                {{$interests->title}}
            </h1>
            <p class="news_date_place">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span>{{date('d.m.Y', strtotime($interests->created_at))}}</span>
            </p>
            @if($interests->image)
            <div class="news_image_place">
                <img src="/page_uploade/interes/{{$interests->image}}" class="news_image">
            </div>
            @endif
            <p class="news_desc_place">
              <span>{{$interests->description}}</span>
            </p>
            @if(count($gallerys) != 0)
            <div class="cabaret_scroll_slider">
                <i class="fa fa-camera" aria-hidden="true"></i>
                <span class="gallery_news">галерея</span>
                <div class="gallery_tour">
                   <div class="slide gall clear">
                       @foreach($gallerys as $gallery)
                           <a href="/page_uploade/page_gallery/{{$gallery->image}}">
                             <div class="img" style='background: url("/page_uploade/page_gallery/{{$gallery->image}}") no-repeat;background-size: cover;height:150px;width:200px'></div>
                           </a>
                       @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if(count($videos) != 0)
            <div class="video_place">
                @foreach($videos as $gallery)
                <div class="video">
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                    <span class="video_text">видео</span>
                    <iframe style="width: 100%;height: 100%;" src="{{$gallery->video}}" frameborder="0" allowfullscreen>
                    </iframe>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="content_right_place">
            <div class="posts_place">
                @foreach($rand_interests as $rand_interest)
                    <div class="posts">
                        <a href="{{action('UsersController@getInteresCategory',$rand_interest->id)}}">
                            <div class="posts_image_place">
                                @if($rand_interest->image)
                                <img src="/page_uploade/interes/{{$rand_interest->image}}" class="posts_image" />
                                @endif
                            </div>
                            <p class="posts_title">
                               {{$rand_interest->title}}
                            </p>
                            <p class="posts_text">
                                 {{substr($rand_interest->description, 0,80)}} ...
                            </p>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="advertising_place">
                advertising_place advertising_place advertising_place advertising_place advertising_place
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

@section('script')

    {!! HTML::script(asset('assets/user/js/jquery.mCustomScrollbar.concat.min.js'))!!}
    {!! HTML::script(asset('assets/user/js/lightgallery.js'))!!}

@endsection
