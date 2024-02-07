{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@extends('layouts.admin')

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-reviewers-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Reviewer Management</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createReviewer">
                                Create Reviewer
                              </button>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Name</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Mobile</th>
                                            <th class="border-top-0">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviewers as $reviewer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $reviewer->user->name }}</td>
                                            <td>{{ $reviewer->user->email }}</td>
                                            <td>{{ $reviewer->mobile_number }}</td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateReviewer-{{ $reviewer->id }}"><i class="fa fa-edit"></i></button>
                                                <form action="/admin/reviewers/{{ $reviewer->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Data Reviewer Akan Dihapus. Anda Yakin?')"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
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

@foreach ($reviewers as $reviewer)
<!-- Modal Update Reviewer -->
<div class="modal fade" id="updateReviewer-{{ $reviewer->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form method="post" action="/admin/reviewers/{{ $reviewer->id }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ $reviewer->user->name }}" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ $reviewer->user->email }}" placeholder="Enter Email Address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" value="" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label for="mobile_number">Mobile</label>
                <input type="text" name="mobile_number" class="form-control" id="mobile_number" value="{{ $reviewer->mobile_number }}" placeholder="Enter Mobile Number">
            </div>
            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" name="picture" class="form-control" id="picture">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <div class="form-check" id="gender" name="gender">
                    <input type="radio" name="gender" class="form-check-input" id="male" value="male">
                    <label for="male" class="form-check-label">Pria</label>
                </div>
                <div class="form-check" id="gender" name="gender">
                    <input type="radio" name="gender" class="form-check-input" id="female" value="female">
                    <label for="female" class="form-check-label">Wanita</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</div>
</div>
@endforeach

<!-- Modal Create Reviewer -->
<div class="modal fade" id="createReviewer" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Create Reviewer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form method="post" action="/admin/reviewers" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="mobile_number">Mobile</label>
                <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Mobile Number">
            </div>
            <div class="form-group">
                <label for="picture">Picture</label>
                <input type="file" name="picture" class="form-control" id="picture">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <div class="form-check" id="gender" name="gender">
                    <input type="radio" name="gender" class="form-check-input" id="male" value="male">
                    <label for="male" class="form-check-label">Pria</label>
                </div>
                <div class="form-check" id="gender" name="gender">
                    <input type="radio" name="gender" class="form-check-input" id="male" value="female">
                    <label for="female" class="form-check-label">Wanita</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
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
