<!-- catagories -->
<div class="aside-widget">
    <div class="section-title">
        <h2>Catagories</h2>
    </div>
    <div class="category-widget">
        <ul>

            @foreach ($allNavbarCategories as $item)

            <li><a href="#" class="cat-{{$item->color}}">{{$item->name}}<span>35</span></a></li>
            @endforeach
        </ul>
    </div>
</div>
<!-- /catagories -->

<!-- tags -->
<div class="aside-widget">
    <div class="tags-widget">
        <ul>
            @foreach ($allTags as $item)
            <li><a href="{{route('tag',$item->slug)}}">{{$item->name}}</a></li>
            @endforeach

        </ul>
    </div>
</div>
<!-- /tags -->

<!-- archive -->
<div class="aside-widget">
    <div class="section-title">
        <h2>Archive</h2>
    </div>
    <div class="archive-widget">
        <ul>
            <li><a href="#">January 2018</a></li>
            <li><a href="#">Febuary 2018</a></li>
            <li><a href="#">March 2018</a></li>
        </ul>
    </div>
</div>
<!-- /archive -->
