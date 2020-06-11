<div class="main_header">
    <!--header top start-->
    <div class="header_top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="support_info">
                        <p>Contact Center: <a href="tel:+6494461709">{{ setting('site.contact_center') }}</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="top_right text-right">
                        <ul>
                            @guest
                            <li><a href="{{route('register')}}"> Sign Up </a></li>
                            <li><a href="{{route('login')}}"> Login </a></li>
                            @else
                            <li><a href="{{ route('user.profilku') }}"><i class="fa fa-user-circle"></i> My Account</a></li>
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
                        <a href="index.html"><img src="{{('site/junko/assets/img/logo/logo.png')}}" alt=""></a>
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
                                {{-- {{ dd(Cart::subtotal()) }} --}}
                                <a href="#"><i class="fa fa-shopping-bag"
                                        aria-hidden="true"></i>{{ Cart::subtotal() > 0.00  ? $totalku : ''}} <i class="fa fa-angle-down"></i></a>
                                        
                                @if (Cart::instance('default')->count() > 0)
                                <span class="cart_quantity">{{Cart::instance('default')->count()}}</span>
                                @endif
                                <?php $itemgambar = array(); ?>
                                @foreach (Cart::content() as $item)
                                    <?php 
                                        $itemgambar[] = array('id' => $item->id, 'image' =>  productthumb($item->model->images)[0]);
                                    ?>
                                @endforeach
                                <keranjang :cartku="{{ Cart::content() }}" :imagecart="{{ json_encode($itemgambar)}}"
                                :subtotal="{{ json_encode(Cart::subtotal()) }}" :total="{{ json_encode(Cart::total()) }}"></keranjang>
                            </div>
                        </div>
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
                <div class="categories_menu categories_four">
                    <div class="categories_title">
                        <h2 class="categori_toggle">ALL CATEGORIES</h2>
                    </div>
                    <div class="categories_menu_toggle">
                        <ul>
                            @foreach ($kategoris as $item)
                            <li class="{{setActiveCategory($item->slug)}}">
                                <a href="{{route('shop.index', ['category' => $item->slug])}}"> {{$item->name}}</a>
                            </li>
                            @endforeach
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