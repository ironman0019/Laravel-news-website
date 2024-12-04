<div class="col-lg-4">
    <div class="sidebars-area">
        @isset($selectedPosts[0])
        <div class="single-sidebar-widget editors-pick-widget">
            <h6 class="title">انتخاب سردبیر</h6>
            <div class="editors-pick-post">
                <div class="feature-img-wrap relative">
                    <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{ asset($selectedPosts[0]->image) }}" alt="">
                    </div>
                    <ul class="tags">
                        <li><a href="#">{{ $selectedPosts[0]->category->name }}</a></li>
                    </ul>
                </div>
                <div class="details">
                    <a href="image-post.html">
                        <h4 class="mt-20">{{$selectedPosts[0]->title}}</h4>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-user"></span>{{$selectedPosts[0]->user->name}}</a></li>
                        <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($selectedPosts[0]->created_at)->format('%A, %d %B ') }}<span class="lnr lnr-calendar-full"></span></a></li>
                        <li><a href="#">{{ $selectedPosts[0]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                    </ul>
                    <p class="excert">
                        {!! Str::limit($selectedPosts[0]->summary, 20) !!} 
                    </p>
                </div>
            </div>
        </div>
        @endisset
        <div class="single-sidebar-widget ads-widget">
            <img class="img-fluid" src="img/sidebar-ads.jpg" alt="">
        </div>

        <div class="single-sidebar-widget most-popular-widget">
            <h6 class="title">پر بحث ترین ها</h6>
            @foreach($mostCommentedPosts as $mostCommentedPost)
                <div class="single-list flex-row d-flex">
                    <div class="thumb">
                        <img class="img-fluid" src="{{ asset($mostCommentedPost->image) }}" alt="">
                    </div>
                    <div class="details">
                        <a href="image-post.html">
                            <h6>{{ $mostCommentedPost->title }}</h6>
                        </a>
                        <ul class="meta">
                            <li><a href="#">{{ \Morilog\Jalali\Jalalian::forge($mostCommentedPost->created_at)->format('%A, %d %B ') }}<span class="lnr lnr-calendar-full"></span></a></li>
                            <li><a href="#">{{ $mostCommentedPost->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>