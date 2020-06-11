<section class="blog_section blog_section_four mb-70">
    <div class="section_title">
        <h2>From the Blog</h2>
    </div>
    <div class="blog_carousel blog_column1 owl-carousel">
        @foreach ($posts as $post)
        <article class="single_blog">
            <figure>
                <div class="blog_thumb">
                    <a href="{{route('blog.post',$post->slug)}}"><img src="{{asset('storage/'.$post->image)}}"
                            alt=""></a>
                </div>

                <figcaption class="blog_content">
                    <p class="post_author">By <a href="#">{{$post->user->name}} </a>
                        {{date('j M, Y', strtotime($post->created_at))}}
                    </p>
                    <h3 class="post_title"><a href="{{route('blog.post',$post->slug)}}">{{$post->title}}</a>
                    </h3>
                    <p class="post_desc">{!! Str::limit($post->body, 150, ' ...')!!}</p>
                </figcaption>

            </figure>
        </article>
        @endforeach
    </div>
</section>