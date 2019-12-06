@extends('web.app')
@section('title')
Home
@endsection
@section('content')
<div class="col-lg-9">
    <div class="home_right_section">

        <!--product area start-->
        <section class="product_area product_four_area mb-46">
            <div class="section_title">
                <h2>Computer & Laptop</h2>
            </div>
            <div class="product_slick product_slick_column4">
                @foreach ($products as $item)
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="{{route('shop.show',$item->slug)}}"><img
                                    src="{{asset('storage/'. cropedImage($item->image, 'croped'))}}" alt=""></a>
                            <a class="secondary_img" href="{{route('shop.show',$item->slug)}}"><img
                                    src="{{asset('storage/'. cropedImage($item->image, 'croped'))}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                    </li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                </ul>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class="old_price">{{$item->oldPrice()}}</span><br>
                                <span class="current_price">{{$item->presentPrice()}}</span>
                            </div>
                            <h3 class="product_name"><a href="product-details.html">
                                    {{-- {{$item->description}} --}}
                                    {{ Str::limit($item->description, 50, '
                                    ...')}}</a></h3>
                        </figcaption>
                    </figure>
                </article>
                @endforeach
            </div>
        </section>
        <!--product area end-->

        <!--banner area start-->
        <div class="banner_area mb-70">
            <div class="single_banner">
                <div class="banner_thumb">
                    <a href="shop.html"><img src="{{('site/junko/assets/img/bg/banner9.jpg')}}" alt=""></a>
                </div>
            </div>
        </div>
        <!--banner area end-->

        <!--product area start-->
        <section class="product_area product_four_bottom">
            <div class="section_title">
                <h2>Smartphone & Tablets</h2>
            </div>
            <div class="product_carousel product_column4 owl-carousel">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product1.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product2.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                    </li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                </ul>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class="old_price">$86.00</span>
                                <span class="current_price">$79.00</span>
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Natus erro at congue
                                    massa commodo sit</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product3.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product4.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                    </li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                </ul>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class="old_price">$86.00</span>
                                <span class="current_price">$79.00</span>
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Itaque earum velit
                                    elementum</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product5.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product6.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                    </li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                </ul>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class="old_price">$86.00</span>
                                <span class="current_price">$79.00</span>
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Mauris tincidunt
                                    eros posuere placerat</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product7.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product8.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                    </li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                </ul>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class="old_price">$86.00</span>
                                <span class="current_price">$79.00</span>
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Morbi ornare
                                    vestibulum massa</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product9.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product10.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                    </li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                </ul>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class="old_price">$86.00</span>
                                <span class="current_price">$79.00</span>
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Porro quisquam eget
                                    feugiat pretium</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product11.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product12.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                    </li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                </ul>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class="old_price">$86.00</span>
                                <span class="current_price">$79.00</span>
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Laudantium enim
                                    fringilla dignissim ipsum primis</a></h3>
                        </figcaption>
                    </figure>
                </article>
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a class="primary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product4.jpg')}}" alt=""></a>
                            <a class="secondary_img" href="product-details.html"><img
                                    src="{{('site/junko/assets/img/product/product5.jpg')}}" alt=""></a>
                            <div class="label_product">
                                <span class="label_sale">sale</span>
                            </div>
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i
                                                class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a>
                                    </li>
                                    <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box"
                                            title="quick view"> <span class="ion-ios-search-strong"></span></a></li>
                                </ul>
                            </div>
                            <div class="add_to_cart">
                                <a href="cart.html" title="add to cart">Add to cart</a>
                            </div>
                        </div>
                        <figcaption class="product_content">
                            <div class="price_box">
                                <span class="old_price">$86.00</span>
                                <span class="current_price">$79.00</span>
                            </div>
                            <h3 class="product_name"><a href="product-details.html">Natus erro at congue
                                    massa commodo sit</a></h3>
                        </figcaption>
                    </figure>
                </article>
            </div>
        </section>
        <!--product area end-->

        <!--banner area start-->
        <div class="banner_area mb-70">
            <div class="single_banner">
                <div class="banner_thumb">
                    <a href="shop.html"><img src="{{('site/junko/assets/img/bg/banner10.jpg')}}" alt=""></a>
                </div>
            </div>
        </div>
        <!--banner area end-->
    </div>
</div>
@endsection