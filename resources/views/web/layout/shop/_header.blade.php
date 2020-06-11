<div class="main_header">
    <!--header top start-->
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="support_info">
                        <p>Telephone Enquiry: <a href="tel:+6494461709">{{ setting('site.contact_center') }}</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="top_right text-right">
                        <ul>
                            @guest
                            <li><a href="{{route('register')}}"> Sign Up </a></li>
                            <li><a href="{{route('login')}}"> Login </a></li>
                            @else
                            <li>
                                <a href="{{ route('user.profilku') }}"><i class="fa fa-user-circle"></i> My Account</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header top start-->

    <!--header middel start-->
    <div class="header_middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-6">
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('site/junko/assets/img/logo/logo.png')}}" alt=""></a>
                    </div>
                </div>
                <?php $totalku = "Rp".substr(Cart::subtotal(),0,-7)."K"?>
                <div class="col-lg-9 col-md-6">
                    <div class="middel_right">
                        <div class="search_container">
                            {{-- @include('partial.search') --}}
                        </div>
                        <div class="middel_right_info">
                            <div class="header_wishlist">
                                <a href="{{route('wishlist.index')}}"><i class="fa fa-heart-o" aria-hidden="true"></i>
                                    wishlist</a>
                                @if (Cart::instance('saveForLater')->count() > 0)
                                <span class="wishlist_quantity">{{Cart::instance('saveForLater')->count()}}</span>
                                @endif
                            </div>

                            <div class="mini_cart_wrapper">
                                <a href="#"><i class="fa fa-shopping-bag" aria-hidden="true"></i>{{ Cart::subtotal() > 0.00  ? $totalku : '' }} <i
                                        class="fa fa-angle-down"></i></a>

                                @if (Cart::instance('default')->count() > 0)
                                <span class="cart_quantity">{{Cart::instance('default')->count()}}</span>
                                @endif
                                <?php $itemgambar = array(); ?>
                                @foreach (Cart::content() as $item)
                                <?php 
                                                        $itemgambar[] = array('id' => $item->id, 'image' => productthumb($item->model->images)[0]);
                                                    ?>
                                @endforeach
                                <keranjang :cartku="{{ Cart::content() }}" :imagecart="{{ json_encode($itemgambar)}}"
                                    :subtotal="{{ json_encode(Cart::subtotal()) }}"
                                    :total="{{ json_encode(Cart::total()) }}">
                                </keranjang>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header middel end-->

    <!--header bottom satrt-->
    <div class="main_menu_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-12">
                    <div class="categories_menu">
                        <div class="categories_title">
                            <h2 class="categori_toggle">ALL CATEGORIES</h2>
                        </div>
                        {{-- <div class="categories_menu_toggle">
                            <ul>
                                <li class="menu_item_children"><a href="#">Brake Parts <i
                                            class="fa fa-angle-right"></i></a>
                                    <ul class="categories_mega_menu">
                                        <li class="menu_item_children"><a href="#">Dresses</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Sweater</a></li>
                                                <li><a href="#">Evening</a></li>
                                                <li><a href="#">Day</a></li>
                                                <li><a href="#">Sports</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#">Handbags</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Shoulder</a></li>
                                                <li><a href="#">Satchels</a></li>
                                                <li><a href="#">kids</a></li>
                                                <li><a href="#">coats</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#">shoes</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Ankle Boots</a></li>
                                                <li><a href="#">Clog sandals </a></li>
                                                <li><a href="#">run</a></li>
                                                <li><a href="#">Books</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#">Clothing</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Coats Jackets </a></li>
                                                <li><a href="#">Raincoats</a></li>
                                                <li><a href="#">Jackets</a></li>
                                                <li><a href="#">T-shirts</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu_item_children"><a href="#"> Wheels & Tires <i
                                            class="fa fa-angle-right"></i></a>
                                    <ul class="categories_mega_menu column_3">
                                        <li class="menu_item_children"><a href="#">Chair</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Dining room</a></li>
                                                <li><a href="#">bedroom</a></li>
                                                <li><a href="#"> Home & Office</a></li>
                                                <li><a href="#">living room</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#">Lighting</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Ceiling Lighting</a></li>
                                                <li><a href="#">Wall Lighting</a></li>
                                                <li><a href="#">Outdoor Lighting</a></li>
                                                <li><a href="#">Smart Lighting</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#">Sofa</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Fabric Sofas</a></li>
                                                <li><a href="#">Leather Sofas</a></li>
                                                <li><a href="#">Corner Sofas</a></li>
                                                <li><a href="#">Sofa Beds</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu_item_children"><a href="#"> Furnitured & Decor <i
                                            class="fa fa-angle-right"></i></a>
                                    <ul class="categories_mega_menu column_2">
                                        <li class="menu_item_children"><a href="#">Brake Tools</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Driveshafts</a></li>
                                                <li><a href="#">Spools</a></li>
                                                <li><a href="#">Diesel </a></li>
                                                <li><a href="#">Gasoline</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#">Emergency Brake</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Dolls for Girls</a></li>
                                                <li><a href="#">Girls' Learning Toys</a></li>
                                                <li><a href="#">Arts and Crafts for Girls</a></li>
                                                <li><a href="#">Video Games for Girls</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu_item_children"><a href="#"> Turbo System <i
                                            class="fa fa-angle-right"></i></a>
                                    <ul class="categories_mega_menu column_2">
                                        <li class="menu_item_children"><a href="#">Check Trousers</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Building</a></li>
                                                <li><a href="#">Electronics</a></li>
                                                <li><a href="#">action figures </a></li>
                                                <li><a href="#">specialty & boutique toy</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu_item_children"><a href="#">Calculators</a>
                                            <ul class="categorie_sub_menu">
                                                <li><a href="#">Dolls for Girls</a></li>
                                                <li><a href="#">Girls' Learning Toys</a></li>
                                                <li><a href="#">Arts and Crafts for Girls</a></li>
                                                <li><a href="#">Video Games for Girls</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="#"> Lighting</a></li>
                                <li><a href="#"> Accessories</a></li>
                                <li><a href="#">Body Parts</a></li>
                                <li><a href="#">Perfomance Filters</a></li>
                                <li><a href="#"> Engine Parts</a></li>
                                <li id="cat_toggle" class="has-sub"><a href="#"> More Categories</a>
                                    <ul class="categorie_sub">
                                        <li><a href="#">Hide Categories</a></li>
                                    </ul>

                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="main_menu menu_position">
                        <nav>
                            {{menu('main')}}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--header bottom end-->
</div>