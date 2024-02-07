@extends('layouts.admin')

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Kelola Review</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createartikel">
                                Tambah Artikel
                              </button>
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">ID</th>
                                            <th class="border-top-0">Nama Peserta</th>
                                            <th class="border-top-0">Judul</th>
                                            <th class="border-top-0">Abstrak</th>
                                            <th class="border-top-0">File</th>
                                            <th class="border-top-0">Operation</th>
                                            <th class="border-top-0">Pilih Reviewer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($papers as $paper)
                                        <tr>
                                            <td>{{ $paper->id }}</td>
                                            <td>{{ $paper->author->User->name }}</td>
                                            <td>{{ $paper->title }}</td>
                                            <td>{{ $paper->abstract }}</td>
                                            <td><a href="{{ route('admin.downloadartikel', $paper->id) }}" class="btn btn-primary">Download</a></td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateartikel-{{ $paper->id }}"><i class="fa fa-edit"></i></button><a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#selectReviewer-{{ $paper->id }}">pilih</button></td>
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

{{-- Modal Pilih Reviewer --}}
@foreach ($papers as $paper)
<div class="modal fade" id="selectReviewer-{{ $paper->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Select Reviewer</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.selectReviewer', $paper->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="reviewer1">Reviewer 1</label>
                    <select name="reviewer1" class="form-select" aria-label="Default select example">
                        @foreach ($reviewer as $row)
                            <option class="dropdown-paper" value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="author">Reviewer 2</label>
                    <select name="reviewer2" class="form-select" aria-label="Default select example">
                        @foreach ($reviewer as $row)
                            <option class="dropdown-paper" value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
