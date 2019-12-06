@extends('web.shop')
@section('title')
Cart
@endsection
@section('content')
<!--shopping cart area start -->
<div class="shopping_cart_area mt-60">
    <div class="container">
        @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message')}}
        </div>
        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                @if (Cart::count() > 0)
                <h4> {{Cart::count()}} items in Shopping Cart </h4>
                <div class="table_desc">
                    <div class="cart_page table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product_quantity">Quantity</th>
                                    <th class="product_total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                <tr>
                                    <td class="product_remove">
                                        <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-sm btn-danger"><i class="fa fa-trash-o"></i> Remove</button>
                                        </form>
                                        <br>
                                        <form action="{{route('cart.switchtowishlist', $item->rowId)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn-sm btn-warning"><i class="fa fa-heart-o"></i> Add to
                                                Wishlist</button>
                                        </form>
                                    </td>
                                    <td class="product_thumb"><a href="{{route('shop.show',$item->model->slug)}}"><img
                                                src="{{asset('storage/'. cropedImage($item->model->image, 'small'))}}"
                                                alt=""></a>
                                    </td>
                                    <td class="product_name"><a
                                            href="{{route('shop.show',$item->model->slug)}}">{{$item->name}}</a>
                                    </td>
                                    <td class="product_quantity"><label>Quantity</label> <input min="1" max="100"
                                            value="1" type="number"></td>
                                    <td class="product-total">{{$item->model->presentPrice()}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="cart_submit">
                        <button type="submit">update cart</button>
                    </div>
                </div>
                @else
                <h3> No items in Cart </h3>
                <div class="continueShopping_btn">
                    <a href="{{route('shop.index')}}">Continue Shopping</a>
                </div>
                @endif
            </div>
        </div>
        <!--coupon code area start-->
        <div class="coupon_area">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code left">
                        <h3>Coupon</h3>
                        <div class="coupon_inner">
                            <p>Enter your coupon code if you have one.</p>
                            <input placeholder="Coupon code" type="text">
                            <button type="submit">Apply coupon</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount">Rp{{Cart::subtotal()}}</p>
                            </div>
                            <div class="cart_subtotal">
                                <p>Tax</p>
                                <p class="cart_amount">Rp{{Cart::tax()}}</p>
                            </div>
                            {{-- <div class="cart_subtotal ">
                                <p>Shipping</p>
                                <p class="cart_amount"><span>Flat Rate:</span> £255.00</p>
                            </div>
                            <a href="#">Calculate shipping</a> --}}

                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount">Rp{{Cart::total()}}</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="{{route('checkout.index')}}">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--coupon code area end-->
    </div>
</div>
<!--shopping cart area end -->
@endsection