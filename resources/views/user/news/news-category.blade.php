@extends('app-user')
@section('user-content')

    {!! HTML::style( asset('assets/user/css/jquery.mCustomScrollbar.css')) !!}
    {!! HTML::style( asset('assets/user/css/lightgallery.css')) !!}
    {!! HTML::style( asset('assets/user/css/star-rating.css')) !!}


    <div class="content">
        <div class="services_place clear">
            <h1 class="news_title_place">
                {{$news->title}}
            </h1>
            <p class="news_date_place">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <span>{{date('d.m.Y', strtotime($news->created_at))}}</span>
                <div class="container">
                <form>
                    <input type="text" class="rating rating-loading" value="4" data-size="xl" title="">
                </form>
                </div>
            </p>
            @if($news->image)
            <div class="news_image_place">
                <img src="/page_uploade/news/{{$news->image}}" class="news_image">
            </div>
            @endif
            <p class="news_desc_place">
              <span>{{$news->description}}</span>  
            </p>
            <form action="" method="post">
                <textarea placeholder="Коментария"></textarea>
                <input type="submit" value="коментировать" class="comment_btn" />
            </form>
            <div class="comment_place">
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news1.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news2.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news3.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news5.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news6.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news1.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news2.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news3.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news5.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news6.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news1.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news2.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news3.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news5.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
                <div class="user_comment_place">
                    <a href="#">
                        <img src="/page_uploade/news/news6.jpg" class="us_com_img" />
                    </a>
                    <p class="user_comment_text">
                        text user comment text text user comment text textusercommenttext text user comment text text user comment text textusercommenttexttext user comment text text user comment text textusercommenttexttext text user comment text text user comment text textusercommenttext vtext user comment text text user comment text textusercommenttext
                    </p>
                </div>
            </div>


            @if(count($gallerys) != 0)

                <div class="cabaret_scroll_slider">
                    <i class="fa fa-camera" aria-hidden="true"></i>
                    <span class="gallery_news">галерея</span>
                    <span class="border_bottom"></span>
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
                @foreach($$videos as $gallery)
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
                @foreach($rand_news as $rand_new)
                    <div class="posts">
                        <a href="{{action('UsersController@getNewsCategory',$rand_new->id)}}">
                            <div class="posts_image_place">
                                @if($rand_new->image)
                                <img src="/page_uploade/news/{{$rand_new->image}}" class="posts_image" />
                                @endif
                            </div>
                            <p class="posts_title">
                               {{$rand_new->title}}
                            </p>
                            <p class="posts_text">
                                 {{substr($rand_new->description, 0,80)}} ...
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
    {!! HTML::script(asset('assets/user/js/lightgalleryCall.js'))!!}
    {!! HTML::script(asset('assets/user/js/star-rating.js'))!!}

@endsection
