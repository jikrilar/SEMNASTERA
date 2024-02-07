@extends('layouts.admin')

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    @include('layouts.header')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Paper</h4>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="col-6">
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                @foreach ($users as $user)
                                <div class="form-group">
                                    <label for="picture">Picture</label>
                                    @if ($user->picture)
                                        <img src="{{ asset('storage/' . $user->picture) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                    @else
                                        <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    <input type="file" name="picture" class="form-control" id="picture" onchange="previewImage()" @error('picture') is-invalid @enderror required>
                                    @error('picture')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="mobile_number">Mobile Number</label>
                                    <input type="text" name="mobile_number" class="form-control" id="mobile_number" placeholder="Enter Mobile Number" @error('mobile_number') is-invalid @enderror value="{{ $user->mobile_number }}">
                                    @error('mobile_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="institution">Institution</label>
                                    <input type="text" name="institution" class="form-control" id="institution" placeholder="Enter Institution" @error('institution') is-invalid @enderror value="{{ $user->institution }}">
                                    @error('institution')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Gender</label>
                                    <div class="form-check" id="gender" name="gender">
                                        <input type="radio" name="gender" class="form-check-input" id="male" value="male">
                                        <label for="male" class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check" id="gender" name="gender">
                                        <input type="radio" name="gender" class="form-check-input" id="female" value="female">
                                        <label for="female" class="form-check-label">Female</label>
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Submit</button>
                                @endforeach
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function previewImage() {

        const image = document.querySelector('#picture');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();

        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
