<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from demo.hasthemes.com/junko-preview/junko/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 01:50:33 GMT -->

<head>
    @include('web.layout._head')
    @yield('stylesheets')
</head>

<body>

    <!--header area start-->

    <!--Offcanvas menu area start-->
    <div class="off_canvars_overlay">

    </div>
    <div class="Offcanvas_menu">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="canvas_open">
                        <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
                    </div>
                    <div class="Offcanvas_menu_wrapper">
                        <div class="canvas_close">
                            <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
                        </div>
                        <div class="support_info">
                            <p>Telephone Enquiry: <a href="tel:+6494461709">(012) 800 456 789 – 987</a></p>
                        </div>
                        <div class="top_right text-right">
                            <ul>
                                <li><a href="my-account.html"> My Account </a></li>
                                <li><a href="checkout.html"> Checkout </a></li>
                            </ul>
                        </div>
                        <div class="search_container">
                            <form action="#">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori">
                                        <option selected value="1">All Categories</option>
                                        <option value="2">Accessories</option>
                                        <option value="3">Accessories & More</option>
                                        <option value="4">Butters & Eggs</option>
                                        <option value="5">Camera & Video </option>
                                        <option value="6">Mornitors</option>
                                        <option value="7">Tablets</option>
                                        <option value="8">Laptops</option>
                                        <option value="9">Handbags</option>
                                        <option value="10">Headphone & Speaker</option>
                                        <option value="11">Herbs & botanicals</option>
                                        <option value="12">Vegetables</option>
                                        <option value="13">Shop</option>
                                        <option value="14">Laptops & Desktops</option>
                                        <option value="15">Watchs</option>
                                        <option value="16">Electronic</option>
                                    </select>
                                </div>
                                <div class="search_box">
                                    <input placeholder="Search product..." type="text">
                                    <button type="submit">Search</button>
                                </div>
                            </form>
                        </div>

                        <div class="middel_right_info">
                            <div class="header_wishlist">
                                <a href="wishlist.html"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                <span class="wishlist_quantity">3</span>
                            </div>
                            <div class="mini_cart_wrapper">
                                <a href="javascript:void(0)"><i class="fa fa-shopping-bag"
                                        aria-hidden="true"></i>$147.00 <i class="fa fa-angle-down"></i></a>
                                <span class="cart_quantity">2</span>
                                <!--mini cart-->
                                <div class="mini_cart">
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="{{('site/junko/assets/img/s-product/product.jpg')}}"
                                                    alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Sit voluptatem rhoncus sem lectus</a>
                                            <p>Qty: 1 X <span> $60.00 </span></p>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="cart_item">
                                        <div class="cart_img">
                                            <a href="#"><img src="{{('site/junko/assets/img/s-product/product2.jpg')}}"
                                                    alt=""></a>
                                        </div>
                                        <div class="cart_info">
                                            <a href="#">Natus erro at congue massa commodo</a>
                                            <p>Qty: 1 X <span> $60.00 </span></p>
                                        </div>
                                        <div class="cart_remove">
                                            <a href="#"><i class="ion-android-close"></i></a>
                                        </div>
                                    </div>
                                    <div class="mini_cart_table">
                                        <div class="cart_total">
                                            <span>Sub total:</span>
                                            <span class="price">$138.00</span>
                                        </div>
                                        <div class="cart_total mt-10">
                                            <span>total:</span>
                                            <span class="price">$138.00</span>
                                        </div>
                                    </div>

                                    <div class="mini_cart_footer">
                                        <div class="cart_button">
                                            <a href="cart.html">View cart</a>
                                        </div>
                                        <div class="cart_button">
                                            <a href="checkout.html">Checkout</a>
                                        </div>

                                    </div>

                                </div>
                                <!--mini cart end-->
                            </div>
                        </div>
                        <div id="menu" class="text-left ">
                            <ul class="offcanvas_main_menu">
                                <li class="menu-item-has-children active">
                                    <a href="#">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">Shop</a>
                                    <ul class="sub-menu">
                                        <li class="menu-item-has-children">
                                            <a href="#">Shop Layouts</a>
                                            <ul class="sub-menu">
                                                <li><a href="shop.html">shop</a></li>
                                                <li><a href="shop-fullwidth.html">Full Width</a></li>
                                                <li><a href="shop-fullwidth-list.html">Full Width list</a></li>
                                                <li><a href="shop-right-sidebar.html">Right Sidebar </a></li>
                                                <li><a href="shop-right-sidebar-list.html"> Right Sidebar list</a></li>
                                                <li><a href="shop-list.html">List View</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">other Pages</a>
                                            <ul class="sub-menu">
                                                <li><a href="cart.html">cart</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="my-account.html">my account</a></li>
                                                <li><a href="404.html">Error 404</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children">
                                            <a href="#">Product Types</a>
                                            <ul class="sub-menu">
                                                <li><a href="product-details.html">product details</a></li>
                                                <li><a href="product-sidebar.html">product sidebar</a></li>
                                                <li><a href="product-grouped.html">product grouped</a></li>
                                                <li><a href="variable-product.html">product variable</a></li>
                                                <li><a href="product-countdown.html">product countdown</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog.html">blog</a></li>
                                        <li><a href="blog-details.html">blog details</a></li>
                                        <li><a href="blog-fullwidth.html">blog fullwidth</a></li>
                                        <li><a href="blog-sidebar.html">blog left sidebar</a></li>
                                        <li><a href="blog-no-sidebar.html">blog no sidebar</a></li>
                                    </ul>

                                </li>
                                <li class="menu-item-has-children">
                                    <a href="#">pages </a>
                                    <ul class="sub-menu">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="services.html">services</a></li>
                                        <li><a href="privacy-policy.html">privacy policy</a></li>
                                        <li><a href="faq.html">Frequently Questions</a></li>
                                        <li><a href="contact.html">contact</a></li>
                                        <li><a href="login.html">login</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="my-account.html">my account</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="about.html">about Us</a>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="contact.html"> Contact Us</a>
                                </li>
                            </ul>
                        </div>

                        <div class="Offcanvas_footer">
                            <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
                            <ul>
                                <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Offcanvas menu area end-->
    <header>
        @include('web.layout._header')
    </header>
    <!--header area end-->

    <!--sticky header area start-->
    <div class="sticky_header_area sticky-header">
        @include('web.layout._navbar')
    </div>
    <!--sticky header area end-->

    <!--slider area start-->
    @include('web.layout._slider')
    <!--slider area end-->

    <!--hoem section four area start-->
    <div class="home_section_four">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="home_left_section">

                        <!--deals product four area start-->
                        <div class="deals_product_four">
                            <div class="section_title">
                                <h2>Hot Deals Products</h2>
                            </div>
                            <div class="product_carousel product_column1 owl-carousel">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-countdown.html"><img
                                                    src="{{('site/junko/assets/img/product/product1.jpg')}}" alt=""></a>
                                            <a class="secondary_img" href="product-countdown.html"><img
                                                    src="{{('site/junko/assets/img/product/product2.jpg')}}" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">sale</span>
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="wishlist"><a href="wishlist.html"
                                                            title="Add to Wishlist"><i class="fa fa-heart-o"
                                                                aria-hidden="true"></i></a></li>
                                                    <li class="compare"><a href="#" title="compare"><span
                                                                class="ion-levels"></span></a></li>
                                                    <li class="quick_button"><a href="#" data-toggle="modal"
                                                            data-target="#modal_box" title="quick view"> <span
                                                                class="ion-ios-search-strong"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart">Add to cart</a>
                                            </div>
                                            <div class="product_timing">
                                                <div data-countdown="2023/12/15"></div>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-countdown.html">Natus erro at
                                                    congue massa commodo sit</a></h3>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-countdown.html"><img
                                                    src="{{('site/junko/assets/img/product/product3.jpg')}}" alt=""></a>
                                            <a class="secondary_img" href="product-countdown.html"><img
                                                    src="{{('site/junko/assets/img/product/product4.jpg')}}" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">sale</span>
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="wishlist"><a href="wishlist.html"
                                                            title="Add to Wishlist"><i class="fa fa-heart-o"
                                                                aria-hidden="true"></i></a></li>
                                                    <li class="compare"><a href="#" title="compare"><span
                                                                class="ion-levels"></span></a></li>
                                                    <li class="quick_button"><a href="#" data-toggle="modal"
                                                            data-target="#modal_box" title="quick view"> <span
                                                                class="ion-ios-search-strong"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart">Add to cart</a>
                                            </div>
                                            <div class="product_timing">
                                                <div data-countdown="2023/12/15"></div>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-countdown.html">Itaque earum velit
                                                    elementum</a></h3>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-countdown.html"><img
                                                    src="{{('site/junko/assets/img/product/product5.jpg')}}" alt=""></a>
                                            <a class="secondary_img" href="product-countdown.html"><img
                                                    src="{{('site/junko/assets/img/product/product6.jpg')}}" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">sale</span>
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="wishlist"><a href="wishlist.html"
                                                            title="Add to Wishlist"><i class="fa fa-heart-o"
                                                                aria-hidden="true"></i></a></li>
                                                    <li class="compare"><a href="#" title="compare"><span
                                                                class="ion-levels"></span></a></li>
                                                    <li class="quick_button"><a href="#" data-toggle="modal"
                                                            data-target="#modal_box" title="quick view"> <span
                                                                class="ion-ios-search-strong"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart">Add to cart</a>
                                            </div>
                                            <div class="product_timing">
                                                <div data-countdown="2023/12/15"></div>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-countdown.html">Mauris tincidunt
                                                    eros posuere placerat</a></h3>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-countdown.html"><img
                                                    src="{{('site/junko/assets/img/product/product7.jpg')}}" alt=""></a>
                                            <a class="secondary_img" href="product-countdown.html"><img
                                                    src="{{('site/junko/assets/img/product/product8.jpg')}}" alt=""></a>
                                            <div class="label_product">
                                                <span class="label_sale">sale</span>
                                            </div>
                                            <div class="action_links">
                                                <ul>
                                                    <li class="wishlist"><a href="wishlist.html"
                                                            title="Add to Wishlist"><i class="fa fa-heart-o"
                                                                aria-hidden="true"></i></a></li>
                                                    <li class="compare"><a href="#" title="compare"><span
                                                                class="ion-levels"></span></a></li>
                                                    <li class="quick_button"><a href="#" data-toggle="modal"
                                                            data-target="#modal_box" title="quick view"> <span
                                                                class="ion-ios-search-strong"></span></a></li>
                                                </ul>
                                            </div>
                                            <div class="add_to_cart">
                                                <a href="cart.html" title="add to cart">Add to cart</a>
                                            </div>
                                            <div class="product_timing">
                                                <div data-countdown="2023/12/15"></div>
                                            </div>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-countdown.html">Morbi ornare
                                                    vestibulum massa</a></h3>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <!--deals product area end-->

                        <!--small product area-->
                        <div class="small_product_area small_product_four">
                            <div class="section_title">
                                <h2><span> New Arrivals </span></h2>
                            </div>
                            <div class="small_product_container small_product_active">
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product1.jpg')}}" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product2.jpg')}}" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem
                                                    rhoncus sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
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
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Nullam maximus eget
                                                    nisi dignissim</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
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
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Natus erro at congue
                                                    commodo sit</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
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
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Convallis quam sit
                                                    vitae neque ornare</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product9.jpg')}}" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product10.jpg')}}"
                                                    alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Mirum est notare
                                                    nibh iaculis pretium</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product11.jpg')}}"
                                                    alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product12.jpg')}}"
                                                    alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Pellentesque
                                                    ultricies suscipit est</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product1.jpg')}}" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product2.jpg')}}" alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Sit voluptatem
                                                    rhoncus sem lectus</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
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
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Nullam maximus eget
                                                    nisi dignissim</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
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
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Natus erro at congue
                                                    commodo sit</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
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
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Convallis quam sit
                                                    vitae neque ornare</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product9.jpg')}}" alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product10.jpg')}}"
                                                    alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Mirum est notare
                                                    nibh iaculis pretium</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_product">
                                    <figure>
                                        <div class="product_thumb">
                                            <a class="primary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product11.jpg')}}"
                                                    alt=""></a>
                                            <a class="secondary_img" href="product-details.html"><img
                                                    src="{{('site/junko/assets/img/product/product12.jpg')}}"
                                                    alt=""></a>
                                        </div>
                                        <figcaption class="product_content">
                                            <div class="price_box">
                                                <span class="old_price">$86.00</span>
                                                <span class="current_price">$79.00</span>
                                            </div>
                                            <h3 class="product_name"><a href="product-details.html">Pellentesque
                                                    ultricies suscipit est</a></h3>
                                            <div class="product_ratings">
                                                <ul>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                    <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </div>
                        <!--small product end-->

                        <!--blog area start-->
                        <section class="blog_section blog_section_four mb-70">
                            <div class="section_title">
                                <h2>From the Blog</h2>
                            </div>
                            <div class="blog_carousel blog_column1 owl-carousel">
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="blog-details.html"><img
                                                    src="{{('site/junko/assets/img/blog/blog1.jpg')}}" alt=""></a>
                                        </div>
                                        <figcaption class="blog_content">
                                            <p class="post_author">By <a href="#">admin</a> April 06, 2019</p>
                                            <h3 class="post_title"><a href="blog-details.html">Blog image post</a></h3>
                                            <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl.
                                                Cras pretium arcu ex. Aenean posuere libero eu augue condimentum
                                                rhoncus. Praesent</p>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="blog-details.html"><img
                                                    src="{{('site/junko/assets/img/blog/blog2.jpg')}}" alt=""></a>
                                        </div>
                                        <figcaption class="blog_content">
                                            <p class="post_author">By <a href="#">admin</a> April 06, 2019</p>
                                            <h3 class="post_title"><a href="blog-details.html">Post with Gallery</a>
                                            </h3>
                                            <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl.
                                                Cras pretium arcu ex. Aenean posuere libero eu augue condimentum
                                                rhoncus. Praesent</p>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="blog-details.html"><img
                                                    src="{{('site/junko/assets/img/blog/blog3.jpg')}}" alt=""></a>
                                        </div>
                                        <figcaption class="blog_content">
                                            <p class="post_author">By <a href="#">admin</a> April 06, 2019</p>
                                            <h3 class="post_title"><a href="blog-details.html">Post with Audio</a></h3>
                                            <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl.
                                                Cras pretium arcu ex. Aenean posuere libero eu augue condimentum
                                                rhoncus. Praesent</p>
                                        </figcaption>
                                    </figure>
                                </article>
                                <article class="single_blog">
                                    <figure>
                                        <div class="blog_thumb">
                                            <a href="blog-details.html"><img
                                                    src="{{('site/junko/assets/img/blog/blog4.jpg')}}" alt=""></a>
                                        </div>
                                        <figcaption class="blog_content">
                                            <p class="post_author">By <a href="#">admin</a> April 06, 2019</p>
                                            <h3 class="post_title"><a href="blog-details.html">Post with Video</a></h3>
                                            <p class="post_desc">Donec vitae hendrerit arcu, sit amet faucibus nisl.
                                                Cras pretium arcu ex. Aenean posuere libero eu augue condimentum
                                                rhoncus. Praesent</p>
                                        </figcaption>
                                    </figure>
                                </article>
                            </div>
                        </section>
                        <!--blog area end-->
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    <!--hoem section four area end-->

    <!--shipping area start-->
    @include('web.layout._bottom')
    <!--shipping area end-->

    <!--footer area start-->
    <footer class="footer_widgets">
        @include('web.layout._footer')
    </footer>
    <!--footer area end-->

    <!-- modal area start-->
    <div class="modal fade" id="modal_box" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal_body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-5 col-sm-12">
                                <div class="modal_tab">
                                    <div class="tab-content product-details-large">
                                        <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img
                                                        src="{{('site/junko/assets/img/product/product1.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img
                                                        src="{{('site/junko/assets/img/product/product2.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img
                                                        src="{{('site/junko/assets/img/product/product3.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab4" role="tabpanel">
                                            <div class="modal_tab_img">
                                                <a href="#"><img
                                                        src="{{('site/junko/assets/img/product/product5.jpg')}}"
                                                        alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal_tab_button">
                                        <ul class="nav product_navactive owl-carousel" role="tablist">
                                            <li>
                                                <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab"
                                                    aria-controls="tab1" aria-selected="false"><img
                                                        src="{{('site/junko/assets/img/product/product1.jpg')}}"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab2" role="tab"
                                                    aria-controls="tab2" aria-selected="false"><img
                                                        src="{{('site/junko/assets/img/product/product2.jpg')}}"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link button_three" data-toggle="tab" href="#tab3"
                                                    role="tab" aria-controls="tab3" aria-selected="false"><img
                                                        src="{{('site/junko/assets/img/product/product3.jpg')}}"
                                                        alt=""></a>
                                            </li>
                                            <li>
                                                <a class="nav-link" data-toggle="tab" href="#tab4" role="tab"
                                                    aria-controls="tab4" aria-selected="false"><img
                                                        src="{{('site/junko/assets/img/product/product5.jpg')}}"
                                                        alt=""></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12">
                                <div class="modal_right">
                                    <div class="modal_title mb-10">
                                        <h2>Handbag feugiat</h2>
                                    </div>
                                    <div class="modal_price mb-10">
                                        <span class="new_price">$64.99</span>
                                        <span class="old_price">$78.99</span>
                                    </div>
                                    <div class="modal_description mb-15">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste
                                            laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam
                                            in quos qui nemo ipsum numquam, reiciendis maiores quidem aperiam, rerum vel
                                            recusandae </p>
                                    </div>
                                    <div class="variants_selects">
                                        <div class="variants_size">
                                            <h2>size</h2>
                                            <select class="select_option">
                                                <option selected value="1">s</option>
                                                <option value="1">m</option>
                                                <option value="1">l</option>
                                                <option value="1">xl</option>
                                                <option value="1">xxl</option>
                                            </select>
                                        </div>
                                        <div class="variants_color">
                                            <h2>color</h2>
                                            <select class="select_option">
                                                <option selected value="1">purple</option>
                                                <option value="1">violet</option>
                                                <option value="1">black</option>
                                                <option value="1">pink</option>
                                                <option value="1">orange</option>
                                            </select>
                                        </div>
                                        <div class="modal_add_to_cart">
                                            <form action="#">
                                                <input min="0" max="100" step="2" value="1" type="number">
                                                <button type="submit">add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="modal_social">
                                        <h2>Share this product</h2>
                                        <ul>
                                            <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                            <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a>
                                            </li>
                                            <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- modal area end-->


    @include('web.layout._foot')


</body>


<!-- Mirrored from demo.hasthemes.com/junko-preview/junko/index-4.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Oct 2019 01:50:41 GMT -->

</html>