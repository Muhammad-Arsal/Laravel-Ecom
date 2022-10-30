@extends('frontend.layouts.main')
@section('main_section')
    <!--================Blog Area =================-->
    <section class="blog_area padding_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        @forelse ($latestPost as $itemss)
                            @php
                                $catName = \App\Models\Category::where('id', $itemss->category_id)->first();
                            @endphp
                            <article class="blog_item">
                                <div class="blog_item_img">
                                    <img class="card-img rounded-0"
                                        src="{{ asset('frontend/postImages') . '/' . $itemss->image }}" alt="">
                                    <a href="#" class="blog_item_date">
                                        <h3>{{ date('d', strtotime($itemss->created_at)) }}</h3>
                                        <p>{{ date('M', strtotime($itemss->created_at)) }}</p>
                                    </a>
                                </div>

                                <div class="blog_details">
                                    <a class="d-inline-block" href="{{ route('blog.details', $itemss->id) }}">
                                        <h2>{{ $itemss->title }}</h2>
                                    </a>
                                    <p>{{ $itemss->description }}</p>

                                    <ul class="blog-info-link">
                                        <li><a href="#"><i class="far fa-user"></i>{{ $catName->category_name }}</a>
                                        </li>
                                        <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                                    </ul>
                                </div>
                            </article>
                        @empty
                        @endforelse


                        <div class="row justify-content-center pagination-wrapper mt-2">
                            {!! $latestPost->links('pagination::bootstrap-4') !!}
                        </div>
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
                                <li>
                                    @forelse ($allCat as $item)
                                        @php
                                            $relativePost = \DB::table('posts')
                                                ->where('category_id', $item->id)
                                                ->get();
                                        @endphp
                                        <a href="{{ route('category.with.id', $item->id) }}"
                                            class="d-flex justify-content-between">
                                            <p>{{ $item->category_name }}</p>
                                            <p>({{ count($relativePost) }})</p>
                                        </a>
                                    @empty
                                    @endforelse
                                </li>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            @php
                                $recentPost = \DB::table('posts')
                                    ->latest()
                                    ->take(4)
                                    ->get();
                            @endphp
                            @forelse ($recentPost as $recent)
                                <div class="media post_item">
                                    <img src="{{ asset('frontend/postImages') . '/' . $recent->image }}" alt="post"
                                        style="width: 150px; height:100px;">
                                    <div class="media-body">
                                        <a href="single-blog.html">
                                            <h3>{{ $recent->title }}</h3>
                                        </a>
                                        <p>{{ date('M d,Y', strtotime($recent->created_at)) }}</p>
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
    <!--================Blog Area =================-->
@endsection
