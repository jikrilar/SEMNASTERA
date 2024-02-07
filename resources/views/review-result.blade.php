@extends('layouts.admin')

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('layouts.header')
        @include('layouts.sidebar')
        <div class="page-wrapper">
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Review Page</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            @if ($reviews->count())
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Reviewer</th>
                                            <th class="border-top-0">Comment</th>
                                            <th class="border-top-0">Status</th>
                                            @if (Auth::user()->role == 'author')
                                                <th class="border-top-0">Submit Revisi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ $review->reviewer->user->name }}</td>
                                            <td style="white-space: initial">{{ $review->comment }}</td>
                                            <td>{{ $review->status }}</td>
                                            @if (Auth::user()->role == 'author')
                                                <td><a href="/revision"></a></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <h3>Menunggu Pemilihan Reviewer Untuk Makalah Anda</h3>
                            <a href="/papers" class="btn btn-outline-primary mt-3">Back to Article Page</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Create Article -->
@foreach ($reviews as $review)
<div class="modal fade" id="showArticle-{{ $review->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create Article</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <h5 class="font-bold">{{ $review->paper->title }}</h5>
            <p>{{ $review->paper->abstract }}</p>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach

@foreach ($reviews as $review)
<div class="modal fade" id="updatePaper-{{ $review->paper->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Update Paper</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/papers/{{ $review->paper->id }}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" class="form-control" id="email" value="{{ $review->paper->title }}" placeholder="Enter Title">
                </div>
                <div class="form-group">
                  <label for="abstract">Abstract</label>
                  <input type="text" name="abstract" class="form-control" id="abstract" value="{{ $review->paper->abstract }}" placeholder="Enter Abstract">
                </div>
                <div class="form-group">
                    <label for="file_article">File</label>
                    <input type="file" name="file" class="form-control" id="file_article">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
