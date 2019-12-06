<div class="col-lg-3 col-md-12">
    <!--sidebar widget start-->
    <aside class="sidebar_widget">
        <div class="widget_inner">
            <div class="widget_list widget_categories">
                <h2>Product categories</h2>
                <ul>

                    @foreach ($categories as $category)
                    {{-- {{dd($category->slug)}} --}}
                    <li class="{{setActiveCategory($category->slug)}}"><a
                            href="{{route('shop.index', ['category' => $category->slug])}}">{{$category->name}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="widget_list widget_filter">
                <h2>Filter by price</h2>
                <form action="#">
                    <div id="slider-range"></div>
                    <button type="submit">Filter</button>
                    <input type="text" name="text" id="amount" />

                </form>
            </div>
            <div class="widget_list">
                <h2>Compare Products</h2>
                <div class="recent_product_container">
                    <article class="recent_product_list">
                        <figure>
                            <div class="product_thumb">
                                <a href="product-details.html"><img
                                        src="{{asset('site/junko/assets/img/product/product1.jpg')}}" alt=""></a>
                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">Natus erro at congue</a></h3>
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
                                <div class="price_box">
                                    <span class="old_price">$70.00</span>
                                    <span class="current_price">$65.00</span>
                                </div>
                            </div>
                        </figure>
                    </article>
                    <article class="recent_product_list">
                        <figure>
                            <div class="product_thumb">
                                <a href="product-details.html"><img
                                        src="{{asset('site/junko/assets/img/product/product2.jpg')}}" alt=""></a>
                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">Auctor gravida enim</a></h3>
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
                                <div class="price_box">
                                    <span class="old_price">$70.00</span>
                                    <span class="current_price">$65.00</span>
                                </div>
                            </div>
                        </figure>
                    </article>
                    <article class="recent_product_list">
                        <figure>
                            <div class="product_thumb">
                                <a href="product-details.html"><img
                                        src="{{asset('site/junko/assets/img/product/product24.jpg')}}" alt=""></a>
                            </div>
                            <div class="product_content">
                                <h3><a href="product-details.html">Cillum dolore tortor</a></h3>
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
                                <div class="price_box">
                                    <span class="old_price">$70.00</span>
                                    <span class="current_price">$65.00</span>
                                </div>
                            </div>
                        </figure>
                    </article>
                </div>
            </div>
            <div class="widget_list tags_widget">
                <h2>Product tags</h2>
                <div class="tag_cloud">
                    <a href="#">blouse</a>
                    <a href="#">clothes</a>
                    <a href="#">fashion</a>
                    <a href="#">handbag</a>
                    <a href="#">laptop</a>
                </div>
            </div>
        </div>
    </aside>
    <!--sidebar widget end-->
</div>