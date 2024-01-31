@extends('layout.main')

@section('content')
    <!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- header area end -->
        <!-- page title area start -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">{{ $title }}</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{ route(auth()->user()->role . '.index') }}">Home</a></li>
                            <li><span>{{ $title }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="{{ asset('assets/images/author/avatar.png') }}" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->nama }} <i
                                class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page title area end -->
        <div class="main-content-inner">
            <!-- sales report area start -->
            <div class="sales-report-area sales-style-two">
                <div class="row">
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Tabel Transaksi</h4>
                                <div class="data-tables">
                                    <table id="table1" class="table table-bordered table-hover">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th class="col-1">No.</th>
                                                <th>Invoice</th>
                                                <th>siswa</th>
                                                <th>Produk</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($transaksis as $i => $transaksi)
                                                <tr>
                                                    <td>{{ $i + 1 }}</td>
                                                    <td>{{ $transaksi->invoice }}</td>
                                                    <td>{{ $transaksi->user->nama }}</td>
                                                    <td>{{ $transaksi->produk->nama_produk }}</td>
                                                    <td>Rp.
                                                        {{ number_format($transaksi->harga, 0, ',', '.') }},00</td>
                                                    <td>{{ $transaksi->kuantitas }}</td>
                                                    <td>Rp.
                                                        {{ number_format($transaksi->total_harga, 0, ',', '.') }},00</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="font-weight-bold">
                                                <td colspan="6" class="text-right">TOTAL SELURUH HARGA :
                                                </td>
                                                <td>Rp.{{ number_format($totalHarga, 0, ',', '.') }},00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                </div>
            </div>
            <!-- sales report area end -->
        </div>
    </div>
    <!-- main content area end -->
@endsection