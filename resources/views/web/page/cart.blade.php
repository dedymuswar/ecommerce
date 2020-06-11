@extends('web.shop')
@section('title')
Cart
@endsection
@section('stylesheets')
@endsection
@section('content')
<!--shopping cart area start -->
<div class="shopping_cart_area mt-60">
    <div class="container">
        @if (session()->has('success_message'))
        <div class="alert alert-success">
            {{ session()->get('success_message')}}
        </div>
        @elseif(session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session()->get('error_message')}}
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
                                    <th width="35%" colspan="2" class="product_name">Product</th>
                                    <th width="25%" class="product_quantity">Quantity</th>
                                    <th width="5%" class="product_total">Price</th>
                                    <th width="35%" colspan="2" class="product_remove">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $item)
                                <tr>
                                    <td class="product_thumb"><a href="{{route('shop.show',$item->model->slug)}}"><img
                                                style="width:50px;"
                                                src="{{asset('storage/'.  productthumb($item->model->images)[0])}}"
                                                alt=""></a>
                                    </td>
                                    <td class="product_name">
                                        <a href="{{route('shop.show',$item->model->slug)}}">{{$item->name}}</a>
                                    </td>
                                    <td class="product_quantity">
                                        <select class="quantity" data-id="{{$item->rowId}}"
                                            data-productQuantity="{{$item->model->quantity}}">
                                            @for ($i = 1; $i < 5 + 1; $i++) <option
                                                {{$item->qty == $i ? 'selected' : ''}}>
                                                {{$i}}</option>
                                                @endfor
                                        </select>
                                    </td>
                                    <td class="product-total">{{$item->model->presentPrice()}}</td>
                                    <td class="product_remove">
                                        <form action="{{route('cart.destroy', $item->rowId)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn-sm btn-danger"><i
                                                    class="fa fa-trash-o"></i> Remove</button>
                                        </form>
                                    </td>
                                    <td class="product_remove">
                                        <form action="{{route('cart.switchtowishlist', $item->rowId)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn-sm btn-secondary"><i
                                                    class="fa fa-heart-o"></i>
                                                Add to
                                                Wishlist</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="cart_submit">
                        <button type="submit">update cart</button>
                    </div> --}}
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
                    @if (! session()->has('coupon'))
                    <div class="coupon_code left">
                        <h3>Coupon</h3>
                        <div class="coupon_inner">
                            <form action="{{route('coupon.store')}}" method="POST">
                                @csrf
                                <p>Enter your coupon code if you have one.</p>
                                <input placeholder="Coupon code" name="coupon_code" id="coupon_code" type="text">
                                <button type="submit">Apply coupon</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="coupon_code right">
                        <h3>Cart Totals</h3>
                        <div class="coupon_inner">
                            <div class="cart_subtotal">
                                <p>Subtotal</p>
                                <p class="cart_amount">Rp{{Cart::subtotal()}}</p>
                            </div>
                            @if (session()->has('coupon'))
                            <div class="cart_subtotal">
                                <p>Discount ({{session()->get('coupon')['name']}})</p> :
                                <form action="{{route('coupon.destroy')}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-xs btn-danger" data-toggle="tooltip" data-placement="top"
                                        title="Remove Coupon" type="submit"> <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                <p>-{{number_format(session()->get('coupon')['discount'], 2)}}</p>
                            </div>
                            @endif
                            <div class="cart_subtotal">
                                <p>Total</p>
                                <p class="cart_amount">Rp{{number_format($newTotal, 2)}}</p>
                            </div>
                            <div class="checkout_btn">
                                <a href="{{route('checkout.index')}}">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--shopping cart area end -->
@endsection
@section('scriptjs')
<script src="{{asset('js/app.js')}}"></script>
<script>
    (function() {
            const classname = document.querySelectorAll('.quantity')
            
            Array.from(classname).forEach(function(element) {
                element.addEventListener('change', function(){
                    const id = element.getAttribute('data-id')
                    const productQuantity = element.getAttribute('data-productQuantity')

                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        productQuantity: productQuantity
                    })
                    .then(function(response){
                        //console.log(response);
                        window.location.href = '{{route('cart.index')}}'
                    })
                    .catch(function(error) {
                        // console.log(error);
                        window.location.href = '{{route('cart.index')}}'
                    });
                })
            })
        })();
</script>
@endsection