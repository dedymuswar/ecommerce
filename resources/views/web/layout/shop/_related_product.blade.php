<section class="product_area related_products">
    <div class="section_title">
        <h2>Related Products </h2>
    </div>
    <div class="product_carousel product_column4 owl-carousel">
        @foreach ($relatedProducts as $item)
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
                            <li class="compare"><a href="#" title="compare"><span class="ion-levels"></span></a></li>
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
                        <span class="old_price">{{$item->oldPrice()}}</span>
                        <span class="current_price">{{$item->presentPrice()}}</span>
                    </div>
                    <h3 class="product_name"><a href="product-details.html">Natus erro at congue massa
                            commodo sit</a></h3>
                </figcaption>
            </figure>
        </article>
        @endforeach
    </div>
</section>