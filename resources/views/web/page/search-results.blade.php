@extends('web.shop')
@section('title')
Search
@endsection
@section('stylesheets')
@endsection
@section('breadcrumb')
<ul>
    <li><a href="index.html">home</a></li>
    <li>shop</li>
    <li>search</li>
</ul>
@endsection
@section('content')
<div class="container">
    @if (session()->has('success_message'))
    <div class="alert alert-success">
        {{ session()->get('success_message')}}
    </div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
            <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="shop_area shop_reverse mt-60 mb-60">
    <div class="container">
        <div class="row">
            @include('web.layout.shop._sidebar')
            <div class="col-lg-9 col-md-12">
                <h3>Search results</h3>
                <p> result(s) for '{{request()->input('query')}}'</p>
                <hr>
                <div class="row shop_wrapper">
                    @forelse ($products as $item)
                    <div class="col-lg-4 col-md-4 col-12 ">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{route('shop.show',$item->slug)}}"><img
                                            src="{{asset('storage/'. cropedImage($item->image, 'croped'))}}" alt=""></a>
                                    <a class="secondary_img" href="{{route('shop.show',$item->slug,'croped')}}"><img
                                            src="{{asset('storage/'. cropedImage($item->image, 'croped'))}}" alt=""></a>
                                    <div class="label_product">
                                        <span class="label_sale">sale</span>
                                    </div>
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist">
                                                {{-- <a href="#" title="wishlisss"><span class="ion-levels"></span></a> --}}
                                                <form action="{{route('cart.addtowishlist', $item->id)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$item->id}}">
                                                    <input type="hidden" name="name" value="{{$item->name}}">
                                                    <input type="hidden" name="price" value="{{$item->price}}">
                                                    <a title="add to wishlist"><button type="submit"><i
                                                                class="fa fa-heart-o" aria-hidden="true"></i>
                                                        </button></a>
                                                </form>
                                                {{-- <a href="#" title="Add to Wishlist"><i class="fa fa-heart-o"
                                                                                                            aria-hidden="true"></i></a> --}}
                                            </li>
                                            <li class="compare"><a href="#" title="compare"><span
                                                        class="ion-levels"></span></a></li>
                                            <li class="quick_button"><a href="#" data-toggle="modal"
                                                    data-target="#modal_box" title="quick view"> <span
                                                        class="ion-ios-search-strong"></span></a></li>
                                        </ul>
                                    </div>
                                    <div class="add_to_cart">
                                        {{-- <a href="cart.html" title="add to cart">Add to cart</a> --}}
                                        <form action="{{route('cart.store')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <input type="hidden" name="name" value="{{$item->name}}">
                                            <input type="hidden" name="price" value="{{$item->price}}">
                                            <button type="submit">Add to cart</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="product_content grid_content">
                                    <div class="price_box">
                                        <span class="old_price" style="font-size:13px">{{$item->oldPrice()}}</span>
                                        <span class="current_price">{{$item->presentPrice()}}</span>
                                    </div>
                                    <div class="product_ratings">
                                        <ul>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                        </ul>
                                    </div>
                                    <h3 class="product_name grid_name"><a
                                            href="product-details.html">{{ Str::limit($item->description, 50, '
                                                                                                                ...')}}</a></h3>
                                </div>
                                <div class="product_content list_content">
                                    <div class="left_caption">
                                        <div class="price_box">
                                            <span class="old_price">$86.00</span>
                                            <span class="current_price">$79.00</span>
                                        </div>
                                        <h3 class="product_name"><a href="product-details.html">Natus erro at congue
                                                massa commodo sit</a></h3>
                                        <div class="product_ratings">
                                            <ul>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product_desc">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                ad minim veniam, quis nostrud exercitation ullamco,Proin lectus
                                                ipsum, gravida et mattis vulputate, tristique ut lectus</p>
                                        </div>
                                    </div>
                                    <div class="right_caption">
                                        <div class="add_to_cart">
                                            <a href="cart.html" title="add to cart">Add to cart</a>
                                        </div>
                                        <div class="action_links">
                                            <ul>
                                                <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                            class="fa fa-heart-o" aria-hidden="true"></i> Add to
                                                        Wishlist</a></li>
                                                <li class="compare"><a href="#" title="compare"><span
                                                            class="ion-levels"></span>
                                                        Compare</a>
                                                </li>
                                                <li class="quick_button"><a href="#" data-toggle="modal"
                                                        data-target="#modal_box" title="quick view"> <span
                                                            class="ion-ios-search-strong"></span> Quick View</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </figure>
                        </article>
                    </div>
                    @empty
                    <div class="container"> No Items found</div>
                    @endforelse
                </div>
                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        {{-- {{$products->links()}} --}}
                        {{ $products->appends(request()->input())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scriptjs')

<script>
</script>
@endsection