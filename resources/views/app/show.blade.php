@extends('app.layouts.master')
@section('title', 'show')

@section('content')

<section class="latest-post-area pb-120">
    <div class="container no-padding">
        <div class="row">
            <div class="col-lg-8 post-list">
                <!-- Start single-post Area -->
                <div class="single-post-wrap">
                    <div class="feature-img-thumb relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{ asset($post->image) }}" alt="">
                    </div>
                    <div class="content-wrap">
                        <ul class="tags mt-10">
                            <li><a href="{{ route('category', $post->category) }}">{{ $post->category->name }}</a></li>
                        </ul>
                        <a href="#">
                            <h3>{{$post->title}}</h3>
                        </a>
                        <ul class="meta pb-20">
                            <li><a href="#"><span class="lnr lnr-user"></span>{{$post->user->name}}</a></li>
                            <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($post->created_at)->format('%A, %d %B') }}<span class="lnr lnr-calendar-full"></span></a></li>
                            <li><a href="#">{{ $post->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                        </ul>
                        <p>
                            {!! $post->body !!}
                        </p>

                        <div class="comment-sec-area">
                            <div class="container">
                                <div class="row flex-column">
                                    <h6>نظرات</h6>
                                    @forelse($post->comments()->where('status', 2)->get() as $comment)
                                    <div class="comment-list">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">

                                                <div class="desc">
                                                    <h5><a href="#">{{ $comment->user->name }}</a></h5>
                                                    <p class="date mt-3">{{ \Morilog\Jalali\Jalalian::forge($comment->created_at)->format('%A, %d %B %y') }}</p>
                                                    <p class="comment">
                                                        {{$comment->body}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                        <p>نظری وجود ندارد</p>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                    @auth
                        @include('admin.layouts.partials.errors')
                    <div class="comment-form">
                        <h4>درج نظر جدید</h4>
                        <form action="{{ route('store.comment', $post) }}" method="POST">
                            @csrf 
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="body" placeholder="متن نظر" onfocus="this.placeholder = ''" onblur="this.placeholder = 'متن نظر'" required=""></textarea>
                            </div>
                            <button type="submit" class="primary-btn text-uppercase">ارسال</button>
                        </form>
                    </div>
                    @endauth
                    @guest
                        <p>برای ثبت نظر وارد شوید</p>
                        <a href="{{ route('login') }}" class="btn btn-info">ورود</a>
                    @endguest
                </div>
                <!-- End single-post Area -->
            </div>
            @include('app.layouts.partials.sidebar')
        </div>
    </div>
</section>

@endsection