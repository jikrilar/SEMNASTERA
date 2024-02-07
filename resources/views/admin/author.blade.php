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
                        <h4 class="page-title">Author Management</h4>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createAuthor">
                                Create Author
                            </button>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Name Author</th>
                                            <th class="border-top-0">Email</th>
                                            <th class="border-top-0">Institution</th>
                                            <th class="border-top-0">Category</th>
                                            <th class="border-top-0">Status</th>
                                            <th class="border-top-0">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($authors as $author)
                                        <tr>
                                            <td>{{ $author->id }}</td>
                                            <td>{{ $author->user->name }}</td>
                                            <td>{{ $author->user->email }}</td>
                                            <td>{{ $author->institution }}</td>
                                            <td>{{ $author->cost->category }}</td>
                                            <td>{{ $author->user->status }}</td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateAuthor-{{ $author->id }}"><i class="fa fa-edit" aria-hidden="true"></i></button>
                                                <form action="/authors/{{ $author->id }}" class="d-inline" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Data Author Akan Dihapus. Anda Yakin?')"><i class="fa fa-trash"></i>
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
</div>

<!-- Modal Create Author -->
<div class="modal fade" id="createAuthor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Author</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/authors" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Full Name" @error('name') is-invalid @enderror required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username" @error('name') is-invalid @enderror required>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email Address" @error('email') is-invalid @enderror required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" @error('email') is-invalid @enderror required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cost">Category</label>
                    <select name="cost_id" class="form-select" aria-label="Default select example">
                        @foreach ($costs as $cost)
                            <option class="dropdown-item" value="{{ $cost->id }}">{{ $cost->category }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

  <!-- Modal Update Author -->
  @foreach ($authors as $author)
  <div class="modal fade" id="updateAuthor-{{ $author->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Author</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="/authors/{{ $author->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ $author->user->name }}" placeholder="Enter Full Name">
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" id="username" value="{{ $author->user->username }}" placeholder="Enter UserName">
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="email" name="email" class="form-control" id="email" value="{{ $author->user->email }}" placeholder="Enter Email">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="cost">Category</label>
                    <select name="cost_id" class="form-select">
                        @foreach ($costs as $cost)
                            <option class="dropdown-item" value="{{ $cost->id }}">{{ $cost->category }}</option>
                        @endforeach
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
