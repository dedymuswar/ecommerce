<div class="deals_product_four">
    <div class="section_title">
        <h2>Hot Deals Products</h2>
    </div>
    <div class="product_carousel product_column1 owl-carousel">
        @forelse ($hotdeals as $hotdeal)
        <article class="single_product">
            <figure>
                <div class="product_thumb">
                    @if (!empty(productthumb($hotdeal->product->images)[0]))
                    <a class="primary_img" href="{{route('shop.show',$hotdeal->product->slug)}}"><img
                            src="{{asset('storage/'. productthumb($hotdeal->product->images)[0])}}" alt=""></a>
                    @endif
                    @if (!empty(productthumb($hotdeal->product->images)[1]))
                    <a class="secondary_img" href="{{route('shop.show',$hotdeal->product->slug)}}"><img
                            src="{{asset('storage/'. productthumb($hotdeal->product->images)[1])}}" alt=""></a>
                    @endif
                    <div class="label_product_disc">
                        <span class="label_disc">Disc {{ $hotdeal->disc }}%</span>
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
                        <div data-countdown="{{ \Carbon\Carbon::parse($hotdeal->untilDate)->format('Y/m/d') }}"></div>
                    </div>
                </div>
                <figcaption class="product_content">
                    <div class="price_box">
                        <span class="old_price">{{ hargaFormat($hotdeal->product->price) }}</span>
                        <span class="current_price">{{ hargaFormat($hotdeal->newPrice) }}</span>
                    </div>
                    {{-- <h3 class="product_name"><a href="product-countdown.html">Natus erro at
                            congue massa commodo sit</a></h3> --}}
                </figcaption>
            </figure>
        </article>
                    
        @empty
            
        @endforelse
    </div>
</div>