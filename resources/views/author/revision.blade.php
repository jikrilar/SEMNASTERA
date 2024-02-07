{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@extends('layouts.admin')

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Submission</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <form action="/revision/submit" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="title_ind">Title (Indonesia)</label>
                                    <input type="text" id="title_ind" name="title_ind" placeholder="Masukan judul Bahasa Indonesia" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="title_en">Title (Inggris)</label>
                                    <input type="text" id="title_en" name="title_en" placeholder="Masukan judul Bahasa Inggris" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="abstract_ind">Abstract (Indonesia)</label>
                                    <input id="abstract_ind" name="abstract_ind" type="hidden">
                                    <trix-editor input="abstract_ind"></trix-editor>
                                </div>
                                <div class="form-group">
                                    <label for="abstract_en">Abstract (Inggris)</label>
                                    <input id="abstract_en" name="abstract_en" type="hidden">
                                    <trix-editor input="abstract_en"></trix-editor>
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input type="file" id="file" name="file" class="form-control">
                                </div>
                                <button class="btn btn-primary">Submit</button>
                            </form>
                        </div>
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
