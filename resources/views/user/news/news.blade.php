@extends('app-user')
@section('user-content')
    <div class="content">
        <div class="services_title">
            Our services
        </div>

        <div class="services_place clear">
            @foreach($news as $new)
                <div class="services_blocks">
                    <a href="{{action('UsersController@getNewsCategory',$new->id)}}">
                        <div class="ser_bg_abs"></div>
                        @if($new->image)
                            <img src="/page_uploade/news/{{$new->image}}" class="service_image" />
                        @else
                            <img class="service_image" src="/images/noImg.jpg" alt="">
                        @endif
                        <div class="service_abs">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            <span class="ser_abs_text">{{$new->title}}</span>
                        </div>
                    </a>
                </div>
            @endforeach
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
        <div class="more_place">
            {{ $news->links() }}        
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