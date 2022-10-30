@extends('frontend.layouts.main')
@section('main_section')
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ asset('frontend/postImages') . '/' . $relativePost->image }}"
                                alt="">
                        </div>
                        <div class="blog_details">
                            <h2>{{ $relativePost->title }}
                            </h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                            </ul>
                            {!! $relativePost->post_details !!}
                        </div>
                    </div>
                    <div class="navigation-top">
                        @php
                            $previous = \App\Models\Post::select('*')
                                ->inRandomOrder()
                                ->first();
                        @endphp
                        <div class="navigation-area">
                            <div class="row">

                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                    <div class="thumb">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="{{ asset('frontend/postImages') . '/' . $previous->image }}"
                                                alt="" style="height: 90px; width: 120px;">
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="{{ route('blog.details', $previous->id) }}">
                                            <span class="lnr text-white ti-arrow-left"></span>
                                        </a>
                                    </div>
                                    <div class="detials">
                                        <p>Prev Post</p>
                                        <a href="{{ route('blog.details', $previous->id) }}">
                                            <h4 style="
                                            font-size: 15px;">
                                                {{ $previous->title }}</h4>
                                        </a>
                                    </div>
                                </div>
                                @php
                                    $next = \App\Models\Post::select('*')
                                        ->inRandomOrder()
                                        ->first();
                                    
                                    if ($next == $previous) {
                                        $next = \App\Models\Post::select('*')
                                            ->inRandomOrder()
                                            ->first();
                                    }
                                @endphp
                                <div
                                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                    <div class="detials">
                                        <p>Next Post</p>
                                        <a href="{{ route('blog.details', $next->id) }}">
                                            <h4 style="
                                            font-size: 15px;">
                                                {{ $next->title }}</h4>
                                        </a>
                                    </div>
                                    <div class="arrow">
                                        <a href="{{ route('blog.details', $next->id) }}">
                                            <span class="lnr text-white ti-arrow-right"></span>
                                        </a>
                                    </div>
                                    <div class="thumb">
                                        <a href="{{ route('blog.details', $next->id) }}">
                                            <img class="img-fluid"
                                                src="{{ asset('frontend/postImages' . '/' . $next->image) }}"
                                                alt="" style="height: 90px; width: 120px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comments-area">
                        <h4>Comments</h4>
                        @php
                            $comments = \DB::table('comments')
                                ->where('post_id', $postId)
                                ->get();
                        @endphp
                        @forelse ($comments as $com)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="{{ asset('frontend/userIcon/112.png') }}" alt="">
                                        </div>
                                        <div class="desc">
                                            <p class="comment">
                                                {{ $com->message }}
                                            </p>
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <h5>
                                                        <a href="">{{ $com->commenter_name }}</a>
                                                    </h5>
                                                    <p class="date">{{ date('d-M-Y', strtotime($com->created_at)) }}</p>
                                                </div>
                                                {{-- <div class="reply-btn">
                                                    <a href="#" class="btn-reply text-uppercase">reply</a>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No comments Found</p>
                        @endforelse

                    </div>
                    <div class="comment-form">
                        <h4>Leave a Comment</h4>
                        <form class="form-contact comment_form" action="" id="commentForm" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" name="message" id="comment" cols="30" rows="9"
                                            placeholder="Write Comment"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="name" id="name" type="text"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control" name="email" id="email" type="email"
                                            placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="website" type="text"
                                            placeholder="subject">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn_3 button-contactForm">Post Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Search</button>
                            </form>
                        </aside>
                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                @forelse ($allCat as $item)
                                    @php
                                        $relativePost = \DB::table('posts')
                                            ->where('category_id', $item->id)
                                            ->get();
                                    @endphp
                                    <li>
                                        <a href="{{ route('category.with.id', $item->id) }}"
                                            class="d-flex justify-content-between">
                                            <p>{{ $item->category_name }}</p>
                                            <p>({{ count($relativePost) }})</p>
                                        </a>
                                    </li>
                                @empty
                                @endforelse


                            </ul>
                        </aside>
                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @php
                                $latestPost = \DB::table('posts')
                                    ->latest()
                                    ->take(4)
                                    ->get();
                            @endphp
                            @forelse ($latestPost as $latest)
                                <div class="media post_item">
                                    <img src="{{ asset('frontend/postImages') . '/' . $latest->image }}" alt="post"
                                        style="width: 150px;height: 100px;">
                                    <div class="media-body">
                                        <a href="{{ route('blog.details', $latest->id) }}">
                                            <h3>{{ $latest->title }}</h3>
                                        </a>
                                        <p>{{ date('M d,Y', strtotime($latest->created_at)) }}</p>
                                    </div>
                                </div>
                            @empty
                            @endforelse

                        </aside>

                        <aside class="single_sidebar_widget newsletter_widget">
                            <h4 class="widget_title">Newsletter</h4>
                            <form action="#">
                                <div class="form-group">
                                    <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Subscribe</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area end =================-->
@endsection
