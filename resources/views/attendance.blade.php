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
                        <h4 class="page-title">Attendance</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            @if (Auth::user()->role == 'admin')
                                @if ($attendances->count())
                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Name</th>
                                                <th class="border-top-0">Status Absensi</th>
                                                <th class="border-top-0">Cetak Sertifikat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($authors as $author)
                                            <tr>
                                                <td>{{ $author->User->name }}</td>
                                                <td>
                                                    @if ($author->Attend->count())
                                                    <p class="text-success font-bold">Sudah Absen</p>
                                                    @else
                                                    <form action="/attend/{{ $author->id }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">Absen</button>
                                                    </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="/print/{{ $author->id }}" class="btn btn-primary @if ($author->Attend->count() == 0)
                                                        disabled
                                                    @endif">Print</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <h2>Absensi Belum Dibuka</h2>
                                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createAttendance">Buka Absensi</button>
                                @endif
                            @else
                                @foreach ($attendances as $attendance)
                                @if ($attendances->count())
                                <a href="{{ $attendance->meet_link }}">Segera Bergabung ke Google Meet</a>
                                <h2 class="font-bold my-3">Absen Semnastera {{ $attendance->Agenda->date }}</h2>
                                <form action="/attend/{{ Auth::user()->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" @if ($attends->count()) disabled @endif>Absen</button>
                                </form>
                                @if ($attends->count())
                                @foreach ($attends as $attend)
                                    <p class="text-secondary">Anda telah absen pada {{ $attend->created_at }}</p>
                                    <a href="/print/{{ Auth::user()->id }}" class="btn btn-primary">Cetak Sertifikat</a>
                                @endforeach
                                @endif
                                @else
                                <h2>Absen Semnastera {{ ($attendance->Agenda->date)->year }} Belum Dibuka</h2>
                                @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Create Speaker --}}
<div class="modal fade" id="createAttendance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Start Attendance</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/attendances" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="meet_link">Google Meet Link</label>
                        <input type="text" name="meet_link" class="form-control @error('meet_link') is-invalid @enderror" required value="{{ old('meet_link') }}">
                        @error('meet_link')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="start_time">Start Time</label>
                        <input type="time" name="start_time" class="form-control @error('start_time') is-invalid @enderror" required value="{{ old('start_time') }}">
                        @error('start_time')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input type="time" name="end_time" class="form-control @error('end_time') is-invalid @enderror" required value="{{ old('end_time') }}">
                        @error('end_time')
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

@if (Session::has('message'))
    <script>
        swal("Message","{{ Session::get('message') }}",'success',{
            button:true,
            button:"Ok",
            timer:3000
        });
    </script>
@endif
