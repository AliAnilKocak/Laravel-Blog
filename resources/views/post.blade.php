@extends('layouts.master')
@section('title','Home')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- Post content -->
            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post">
                        <hr>
                        <h3>{{$post->title}}</h3>
                        <div class="col-md-12">
                            <div class="post post-thumb">
                                <a class="post-img" href="">
                                    <img src="https://lorempixel.com/1280/720/?49781" alt=""></a>
                            </div>
                        </div>
                        <hr>
                        {{$post->content}}
                        <hr>

                    </div>
                    @include('layouts.partials.social')
                </div>

                <!-- ad -->
                <div class="section-row text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="/img/ad-2.jpg" alt="">
                    </a>
                </div>
                <!-- ad -->

                @include('layouts.partials.author')


            </div>
            <!-- /Post content -->

            <!-- aside -->
            <div class="col-md-4">
                <!-- ad -->
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="/img/ad-1.jpg" alt="">
                    </a>
                </div>
                <!-- /ad -->

                <!-- post widget -->
                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Most Read</h2>
                    </div>

                    @foreach ($show_most_read_boot as $item)

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

                    @foreach ($show_featured_boot as $item)

                    <div class="post post-thumb">
                        <a class="post-img" href="{{route('post',$item->slug)}}"><img src="{{$item->img}}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-3" href="#">Jquery</a>
                                <span class="post-date">March 27, 2018</span>
                            </div>
                            <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$item->title}}</a></h3>
                        </div>
                    </div>
                    @endforeach


                </div>
                <!-- /post widget -->

               @include('layouts.partials.categories_tag_rightbar')
            </div>
            <!-- /aside -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->
@endsection
