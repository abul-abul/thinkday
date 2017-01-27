@extends('app-user')
@section('user-content')

    {!! HTML::style( asset('assets/user/css/jquery.mCustomScrollbar.css')) !!}
    {!! HTML::style( asset('assets/user/css/lightgallery.css')) !!}


    <div class="content">
        <div class="services_place clear">
            <h1 class="news_title_place">
                {{$sports->title}}
            </h1>
            <p class="news_date_place">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span>{{date('d.m.Y', strtotime($sports->created_at))}}</span>
            </p>
            @if($sports->image)
            <div class="news_image_place">
                <img src="/page_uploade/sport/{{$sports->image}}" class="news_image">
            </div>
            @endif
            <p class="news_desc_place">
              <span>{{$sports->description}}</span>
            </p>
            @if($gallerys[0]['pageGallery'])
            <div class="cabaret_scroll_slider">
                <i class="fa fa-camera" aria-hidden="true"></i>
                <span class="gallery_news">галерея</span>
                <span class="border_bottom"></span>
                <div class="gallery_tour">
                   <div class="slide gall clear">
                       @foreach($gallerys[0]['pageGallery'] as $gallery)
                           <a href="/page_uploade/page_gallery/{{$gallery->image}}">
                             <div class="img" style='background: url("/page_uploade/page_gallery/{{$gallery->image}}") no-repeat;background-size: cover;height:150px;width:200px'></div>
                           </a>
                       @endforeach
                    </div>
                </div>
            </div>
            @endif
            @if($gallerys[0]['pageVideo'])
            <div class="video_place">
                @foreach($gallerys[0]['pageVideo'] as $gallery)
                <div class="video">
                    <i class="fa fa-video-camera" aria-hidden="true"></i>
                    <span class="video_text">видео</span>
                    <span class="border_bottom"></span>
                    <iframe style="width: 100%;height: 100%;" src="{{$gallery->video}}" frameborder="0" allowfullscreen>
                    </iframe>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <div class="content_right_place">
            <div class="posts_place">
                @foreach($rand_sports as $rand_sport)
                    <div class="posts">
                        <a href="{{action('UsersController@getSportCategory',$rand_sport->id)}}">
                            <div class="posts_image_place">
                                @if($rand_sport->image)
                                <img src="/page_uploade/sport/{{$rand_sport->image}}" class="posts_image" />
                                @endif
                            </div>
                            <p class="posts_title">
                               {{$rand_sport->title}}
                            </p>
                            <p class="posts_text">
                                 {{substr($rand_sport->description, 0,80)}} ...
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

@section('script')

    {!! HTML::script(asset('assets/user/js/jquery.mCustomScrollbar.concat.min.js'))!!}
    {!! HTML::script(asset('assets/user/js/lightgallery.js'))!!}

@endsection
