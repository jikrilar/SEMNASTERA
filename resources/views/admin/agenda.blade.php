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
                    <h4 class="page-title">Kelola Acara</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createAgenda">
                            Start Agenda
                        </button>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">No</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Poster</th>
                                        <th class="border-top-0">Status</th>
                                        <th class="border-top-0">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($agendas as $agenda)
                                    <tr>
                                        <td>{{ $agenda->id }}</td>
                                        <td>{{ $agenda->date }}</td>
                                        <td><button type="button" data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#picture-{{ $agenda->id }}"><i class="fa fa-eye"></i></button></td>

                                        <td><p class="text-success">{{ $agenda->status }}</p></td>

                                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateAgenda-{{ $agenda->id }}"><i class="fa fa-edit" aria-hidden="true"></i></button>
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

<!-- Modal -->
@foreach ($agendas as $agenda)
<div class="modal fade" id="picture-{{ $agenda->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $agenda->name }}</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <img src="{{ asset('storage/' . $agenda->poster) }}" class="img-fluid" alt="" style="width: 300px">
        </div>
        </div>
    </div>
    </div>
@endforeach

<!-- Modal Create Acara -->
<div class="modal fade" id="createAgenda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Agenda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="/agendas" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date">
                    </div>
                    <div class="form-group">
                        <label for="abstrak">Poster</label>
                        <input type="file" name="poster" class="form-control" id="poster">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Acara -->
@foreach ($agendas as $agenda)
<div class="modal fade" id="updateAgenda-{{ $agenda->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Agenda</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/agendas/{{ $agenda->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control" id="date" value="{{ $agenda->date }}">
                    </div>
                    <div class="form-group">
                        <label for="poster">Poster</label>
                        <input type="file" name="poster" class="form-control" id="poster" placeholder="Poster">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-select" aria-label="Default select example">
                            <option class="dropdown-item" value="occur">Occur</option>
                            <option class="dropdown-item" value="finished">Finished</option>
                        </select>
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
