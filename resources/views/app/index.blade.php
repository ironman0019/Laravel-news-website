@extends('app.layouts.master')
@section('title', 'صفحه اصلی')

@section('content')
<!-- Start top-post Area -->
<section class="top-post-area pt-10">
    <div class="container no-padding">
        <div class="row small-gutters">
            @isset($selectedPosts[0])
            <div class="col-lg-8 top-post-left">
                <div class="feature-image-thumb relative">
                    <div class="overlay overlay-bg"></div>
                    <img class="img-fluid" src="{{ asset($selectedPosts[0]->image) }}" alt="">
                </div>
                <div class="top-post-details">
                    <ul class="tags">
                        <li><a href="#">{{ $selectedPosts[0]->category->name }}</a></li>
                    </ul>
                    <a href="{{ route('show', $selectedPosts[0]) }}">
                        <h3>{{ $selectedPosts[0]->title }}</h3>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-user"></span>{{ $selectedPosts[0]->user->name }}</a></li>
                        <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($selectedPosts[0]->created_at)->format('%A, %d %B ') }}<span class="lnr lnr-calendar-full"></span></a></li>
                        <li><a href="#">{{ $selectedPosts[0]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                    </ul>
                </div>
            </div>
            @endisset
            <div class="col-lg-4 top-post-right">
                @isset($selectedPosts[1])
                <div class="single-top-post">
                    <div class="feature-image-thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{ asset($selectedPosts[1]->image) }}" alt="">
                    </div>
                    <div class="top-post-details">
                        <ul class="tags">
                            <li><a href="#">{{ $selectedPosts[1]->category->name }}</a></li>
                        </ul>
                        <a href="{{ route('show', $selectedPosts[1]) }}">
                            <h4>{{ $selectedPosts[1]->title }}</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>{{ $selectedPosts[1]->user->name }}</a></li>
                            <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($selectedPosts[1]->created_at)->format('%A, %d %B ') }}<span class="lnr lnr-calendar-full"></span></a></li>
                            <li><a href="#">{{ $selectedPosts[1]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                        </ul>
                    </div>
                </div>
                @endisset
                @isset($selectedPosts[2])
                <div class="single-top-post mt-10">
                    <div class="feature-image-thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{ asset($selectedPosts[2]->image) }}" alt="">
                    </div>
                    <div class="top-post-details">
                        <ul class="tags">
                            <li><a href="#">{{ $selectedPosts[2]->category->name }}</a></li>
                        </ul>
                        <a href="{{ route('show', $selectedPosts[2]) }}">
                            <h4>{{ $selectedPosts[2]->title }}</h4>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>{{ $selectedPosts[2]->user->name }}</a></li>
                            <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($selectedPosts[2]->created_at)->format('%A, %d %B ') }}<span class="lnr lnr-calendar-full"></span></a></li>
                            <li><a href="#">{{ $selectedPosts[2]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                        </ul>
                    </div>
                </div>
                @endisset
            </div>
            @isset($breakingNews)
            <div class="col-lg-12">
                <div class="news-tracker-wrap">
                    <h6><span>خبر فوری:</span> <a href="#">{{ $breakingNews->title }}</a></h6>
                </div>
            </div>
            @endisset
        </div>
    </div>
</section>
<!-- End top-post Area -->
<!-- Start latest-post Area -->
<section class="latest-post-area pb-120">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-8 post-list">
                <!-- Start latest-post Area -->
                <div class="latest-post-wrap">
                    <h4 class="cat-title">آخرین اخبار</h4>
                    @foreach($lastPosts as $lastPost)
                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{ asset($lastPost->image) }}" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="#">{{ $lastPost->category->name }}</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-7 post-right">
                                <a href="{{ route('show', $lastPost) }}">
                                    <h4>{{ $lastPost->title }}</h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span>{{ $lastPost->user->name }}</a></li>
                                    <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($lastPost->created_at)->format('%A, %d %B ') }}<span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#">{{ $lastPost->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                                <p class="excert">
                                    {!! Str::limit($lastPost->summary, 20) !!} 
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- End latest-post Area -->

                <!-- Start banner-ads Area -->
                    @empty(!$adsBanner)
                        <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                            <h4 class="ads-title">تبلیغات</h4>
                            <a href="#"><img class="img-fluid" src="{{ asset($adsBanner->image) }}" alt="Advertisment"></a>
                        </div>
                    @endempty
                <!-- End banner-ads Area -->
                <!-- Start popular-post Area -->
                <div class="popular-post-wrap">
                    <h4 class="title">اخبار پربازدید</h4>
                    @isset($popularPosts[0])
                    <div class="feature-post relative">
                        <div class="feature-img relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ asset($popularPosts[0]->image) }}" alt="">
                        </div>
                        <div class="details">
                            <ul class="tags">
                                <li><a href="#">{{ $popularPosts[0]->category->name }}</a></li>
                            </ul>
                            <a href="image-post.html">
                                <h3>{{ $popularPosts[0]->title }}</h3>
                            </a>
                            <ul class="meta">
                                <li><a href="#"><span class="lnr lnr-user"></span>{{ $popularPosts[0]->user->name }}</a></li>
                                <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($popularPosts[0]->created_at)->format('%A, %d %B ') }}<span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#">{{ $popularPosts[0]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    @endisset
                    @isset($popularPosts[1])
                    <div class="row mt-20 medium-gutters">
                        <div class="col-lg-6 single-popular-post">
                            <div class="feature-img-wrap relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{ asset($popularPosts[1]->image) }}" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="#">{{ $popularPosts[1]->category->name }}</a></li>
                                </ul>
                            </div>
                            <div class="details">
                                <a href="image-post.html">
                                    <h4>{{ $popularPosts[1]->title }}</h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span>{{ $popularPosts[1]->user->name }}</a></li>
                                    <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($popularPosts[1]->created_at)->format('%A, %d %B ') }}<span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#">{{ $popularPosts[1]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                                <p class="excert">
                                    {!! Str::limit($popularPosts[1]->summary, 20) !!} 
                                </p>
                            </div>
                        </div>
                        @endisset
                        @isset($popularPosts[2])
                        <div class="col-lg-6 single-popular-post">
                            <div class="feature-img-wrap relative">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{ asset($popularPosts[2]->image) }}" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="#">{{ $popularPosts[2]->category->name }}</a></li>
                                </ul>
                            </div>
                            <div class="details">
                                <a href="image-post.html">
                                    <h4>{{ $popularPosts[2]->title }}</h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span>{{ $popularPosts[2]->user->name }}</a></li>
                                    <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($popularPosts[2]->created_at)->format('%A, %d %B ') }}<span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#">{{ $popularPosts[2]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                                <p class="excert">
                                    {!! Str::limit($popularPosts[2]->summary, 20) !!}
                                </p>
                            </div>
                        </div>
                        @endisset
                    </div>
                </div>
                <!-- End popular-post Area -->
            </div>
            @include('app.layouts.partials.sidebar')
        </div>
    </div>
</section>
<!-- End latest-post Area -->

@endsection