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
    </div>
@endsection