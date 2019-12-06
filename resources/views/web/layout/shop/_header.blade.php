<div class="main_header">
    <!--header top start-->
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="support_info">
                        <p>Telephone Enquiry: <a href="tel:+6494461709">(012) 800 456 789 – 987</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="top_right text-right">
                        <ul>
                            @guest
                            <li><a href="{{route('register')}}"> Sign Up </a></li>
                            <li><a href="{{route('login')}}"> Login </a></li>
                            @else
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                                                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

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
                <div class="col-lg-9 col-md-6">
                    <div class="middel_right">
                        <div class="search_container">
                            <form action="#">
                                <div class="hover_category">
                                    <select class="select_option" name="select" id="categori1">
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
                                <a href="{{route('wishlist.index')}}"><i class="fa fa-heart-o"
                                        aria-hidden="true"></i></a>
                                @if (Cart::instance('saveForLater')->count() > 0)
                                <span class="wishlist_quantity">{{Cart::instance('saveForLater')->count()}}</span>
                                @endif
                            </div>
                            <div class="mini_cart_wrapper">
                                <a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag"
                                        aria-hidden="true"></i>Cart</a>
                                @if (Cart::instance('default')->count() > 0)
                                <span class="cart_quantity">{{Cart::instance('default')->count()}}</span>
                                @endif
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
                        <div class="categories_menu_toggle">
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
                        </div>
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