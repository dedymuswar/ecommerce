@extends('web.shop')
@section('title')
Blog
@endsection
@section('stylesheets')
@endsection
@section('content')
<div class="blog_page_section mt-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="blog_wrapper">
                    <div class="blog_header">
                        {{-- <h1>Blog</h1> --}}
                    </div>
                    <div class="row">
                        @foreach ($posts as $item)
                        <div class="col-lg-6 col-md-6">
                            <article class="single_blog mb-60">
                                <figure>
                                    <div class="blog_thumb">
                                        <a href="blog-details.html"><img src="{{asset('storage/'.$item->image)}}"
                                                alt=""></a>
                                    </div>
                                    <figcaption class="blog_content">
                                        <h3><a href="{{route('blog.post',$item->slug)}}">{{$item->title}}</a></h3>
                                        <div class="blog_meta">
                                            <span class="author">Posted by : <a href="#">{{$item->user->name}}</a> /
                                            </span>
                                            <span class="post_date">On : <a
                                                    href="#">{{date('j M, Y', strtotime($item->created_at))}}</a></span>
                                        </div>
                                        <div class="blog_desc">
                                            {!! Str::limit($item->body, 250, ' ...')!!}
                                        </div>
                                        <footer class="readmore_button">
                                            <a href="{{route('blog.post',$item->slug)}}">read more</a>
                                        </footer>
                                    </figcaption>
                                </figure>
                            </article>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                @include('web.layout.blog._sidebar')
            </div>
        </div>
    </div>
</div>
@endsection