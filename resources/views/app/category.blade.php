@extends('app.layouts.master')
@section('title', 'صفحه دسته بندی')

@section('content')

<!-- Start latest-$post Area -->
<section class="latest-post-area pb-120">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-8 post-list">
                <!-- Start latest-post Area -->
                <div class="latest-post-wrap">
                    <h4 class="cat-title">{{$category->name}}</h4>
                    @foreach($posts as $post)
                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{ asset($post->image) }}" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="#">{{ $post->category->name }}</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-7 post-right">
                                <a href="{{ route('show', $post) }}">
                                    <h4>{{ $post->title }}</h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span>{{ $post->user->name }}</a></li>
                                    <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($post->created_at)->format('%A, %d %B ') }}<span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#">{{ $post->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                                <p class="excert">
                                    {!! Str::limit($post->summary, 20) !!} 
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- End latest-post Area -->

            </div>
            @include('app.layouts.partials.sidebar')
        </div>
    </div>
</section>
<!-- End latest-post Area -->

@endsection