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
                        <h4 class="page-title">Review</h4>
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
                                            <th class="border-top-0">No</th>
                                            <th class="border-top-0">Title</th>
                                            <th class="border-top-0">Abstract</th>
                                            <th class="border-top-0">File</th>
                                            <th class="border-top-0">Operation</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $review)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="white-space: initial">{{ $review->paper->title_ind }}</td>
                                            <td><a href="/papers/{{ $review->paper->id }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                            <td><a href="/download/paper/{{ $review->paper->id }}" class="btn btn-outline-secondary"><i class="fa fa-download"></i></a></td>

                                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#review-{{ $review->id }}">Penilaian</button></td>
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

<!-- Modal -->
@foreach ($reviews as $review)
<div class="modal fade" id="review-{{ $review->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="/reviews/submit/{{ $review->id }}">
                @csrf
                <div class="form-group">
                    <label for="review-result">Hasil Review</label>
                    <div class="form-check" id="review-result" name="review-result">
                        <input type="radio" name="status" class="form-check-input" id="revision" value="revision">
                        <label for="revision" class="form-check-label">Revisi</label>
                    </div>
                    <div class="form-check" id="review-result" name="review-result">
                        <input type="radio" name="status" class="form-check-input" id="passed" value="passed">
                        <label for="passed" class="form-check-label">Lolos</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="comment">Komentar</label>
                    <input type="hidden" name="comment" id="comment" @error('comment') is-invalid @enderror required>
                    <trix-editor input="comment"></trix-editor>
                    @error('comment')
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
