@extends('web.shop')
@section('title')
Shop
@endsection
@section('stylesheets')
@endsection
@section('content')
<div class="shop_area shop_reverse mt-60 mb-60">
    <div class="container">
        <div class="row">
            @include('web.layout.shop._sidebar')
            <div class="col-lg-9 col-md-12">
                <!--shop wrapper start-->
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">

                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip"
                            title="3"></button>

                        <button data-role="grid_4" type="button" class="btn-grid-4" data-toggle="tooltip"
                            title="4"></button>

                        <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                            title="List"></button>
                    </div>
                    <div>
                        {{-- <strong> Price: </strong>
                        <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'low_high'])}}">Low
                        to High</a>
                        <a href="{{route('shop.index', ['category' => request()->category, 'sort' => 'high_low'])}}">High
                            to Low</a> --}}
                        {{-- {{dd(Request::get('sort'))}} --}}
                        {{-- {{dd(Request::get('sort') == "high_low" ? "ok" : "tidak")}} --}}
                        <select class="nice-select niceselect_option" name="orderby" id="shor">
                            @if (Request::get('sort') == "high_low")
                            <option value="high_low">Sort harga tertingi ke terendah</option>
                            <option value="low_high">Sort harga terendah ke tertinggi</option>
                            @elseif(Request::get('sort') == "low_high")
                            <option value="low_high">Sort harga terendah ke tertinggi</option>
                            <option value="high_low">Sort harga tertinggi ke terendah</option>
                            @else
                            <option value="low_high">Sort harga terendah ke tertinggi</option>
                            <option value="high_low">Sort harga tertinggi ke terendah</option>
                            @endif

                        </select>
                    </div>
                    <div class="page_amount">
                        <p>Showing 1–9 of 21 results</p>
                    </div>
                </div>
                <!--shop toolbar end-->
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
                                                    <a title="add to wishlist"><button
                                                        type="submit"><i class="fa fa-heart-o" aria-hidden="true"></i>
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
                                    <h3 class="product_name grid_name"><a href="product-details.html">{{ Str::limit($item->description, 50, '
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
                                                            class="ion-levels"></span> Compare</a>
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
                <!--shop toolbar end-->
                <!--shop wrapper end-->
            </div>
        </div>
    </div>
</div>
@endsection
@section('scriptjs')

<script>
    $(document).ready(function(){
        $('select[name="orderby"]').on("change", function() {
            var valu = $(this).val();
            if (valu == "low_high") {
                // $(this).addClass('selected');
                window.location.href = "{!! route('shop.index', ['category' => request()->category, 'sort' => 'low_high'])!!}"; 
            } else if (valu == "high_low") {
                // $(this).addClass('selected');
                window.location.href = "{!! route('shop.index', ['category' => request()->category, 'sort' => 'high_low'])!!}";                
            }
        });
    });

</script>
@endsection