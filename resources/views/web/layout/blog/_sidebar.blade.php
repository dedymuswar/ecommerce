<div class="blog_sidebar_widget">
    <div class="widget_list widget_search">
        <h3>Search</h3>
        <form action="#">
            <input placeholder="Search..." type="text">
            <button type="submit">search</button>
        </form>
    </div>
    <div class="widget_list widget_post">
        <h3>Recent Posts</h3>
        @foreach ($recent as $item)
        <div class="post_wrapper">
            <div class="post_thumb">
                <a href="{{route('blog.post',$item->slug)}}"><img src="{{asset('storage/'.$item->image)}}" alt=""></a>
            </div>
            <div class="post_info">
                <h3><a href="{{route('blog.post',$item->slug)}}">{{$item->title}}</a></h3>
                <span>{{date('j M, Y', strtotime($item->created_at))}} </span>
            </div>
        </div>
        @endforeach

    </div>
    <div class="widget_list widget_categories">
        <h3>Archives</h3>
        <ul>
            <li><a href="#">April 2019</a></li>
        </ul>
    </div>
</div>