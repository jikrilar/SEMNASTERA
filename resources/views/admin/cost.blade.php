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
                    <h4 class="page-title">Kelola Informasi Tanggal Penting</h4>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createCost">
                            Atur Info Biaya
                        </button>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">No</th>
                                        <th class="border-top-0">Kategori Peserta</th>
                                        <th class="border-top-0">Nominal Biaya</th>
                                        <th class="border-top-0">Nominal Early Bird</th>
                                        <th class="border-top-0">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($costs as $cost)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $cost->category }}</td>
                                        <td>{{ $cost->nominal }}</td>
                                        <td>{{ $cost->earlybird_nominal }}</td>

                                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateCost-{{ $cost->id }}"><i class="fa fa-edit" aria-hidden="true"></i></button>

                                        <form action="/admin/costs/{{ $cost->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Informasi Biaya Akan Dihapus. Anda Yakin?')"><i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="createCost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/costs" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Masukan Kategori Peserta</label>
                        <input type="text" class="form-control" name="category">
                    </div>
                    <div class="form-group">
                        <label for="">Masukan Nominal</label>
                        <input type="number" class="form-control" name="nominal">
                    </div>
                    <div class="form-group">
                        <label for="">Masukan Nominal Early</label>
                        <input type="number" class="form-control" name="earlybird_nominal">
                    </div>
                    <div class="form-group">
                        <label for="">Batas Tanggal Early Bird</label>
                        <input type="date" class="form-control" name="earlybird_date">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($costs as $cost)
<div class="modal fade" id="updateCost-{{ $cost->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $cost->description }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/admin/costs/{{ $cost->id }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="">Masukan Kategori Peserta</label>
                        <input type="text" class="form-control" name="category" value="{{ $cost->category }}">
                    </div>
                    <div class="form-group">
                        <label for="">Masukan Nominal</label>
                        <input type="number" class="form-control" name="nominal" value="{{ $cost->nominal }}">
                    </div>
                    <div class="form-group">
                        <label for="">Masukan Nominal Early Bird</label>
                        <input type="number" class="form-control" name="earlybird_nominal" value="{{ $cost->earlybird_nominal }}">
                    </div>
                    <div class="form-group">
                        <label for="">Batas Tanggal Early Bird</label>
                        <input type="date" class="form-control" name="earlybird_date" value="{{ $cost->earlybird_date }}">
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
