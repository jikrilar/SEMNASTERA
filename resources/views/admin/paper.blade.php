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
                        <h4 class="page-title">Paper Management</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Issue</th>
                                            <th class="border-top-0">Author</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Operation</th>
                                            <th class="border-top-0">Select Reviewer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($papers as $paper)
                                        <tr>
                                            <td>{{ $paper->Archive->volume }} {{ $paper->Archive->publish_year }}</td>
                                            <td>{{ $paper->author->user->name }}</td>
                                            <td style="white-space: initial">{{ $paper->title_ind }}</td>
                                            <td>
                                                <a href="/downloads/paper/{{ $paper->id }}" class="btn btn-outline-secondary"><i class="fa fa-download"></i></a>

                                                <a href="/papers/{{ $paper->id }}" class="btn btn-outline-warning"><i class="fa fa-eye"></i></a>
                                            </td>
                                            <td>
                                            @if ($paper->review->count() == 2)
                                            <a href="/paper/reviews/{{ $paper->id }}" class="btn btn-outline-success">Review</a>
                                            @else
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#selectReviewer-{{ $paper->id }}">Select</button>
                                            @endif
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

<!-- Modal Create Paper -->
<div class="modal fade" id="createPaper" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Paper</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/papers" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="author">Author</label>
                    <select name="author_id" class="form-select">
                        @foreach ($authors as $author)
                            <option class="dropdown-item" value="{{ $author->id }}">{{ $author->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" @error('title') is-invalid @enderror required>
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="abstract">Abstract</label>
                    <input type="hidden" name="abstract" id="abstract" @error('abstract') is-invalid @enderror required>
                    <trix-editor input="abstract"></trix-editor>
                    @error('abstract')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file">File</label>
                    <input type="file" name="file" class="form-control" id="file" @error('file') is-invalid @enderror required>
                    @error('file')
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
</div>



{{-- Modal Select Reviewer --}}
@foreach ($papers as $paper)
<div class="modal fade" id="selectReviewer-{{ $paper->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Select Reviewer</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/selectReviewer/{{ $paper->id }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="reviewer1">Reviewer 1</label>
                    <select name="reviewer1" class="form-select" aria-label="Default select example">
                        @foreach ($reviewers as $reviewer)
                            <option class="dropdown-item" value="{{ $reviewer->id }}">{{ $reviewer->user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="author">Reviewer 2</label>
                    <select name="reviewer2" class="form-select" aria-label="Default select example">
                        @foreach ($reviewers as $reviewer)
                            <option class="dropdown-item" value="{{ $reviewer->id }}">{{ $reviewer->user->name }}</option>
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
