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
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row mt-5">
                        <div class="col-md-6">
                            <form action="/dashboard">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search.." name="search" id="search" value="{{ request('search') }}">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="white-box mt-3">
                        @if ($papers->count())
                        <h2 class="box-title">TABLE OF CONTENTS</h2>
                        <div class="table-responsive">
                            <table class="table text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">Issue</th>
                                        <th class="border-top-0">Title</th>
                                        <th class="border-top-0">Abstract</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($papers as $paper)
                                    <tr>
                                        <td rowspan="2" class="w-25">{{ $paper->Archive->publish_year }} <br> <br> <p>{{ $paper->Author->User->name }}</p></td>
                                        <td rowspan="2" style="white-space: initial">{{ $paper->title_ind }} <br> <i>{{ $paper->title_en }}</i></td>
                                        <td><a href="/papers/{{ $paper->id }}" class="btn btn-primary"><i class="fa fa-eye"></i></a></td>
                                    </tr>
                                    <tr>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        @if ($papers->count() == 0)
                        <h2 class="font-bold">No Paper Found</h2>
                        @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


