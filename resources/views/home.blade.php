@extends('layouts.master')
@section('title','Home')
@section('content')
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- post -->

            @foreach ($show_banner as $item)
            <!-- post -->
            <div class="col-md-6">
                <div class="post post-thumb">
                    <a class="post-img" href="{{route('post',$item->post->slug)}}"><img src="{{$item->post->img}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-3" href="category.html">Jquery</a>
                            <span class="post-date">{{$item->created_at}}</span>
                        </div>
                        <h3 class="post-title"><a href="{{route('post',$item->post->slug)}}">{{$item->post->title}}</a></h3>
                    </div>
                </div>
            </div>
            <!-- /post -->
            @endforeach


        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h2>Recent Posts</h2>
                </div>
            </div>

            @foreach ($show_recently as $item)
            <!-- post -->
            <div class="col-md-4">
                <div class="post">
                    <a class="post-img" href="{{route('post',$item->slug)}}"><img src="{{$item->img}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-1" href="category.html">Web Design</a>
                            <span class="post-date">{{$item->created_at}}</span>
                        </div>
                        <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$item->title}}</a></h3>
                    </div>
                </div>
            </div>
            <!-- /post -->
            @endforeach




        </div>
        <!-- /row -->

        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-thumb">
                                <a class="post-img" href="{{route('post',$show_big[0]->slug)}}"><img src="{{$show_big[0]->img}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="
                                    " href="category.html">Jquery</a>
                                    <span class="post-date">{{$show_big[0]->created_at}}</span>
                                </div>
                                <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$show_big[0]->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->



                    <div class="clearfix visible-md visible-lg"></div>
                    @foreach ($normal as $item)

                    <!-- post -->
                    <div class="col-md-6">
                        <div class="post">
                                <a class="post-img" href="{{route('post',$item->slug)}}"><img src="{{$item->img}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-1" href="category.html">Web Design</a>
                                    <span class="post-date">{{$item->created_at}}</span>
                                </div>
                                <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$item->title}}</a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @endforeach


                </div>
            </div>

            <div class="col-md-4">
                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Most Read</h2>
                    </div>


                    @foreach ($show_most_read_sidebar as $item)
                    <div class="post post-widget">
                            <a class="post-img" href="{{route('post',$item->slug)}}"><img src="{{$item->img}}" alt=""></a>
                        <div class="post-body">
                            <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$item->title}}</a></h3>
                        </div>
                    </div>
                    @endforeach



                </div>
                <!-- /post widget -->

                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Featured Posts</h2>
                    </div>


                    @foreach ($show_featured_sidebar as $item)
                    <div class="post post-thumb">
                            <a class="post-img" href="{{route('post',$item->slug)}}"><img src="{{$item->img}}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-3" href="category.html">Jquery</a>
                                <span class="post-date">{{$item->created_at}}</span>
                            </div>
                            <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$item->title}}</a>
                            </h3>
                        </div>
                    </div>
                    @endforeach




                </div>
                <!-- /post widget -->

                <!-- ad -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="./img/ad-1.jpg" alt="">
                    </a>
                </div>
                <!-- /ad -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section section-grey">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h2>Featured Posts</h2>
                </div>
            </div>


            @foreach ($show_featured as $item)


            <!-- post -->
            <div class="col-md-4">
                <div class="post">
                        <a class="post-img" href="{{route('post',$item->slug)}}"><img src="{{$item->img}}" alt=""></a>
                    <div class="post-body">
                        <div class="post-meta">
                            <a class="post-category cat-2" href="category.html">JavaScript</a>
                            <span class="post-date">{{$item->created_at}}</span>
                        </div>
                        <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$item->title}}</a></h3>
                    </div>
                </div>
            </div>
            <!-- /post -->
            @endforeach

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->

<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Most Read</h2>
                        </div>
                    </div>

                    @foreach ($show_most_read as $item)
                    <!-- post -->
                    <div class="col-md-12">
                        <div class="post post-row">
                                <a class="post-img" href="{{route('post',$item->slug)}}"><img src="{{$item->img}}" alt=""></a>
                            <div class="post-body">
                                <div class="post-meta">
                                    <a class="post-category cat-2" href="category.html">JavaScript</a>
                                    <span class="post-date">{{$item->created_at}}</span>
                                </div>
                                <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$item->title}}</a></h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
                            </div>
                        </div>
                    </div>
                    <!-- /post -->
                    @endforeach




                    <div class="col-md-12">
                        <div class="section-row">
                            <button class="primary-button center-block">Load More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- ad -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="./img/ad-1.jpg" alt="">
                    </a>
                </div>
                <!-- /ad -->

                <!-- catagories -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Catagories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            <li><a href="#" class="cat-1">Web Design<span>340</span></a></li>
                            <li><a href="#" class="cat-2">JavaScript<span>74</span></a></li>
                            <li><a href="#" class="cat-4">JQuery<span>41</span></a></li>
                            <li><a href="#" class="cat-3">CSS<span>35</span></a></li>
                        </ul>
                    </div>
                </div>
                <!-- /catagories -->

                <!-- tags -->
                <div class="aside-widget">
                    <div class="tags-widget">
                        <ul>
                            <li><a href="#">Chrome</a></li>
                            <li><a href="#">CSS</a></li>
                            <li><a href="#">Tutorial</a></li>
                            <li><a href="#">Backend</a></li>
                            <li><a href="#">JQuery</a></li>
                            <li><a href="#">Design</a></li>
                            <li><a href="#">Development</a></li>
                            <li><a href="#">JavaScript</a></li>
                            <li><a href="#">Website</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /tags -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
@endsection