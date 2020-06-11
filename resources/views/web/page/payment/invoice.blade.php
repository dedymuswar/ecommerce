@extends('web.shop')
@section('title')
Invoice
@endsection
@section('stylesheets')
@endsection
@section('content')

<div class="shopping_cart_area mt-50">
    <div class="container">
        <section class="hk-sec-wrapper hk-invoice-wrap pa-35">
            <div class="invoice-from-wrap">
                <div class="row justify-content-center">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ Session::get('success') }}</strong>
                    </div>
                    @endif
                    <div class="col-md-7 mb-30">
                        <img class="img-fluid invoice-brand-img d-block mb-20"
                            src="{{ asset('site/junko/assets/img/logo/logo.png') }}" width="200" alt="brand">
                        <h6 class="mb-3">Hencework Inc</h6>
                        <span class="d-block text-uppercase mb-4 font-13">billing to</span>
                        <address>
                            @foreach ($profil as $item_profil)
                            <span class="d-block">{{ $item_profil->penerima }}</span>
                            <span class="d-block">{{ $item_profil->city->title }}</span>
                            <span class="d-block">{{ $item_profil->province->title }}</span>
                            <span class="d-block">{{ $item_profil->telepon }}</span>
                            <span class="d-block">Kode Pos {{ $item_profil->kodePos }}</span>
                            <span class="d-block">{{ $item_profil->alamatLengkap }}</span>
                            @endforeach
                        </address>
                    </div>
                    <div class="col-md-3 mt-30 mb-10">
                        @foreach ($orderList as $item)
                        <br>
                        <h4 class="mb-35 mt-30 font-weight-600">Invoice / Receipt</h4>
                        <span class="d-block">Date: <span class="pl-10 text-dark">{{ $item->created_at }}</span></span>
                        <span class="d-block">Invoice / Receipt <span class="pl-10 text-dark">
                                {!! "<span class='badge badge-warning' style='font-size:14px; color:white'>".$item->code."</span>" !!}</span></span>
                        <span class="d-block">Customer #<span
                                class="pl-10 text-dark">{{ $item->user->name }}</span></span>
                        <br>
                        <address>
                            <span class="d-block">{{ $item->user->email }}</span>
                        </address>
                        <div class="d-block">
                            <h4>No.Resi {!! $item->NoResi ? "<span class='badge badge-success' style='font-size:14px;'>".$item->NoResi."</span>" : '-' !!}</h4>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <hr>
            <div class="row justify-content-center">
                <div class="invoice-details col-sm-10">
                    <div class="table-wrap">
                        <div class="table-responsive">
                            <table class="table table-striped table-border mb-0">
                                <thead>
                                    <tr>
                                        <th class="w-70">Items</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Harga</th>
                                        <th class="text-right">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (!empty($orderList))
                                    @foreach ($orderList as $item)
                                    @foreach ($item->products as $ite)
                                    <tr>
                                        <td class="w-70">{{ $ite->name }}</td>
                                        <td class="text-right">{{ $ite->pivot->quantity }}</td>
                                        <td class="text-right">Rp{{ number_format($ite->price, 2) }}</td>
                                        <td class="text-right">
                                            Rp{{ number_format(floatval($ite->price) * floatval($ite->pivot->quantity),2) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr class="">
                                        <td colspan="3" class="text-right text-dark">Subtotals</td>
                                        <td class="text-right">Rp{{ $item->billing_subtotal }}</td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="text-right text-dark border-top-0">Discount</td>
                                        <td class="text-right border-top-0">
                                            Rp{{ $item->billing_discount ? $item->billing_discount : ' - ' }}</td>
                                    </tr>
                                    <tr class="">
                                        <td colspan="3" class="text-right text-dark border-top-0">Biaya Pengiriman</td>
                                        <td class="text-right border-top-0">Rp{{ $item->billing_ongkir }}</td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                                <tfoot class="border-bottom border-1">
                                    <tr>
                                        <th colspan="3" class="text-right font-weight-600">Total</th>
                                        <th class="text-right font-weight-600">Rp{{ $item->billing_total }}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="invoice-sign-wrap text-right mt-2 py-60">
                        @foreach ($orderList as $order)
                        @if (!$order->isPaid())
                        <a href="{{$order->payment_url}}" class="btn btn-success"><i class="fa fa-shopping-cart"></i>
                            Proses Pembayaran</a>
                        @endif
                        @endforeach
                    </div>
                    <ul class="invoice-terms-wrap font-14 list-ul">
                        <li>A buyer must settle his or her account within 30 days of the date listed on the invoice.
                        </li>
                        <li>The conditions under which a seller will complete a sale. Typically, these terms specify the
                            period
                            allowed
                            to a buyer to pay off the amount due.</li>
                    </ul>
                </div>
            </div>
            <hr>

        </section>
    </div>
</div>
@endsection
@section('scriptjs')

@endsection