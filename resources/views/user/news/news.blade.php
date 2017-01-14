@extends('app-user')
@section('user-content')
    <div class="content">
        <div class="services_title">
            Our services
        </div>

        <div class="services_place clear">
            @foreach($news as $new)
            <div class="services_blocks">
                <a href="#">
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
        {{ $news->links() }}

        <div class="posts_place">
            <div class="posts">
                    <a href="#">
                        <div class="posts_image_place">
                            <img src="/images/noImg.jpg" class="posts_image" />
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
                            <img src="/smallimg/service2.jpg" class="posts_image" />
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
                            <img src="/smallimg/service3.jpg" class="posts_image" />
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
                            <img src="/smallimg/service4.jpg" class="posts_image" />
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
                            <img src="/smallimg/service5.jpg" class="posts_image" />
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
                            <img src="/smallimg/service6.jpg" class="posts_image" />
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
                            <img src="/smallimg/service1.jpg" class="posts_image" />
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
                            <img src="/smallimg/service2.jpg" class="posts_image" />
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
                            <img src="/smallimg/service3.jpg" class="posts_image" />
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
                            <img src="/smallimg/service4.jpg" class="posts_image" />
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
                            <img src="/smallimg/service5.jpg" class="posts_image" />
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
        <div class="more_place">
            <div class="all_services">
                <a href="#" class="all_link">
                    <span class="all_ser_text">view all news</span>
                </a>
            </div>
        </div>
    </div>

    
@endsection