{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@extends('layouts/admin')

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    @include('layouts.header')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Date Information Management</h4>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        @if ($dates->count())
                        @foreach ($dates as $date)
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>{{ $date->description }}</label>
                                    <div class="input-group">
                                        <input type="date" class="form-control" value="{{ $date->date }}" disabled>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateDate-{{ $date->id }}"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @else
                        <div class="col-sm-6">
                            <form action="/dates" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="tgl_earlybird">Batas Potongan Biaya EarlyBird</label>
                                    <input type="date" name="tgl_earlybird" class="form-control" id="tgl_earlybird" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_penerimaan_makalah">Batas Penerimaan Makalah</label>
                                    <input type="date" name="tgl_penerimaan_makalah" class="form-control" id="tgl_penerimaan_makalah" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_camera">Batas Pengiriman Camera Ready</label>
                                    <input type="date" name="tgl_camera" class="form-control" id="tgl_camera" required>
                                </div>
                                    <div class="form-group">
                                    <label for="tgl_pembayaran">Batas Akhir Pembayaran</label>
                                    <input type="date" name="tgl_pembayaran" class="form-control" id="tgl_pembayarans" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_seminar">Pelaksanaan Seminar</label>
                                    <input type="date" name="tgl_seminar" class="form-control" id="tgl_seminar" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($dates as $date)
<div class="modal fade" id="updateDate-{{ $date->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $date->description }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dates/{{ $date->id }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="">Masukan Tanggal {{ $date->description }}</label>
                        <input type="date" value="{{ $date->date }}" class="form-control" name="date">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@if (Session::has('message'))
    <script>
        swal("Message","{{ Session::get('message') }}",'success',{
            button:true,
            button:"Ok",
            timer:3000
        });
    </script>
@endif
