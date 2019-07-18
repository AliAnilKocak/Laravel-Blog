<!-- Header -->
<header id="header">
    <!-- Nav -->
    <div id="nav">
        <!-- Main Nav -->
        <div id="nav-fixed">
            <div class="container">
                <!-- logo -->
                <div class="nav-logo">
                    <a href="{{route('homepage')}}" class="logo"><img src="/img/b.png" alt=""></a>
                </div>
                <!-- /logo -->

                <!-- nav -->
                <ul class="nav-menu nav navbar-nav">
                    @foreach ($allNavbarCategories as $item)
                    <li class="cat-{{$item->color}}"><a href="{{route('navbar',$item->slug)}}">{{$item->name}}</a></li>
                    @endforeach

                </ul>
                <!-- /nav -->

                <!-- search & aside toggle -->
                <div class="nav-btns">
                    <button class="aside-btn"><i class="fa fa-bars"></i></button>
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                    <div class="search-form">
                        <input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
                        <button class="search-close"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /search & aside toggle -->
            </div>
        </div>
        <!-- /Main Nav -->

        <!-- Aside Nav -->
        <div id="nav-aside">
            <!-- nav -->
            <div class="section-row">
                <ul class="nav-aside-menu">
                    <li><a href="{{route('homepage')}}">Home</a></li>
                    <li><a href="{{route('about')}}">About Us</a></li>
                    <li><a href="{{route('contact')}}">Contacts</a></li>
                    @foreach ($allNavbarCategories as $item)
                    <li><a href="{{route('navbar',$item->slug)}}">{{$item->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- /nav -->

            <!-- widget posts -->
            <div class="section-row">
                <h3>Recent Posts</h3>
                @foreach ($show_featured_boot as $item)
                <div class="post post-widget">
                    <a class="post-img" href="{{route('post',$item->slug)}}"><img src="{{$item->img}}" alt=""></a>
                    <div class="post-body">
                        <h3 class="post-title"><a href="{{route('post',$item->slug)}}">{{$item->title}}</a></h3>
                    </div>
                </div>
                @endforeach


            </div>
            <!-- /widget posts -->

            <!-- social links -->
            <div class="section-row">
                <h3>Follow us</h3>
                <ul class="nav-aside-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
            </div>
            <!-- /social links -->

            <!-- aside nav close -->
            <button class="nav-aside-close"><i class="fa fa-times"></i></button>
            <!-- /aside nav close -->
        </div>
        <!-- Aside Nav -->
    </div>
    <!-- /Nav -->
</header>
<!-- /Header -->
