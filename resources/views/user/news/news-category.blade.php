@extends('app-user')
@section('user-content')

    {!! HTML::style( asset('assets/user/css/jquery.mCustomScrollbar.css')) !!}
    {!! HTML::style( asset('assets/user/css/lightgallery.css')) !!}


    <div class="content">
        <div class="services_place clear">
            <h1 class="news_title_place">
                {{$news->title}}
            </h1>
            @if($news->image)
            <div class="news_image_place">
                <img src="/page_uploade/news/{{$news->image}}" class="news_image">
            </div>
            @endif
            <p class="news_desc_place">
              <span>{{$news->description}}</span>  
            </p>
            <div class="scroll_slider">
                <div class="gallery_tour">
                   <div class="slide gall clear">
                        <a href="/assets/user/images/service1.jpg">
                            <div class="img" style="background: url('/assets/user/images/service1.jpg') no-repeat;background-size: cover;height:150px;width:200px"></div>
                        </a>
                        <a href="/assets/user/images/service2.jpg">
                            <div class="img" style="background: url('/assets/user/images/service2.jpg') no-repeat;background-size: cover;height:150px;width:200px"></div>
                        </a>
                        <a href="/assets/user/images/service3.jpg">
                            <div class="img" style="background: url('/assets/user/images/service3.jpg') no-repeat;background-size: cover;height:150px;width:200px"></div>
                        </a>
                        <a href="/assets/user/images/service4.jpg">
                            <div class="img" style="background: url('/assets/user/images/service4.jpg') no-repeat;background-size: cover;height:150px;width:200px"></div>
                        </a>
                        <a href="/assets/user/images/service5.jpg">
                            <div class="img" style="background: url('/assets/user/images/service5.jpg') no-repeat;background-size: cover;height:150px;width:200px"></div>
                        </a>
                        <a href="/assets/user/images/service6.jpg">
                            <div class="img" style="background: url('/assets/user/images/service6.jpg') no-repeat;background-size: cover;height:150px;width:200px"></div>
                        </a>      
                    </div>
                </div>
            </div>
            <div class="video_place">
                <iframe style="width: 100%;height: 100%;" src="https://www.youtube.com/embed/d19eBjpP2Aw?list=RDd19eBjpP2Aw" frameborder="0" allowfullscreen>
                </iframe>
            </div>
        </div>
        <div class="content_right_place">
            <div class="posts_place">
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service1.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service2.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service3.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service4.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service5.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service6.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service1.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service2.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service3.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service4.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
                <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/assets/user/images/service5.jpg" class="posts_image" />
                        </div>
                        <p class="posts_title">
                            Day News on one string
                        </p>
                        <p class="posts_text">
                            Some one is looser,but some one is clever.
                            But every one is man.
                            We are people.
                        </p>
                    </a>
                </div>
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

@section('script')

    {!! HTML::script(asset('assets/user/js/jquery.mCustomScrollbar.concat.min.js'))!!}
    {!! HTML::script(asset('assets/user/js/lightgallery.js'))!!}

@endsection
