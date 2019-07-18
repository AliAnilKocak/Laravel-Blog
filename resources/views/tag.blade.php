@extends('layouts.master')
@section('title','Home')
@section('content')

<!-- container -->
<div class="container">
    <!-- row -->
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="clearfix visible-md visible-lg"></div>
                <!-- ad -->
                <div class="col-md-12">
                    <div class="section-row">
                        <a href="#">
                            <img class="img-responsive center-block" src="/img/ad-2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- ad -->

                @foreach ($posts as $item)
                <!-- post -->
                <div class="col-md-12">
                    <div class="post post-row">
                        <a class="post-img" href="{{route('post',$item->slug)}}"><img src="{{$item->img}}" alt=""></a>
                        <div class="post-body">
                            <div class="post-meta">
                                <a class="post-category cat-2" href="#">{{$tag->name}}</a>
                                <span class="post-date">{{$item->created_at}}</span>
                            </div>
                            <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$item->title}}</a>
                            </h3>
                            <p>{{$item->description}}...</p>
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
                    <a class="post-img" href="{{route('post',$item->slug)}}l"><img src="{{$item->img}}" alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$item->title}}</a></h3>
                    </div>
                </div>
                @endforeach


            </div>
            <!-- /post widget -->
            @include('layouts.partials.categories_tag_rightbar')
        </div>
    </div>
    <!-- /row -->
</div>
<!-- /container -->

@endsection
