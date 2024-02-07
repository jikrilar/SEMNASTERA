{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@extends('layouts.admin')

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    @include('layouts.header')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Payment</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        @if (Auth::user()->role == 'admin')
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">No</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Category</th>
                                        {{-- <th class="border-top-0">Status</th> --}}
                                        <th class="border-top-0">Slip</th>
                                        <th class="border-top-0">Konfirmasi Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payment->paper->author->user->name }}</td>
                                        <td>{{ $payment->paper->author->cost->category }}</td>
                                        {{-- <td>{{ $payment->status }}</td> --}}
                                        <td><a href="/downloads/transfer-slip" class="btn btn-primary">Download</a></td>
                                        <td>@if ($payment->status == 'pending')
                                            <a href="/payment/confirmation/{{ $payment->id }}" class="btn btn-primary">Confirm</a>
                                        @else
                                            <p class="font-bold text-success">Telah Dikonfirmasi</p>
                                        @endif</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        @if ($reviews->count() == 2)
                        <div class="col-sm-6">
                            <form action="/payment/submit" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <h5 class="text-secondary">Pembayaran Transfer ke Rekening Mandiri: 182-000-102985-9 a.n. Politeknik Sukabumi-PPPM.</h5>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="file">Upload Bukti Pembayaran</label>
                                    <input type="file" id="file" name="transfer_slip" class="form-control">
                                </div>
                                <button class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <hr>
                        <hr>
                        @foreach ($payments as $payment)
                        <div class="mt-5">
                            <img src="{{ asset('img/logo.png') }}" alt="" style="max-width: 200px">
                        </div>
                        <p class="mt-5">{{ $payment->created_at }}</p>
                        <hr>
                        <p>Status Transaksi : {{ $payment->status }}</p>
                        <div class="row d-flex justify-content-center">
                            <div class="col-sm-6">
                                <p class="font-bold">Total Pembayaran</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-bold">Rp. {{ $payment->Paper->Author->cost->nominal }}</p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="white-box">
                            <h3>Artikel Anda Belum Lolos Review</h3>
                            <a href="/papers" class="btn btn-outline-primary mt-3">Ke Halaman Makalah</a>
                        </div>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if (Session::has('message'))
    <script>
        swal("Message","{{ Session::get('message') }}",'success',{
            button:true,
            button:"Ok",
            timer:3000
        });
    </script>
@endif
