@extends('web.shop')
@section('title')
Shop
@endsection
@section('stylesheets')
@endsection
@section('content')

<div class="shop_area shop_reverse mt-60 mb-60">
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
        <div class="row">
            @include('web.layout.shop._sidebar')
            <div class="col-lg-9 col-md-12">
                <!--shop toolbar start-->
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">

                        <button data-role="grid_3" type="button" class="btn-grid-3" data-toggle="tooltip"
                            title="3"></button>

                        <button data-role="grid_4" type="button" class="active btn-grid-4" data-toggle="tooltip"
                            title="4"></button>

                        {{-- <button data-role="grid_list" type="button" class="btn-list" data-toggle="tooltip"
                            title="List"></button> --}}
                    </div>
                    <div>
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
                        {{-- <sortproduk></sortproduk> --}}
                    </div>
                    <div class="page_amount">
                        <p>{{ $products->firstItem() }} of {{ $products->total() }} results</p>
                    </div>
                </div>
                <!--shop toolbar end-->
                <div class="row shop_wrapper grid_4">
                    @forelse ($products as $item)
                    <div class="col-lg-3 col-md-4 col-12 ">
                        <article class="single_product">
                            <figure>
                                <div class="product_thumb">
                                    @if (productthumb($item->images)[0])
                                    <a class="primary_img" href="{{route('shop.show',$item->slug)}}"><img
                                            src="{{asset('storage/'. productthumb($item->images)[0])}}" alt=""></a>
                                    @endif
                                    @if (!empty(productthumb($item->images)[1]))
                                    <a class="secondary_img" href="{{route('shop.show',$item->slug)}}"><img
                                            src="{{asset('storage/'. productthumb($item->images)[1])}}" alt=""></a>
                                    @endif
                                    <div class="label_product">
                                        @if ($item->newarrival)
                                        <span class="label_new">new</span>
                                        @else
                                        <span class="label_sale">sale</span>
                                        @endif
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
                                    {{-- <div class="product_variant quantity">
                                        <label>quantity</label>
                                        <input min="1" max="100" value="1" type="number">
                                        <form action="{{route('cart.store')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$products->id}}">
                                    <input type="hidden" name="name" value="{{$products->name}}">
                                    <input type="hidden" name="price" value="{{$products->price}}">
                                    <button class="button" type="submit">Add to cart</button>
                                    </form>
                                </div> --}}
                    </div>
                    <div class="product_content grid_content">
                        {{-- <div class="price_box">
                                        <span class="old_price" style="font-size:13px">{{$item->oldPrice()}}</span>
                        <span class="current_price">{{$item->presentPrice()}}</span>
                    </div> --}}
                    <div class="price_box">
                        <span>{{$item->name}}</span><br>
                        <span class="current_price">{{hargaFormat($item->price)}}</span>
                    </div>
                    <div class="product_ratings">
                        <ul>
                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                            <li><a href="#"><i class="ion-android-star"></i></a></li>
                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                            <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                        </ul>
                    </div>
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
                                <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span>
                                        Compare</a>
                                </li>
                                <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                        title="quick view"> <span class="ion-ios-search-strong"></span> Quick
                                        View</a>
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
        {{-- @if ($products->hasMorePages())             --}}
        <div class="shop_toolbar t_bottom">
            <div class="pagination">
                {{ $products->appends(request()->input())->links() }}
            </div>
        </div>
        {{-- @endif --}}
        <!--shop toolbar end-->
        <!--shop wrapper end-->
    </div>
</div>
</div>
</div>
@endsection
@section('scriptjs')
<script>
    // $(document).ready(function(){
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
    // });
</script>
@endsection