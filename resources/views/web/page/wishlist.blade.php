@extends('web.shop')
@section('stylesheets')
@endsection
@section('content')
<!--wishlist area start -->
<div class="wishlist_area mt-60">
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
                @if (Cart::instance('saveForLater')->count() > 0)
                <h4> {{Cart::instance('saveForLater')->count()}} items in Wishlist </h4>
                <div class="table_desc wishlist">
                    <div class="cart_page table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product_remove">Delete</th>
                                    <th class="product_thumb">Image</th>
                                    <th class="product_name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product_quantity">Stock Status</th>
                                    <th class="product_total">Add To Cart</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::instance('saveForLater')->content() as $item)
                                <tr>
                                    <td class="product_remove">
                                        <form action="{{route('wishlist.destroy', $item->rowId)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-sm btn-danger" type="submit"><i
                                                    class="fa fa-trash-o"></i> Remove</button>
                                        </form>
                                        {{-- <a href="#">X</a> --}}
                                    </td>
                                    <td class="product_thumb"><a href="{{route('shop.show',$item->model->slug)}}"><img
                                                style="width:45px"
                                                src="{{asset('storage/'. cropedImage($item->model->image, 'small'))}}"
                                                alt=""></a>
                                    </td>
                                    <td class="product_name"><a href="#">{{$item->model->name}}</a></td>
                                    <td class="product-price">{{$item->model->presentPrice()}}</td>
                                    <td class="product_quantity">In Stock</td>
                                    <td class="product_total">
                                        <form action="{{route('wishlist.switchtocart', $item->rowId)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn-sm btn-secondary"><i
                                                    class="fa fa-heart-o"></i> Move To Cart</button>
                                        </form>
                                        {{-- <a href="#">Move To Cart</a> --}}
                                    </td>

                                </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
                @else
                <h4>You have no items wishlist</h4>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="wishlist_share">
                    <h4>Share on:</h4>
                    <ul>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                        <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
<!--wishlist area end -->
@endsection