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
                    <h4 class="page-title">Speaker Management</h4>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createSpeaker">
                        Create Speaker
                        </button>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">No</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Description</th>
                                        <th class="border-top-0">Picture</th>
                                        <th class="border-top-0">Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($speakers as $speaker)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $speaker->name }}</td>
                                        <td>{{ $speaker->description }}</td>
                                        <td><button type="button" data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#picture-{{ $speaker->id }}"><i class="fa fa-eye"></i></button></td>
                                        <td>
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateSpeaker-{{ $speaker->id }}">
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <form action="/admin/speakers/{{ $speaker->id }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash" onclick="return confirm('Data Pemateri Akan Di Hapus. Anda Yakin?')"></i>
                                                </button>
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

<!-- Modal -->
@foreach ($speakers as $speaker)
<div class="modal fade" id="picture-{{ $speaker->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $speaker->name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('storage/' . $speaker->picture) }}" class="" alt="">
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Create Speaker --}}
<div class="modal fade" id="createSpeaker" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create Speaker</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/speakers" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter Name" required value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Description" required value="{{ old('description') }}">
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="picture">Picture</label>
                        <img class="img-preview-store img-fluid mb-3 col-sm-5">
                        <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" id="picture-store" onchange="previewImageStore()">
                        @error('picture')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Update Speaker --}}
@foreach ($speakers as $speaker)
<div class="modal fade" id="updateSpeaker-{{ $speaker->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Speaker</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/speakers/{{ $speaker->id }}" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="{{ $speaker->name }}" aria-describedby="emailHelp" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control" id="description" value="{{ $speaker->description }}" aria-describedby="emailHelp" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <label for="picture">Picture</label>
                        @if ($speaker->picture)
                            <img src="{{ asset('storage/' . $speaker->picture) }}" class="img-preview-update img-fluid mb-3 col-sm-5 d-block">
                        @else
                            <img class="img-preview-update img-fluid mb-3 col-sm-5">
                        @endif
                        <input type="file" name="picture" class="form-control @error('picture') is-invalid @enderror" id="picture-update" onchange="previewImageUpdate()">
                        @error('picture')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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

<script>

    function previewImageStore() {

        const image = document.querySelector('#picture-store');
        const imgPreview = document.querySelector('.img-preview-store');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    function previewImageUpdate() {

        const image = document.querySelector('#picture-update');
        const imgPreview = document.querySelector('.img-preview-update');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
