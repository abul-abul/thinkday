@extends('app-user')
@section('user-content')
    <div class="content">
        <div class="services_title">
            Our services
        </div>

        <div class="services_place clear">
            @foreach($interests as $interest)
                <div class="services_blocks">
                    <a href="{{action('UsersController@getInteresCategory',$interest->id)}}">
                        <div class="ser_bg_abs"></div>
                        @if($interest->image)
                            <img src="/page_uploade/interes/{{$interest->image}}" class="service_image" />
                        @else
                            <img class="service_image" src="/images/noImg.jpg" alt="">
                        @endif
                        <div class="service_abs">
                            <i class="fa fa-arrow-right" aria-hidden="true"></i>
                            <span class="ser_abs_text">{{$interest->title}}</span>
                        </div>
                    </a>
                </div>
            @endforeach
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
        <div class="more_place">
            {{ $interests->links() }}
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