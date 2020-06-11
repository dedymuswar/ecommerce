@extends('web.shop')
@section('title')
detail Blog
@endsection

@section('content')

<div class="blog_details mt-60">
    <div class="container">
        <div class="row">

            <div class="col-lg-9 col-md-12">
                <!--blog grid area start-->
                <div class="blog_wrapper">
                    <article class="single_blog">
                        <figure>
                            <div class="post_header">
                                <h3 class="post_title">{{$post->title}}</h3>
                                <div class="blog_meta">
                                    <span class="author">Posted by : <a href="#">{{$post->user->name}}</a> / </span>
                                    <span class="post_date">On : <a
                                            href="#">{{date('j M, Y', strtotime($post->created_at))}}</a> </span>
                                    {{-- <span class="post_category">In : <a href="#">Company, Image, Travel</a></span> --}}
                                </div>
                            </div>
                            <div class="blog_thumb">
                                <a href="#"><img src="{{asset('storage/'.$post->image)}}" alt=""></a>
                            </div>
                            <figcaption class="blog_content">
                                <div class="post_content">
                                    {!!$post->body!!}
                                </div>
                                <div class="entry_content">
                                    <div class="post_meta">
                                        <span>Tags: </span>
                                        <span><a href="#">, fashion</a></span>
                                        <span><a href="#">, t-shirt</a></span>
                                        <span><a href="#">, white</a></span>
                                    </div>

                                    <div class="social_sharing">
                                        <p>share this post:</p>
                                        <ul>
                                            <li><a href="#" title="facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li><a href="#" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                            <li><a href="#" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
                                            <li><a href="#" title="google+"><i class="fa fa-google-plus"></i></a></li>
                                            <li><a href="#" title="linkedin"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
                    </article>
                    <div class="related_posts">
                        <h3>Related posts</h3>
                        <div class="row">
                            @foreach ($relatedBlog as $blog)
                            <div class="col-lg-4 col-md-6">
                                <article class="single_related">
                                    <figure>
                                        <div class="related_thumb">
                                            <img src="{{asset('storage/'.$blog->image)}}" alt="">
                                        </div>
                                        <figcaption class="related_content">
                                            <div class="blog_meta">
                                                <span class="author">By : <a href="#">{{$blog->user->name}}</a> /
                                                </span>
                                                <span class="post_date">
                                                    {{date('j M, Y', strtotime($post->created_at))}} </span>
                                            </div>
                                            <h4><a href="{{route('blog.post',$blog->slug)}}">{{$blog->title}}</a></h4>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>

                            @endforeach
                        </div>
                    </div>


                </div>
                <!--blog grid area start-->
            </div>
            <div class="col-lg-3 col-md-12">
                @include('web.layout.blog._sidebar')
            </div>
        </div>
    </div>
</div>

@endsection