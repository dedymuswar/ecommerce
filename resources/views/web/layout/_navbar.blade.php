<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-3">
            <div class="logo">
                <a href="index.html"><img src="{{asset('site/junko/assets/img/logo/logo.png')}}" alt=""></a>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="sticky_header_right menu_position">
                <div class="main_menu">
                    <nav>
                        {{menu('main')}}
                    </nav>
                </div>
                <div class="middel_right_info">
                    <div class="header_wishlist">
                        <a href="{{route('wishlist.index')}}"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                        @if (Cart::instance('saveForLater')->count() > 0)
                        <span class="wishlist_quantity">{{Cart::instance('saveForLater')->count()}}</span>
                        @endif
                    </div>
                    <div class="mini_cart_wrapper">
                        <a href="{{route('cart.index')}}"><i class="fa fa-shopping-bag" aria-hidden="true"></i>Cart</a>
                        @if (Cart::instance('default')->count() > 0)
                        <span class="cart_quantity">{{Cart::instance('default')->count()}}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>