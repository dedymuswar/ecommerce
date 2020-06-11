@extends('web.shop')
@section('title')
My Account
@endsection
@section('content')
<section class="main_content_area">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    @include('web.page.user.lefttabs')
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h3>Daftar Pesanan saya</h3>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>No Pesanan</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Status Pembayaran</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($pesananUser)> 0)
                                    @foreach ($pesananUser as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->code }}</td>
                                        <td>Rp{{ $item->billing_total }}</td>
                                        <td>{!! $item->payment_status == '' ? '-' : "<div
                                                class='badge badge-success text-white' style='font-size:12px'>
                                                ".$item->statuse->title."</div>" !!}</td>
                                        <td>{!! $item->payment_status == 'paid' ? "<div
                                                class='badge badge-success text-white' style='font-size:12px'>
                                                confirmed</div>" : "<div class='badge badge-warning text-white'
                                                style='font-size:12px'>menunggu pembayaran
                                            </div>"!!}</td>
                                        <td>
                                            <a href="{{ route('checkout.received', $item->id) }}"
                                                class="badge badge-secondary" title="detail"><i
                                                    class="fa fa-search-plus"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6"><p style="text-align:center;">Maaf anda belum memiliki pasanan !</p></td>
                                        </tr>
                                    
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection