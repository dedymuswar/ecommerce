<!--small product area-->
<div class="small_product_area small_product_four">
    <div class="section_title">
        <h2><span> New Arrivals </span></h2>
    </div>
    <div class="small_product_container small_product_active">
        @foreach ($newArrivals as $newarrive)
        <article class="single_product">
            <figure>
                <div class="product_thumb">
                    @if (!empty(productthumb($newarrive->images)[0]))
                    <a class="primary_img" href="{{route('shop.show',$newarrive->slug)}}"><img
                            src="{{asset('storage/'. productthumb($newarrive->images)[0])}}" alt=""></a>
                    @endif
                    @if (!empty(productthumb($newarrive->images)[1]))
                    <a class="secondary_img" href="{{route('shop.show',$newarrive->slug)}}"><img
                            src="{{asset('storage/'. productthumb($newarrive->images)[1])}}" alt=""></a>
                    @endif
                </div>
                <figcaption class="product_content">
                    <div class="price_box">
                        <span class="current_price">{{ hargaFormat($newarrive->price) }}</span>
                        <span class="old_price">{{ hargaFormat($newarrive->old_price) }}</span>
                    </div>
                    <h3 class="product_name"><a href="product-details.html">{{ $newarrive->name }}</a></h3>
                    <div class="product_ratings">
                        <ul>
                            <li><a href="#"><i class="ion-android-star-outline"></i></a>
                            </li>
                            <li><a href="#"><i class="ion-android-star-outline"></i></a>
                            </li>
                            <li><a href="#"><i class="ion-android-star-outline"></i></a>
                            </li>
                            <li><a href="#"><i class="ion-android-star-outline"></i></a>
                            </li>
                            <li><a href="#"><i class="ion-android-star-outline"></i></a>
                            </li>
                        </ul>
                    </div>
                </figcaption>
            </figure>
        </article>       
        @endforeach
    </div>
</div>
<!--small product end-->