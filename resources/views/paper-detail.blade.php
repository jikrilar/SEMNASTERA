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
                        <h3 style="text-transform: uppercase">{{ $paper->title_ind }}</h3>
                        <i style="text-transform: uppercase">{{ $paper->title_en }}</i>
                        <br>
                        <div class="mt-3">
                            <span class="font-bold">{{ $paper->Author->User->name }}</span>
                        </div>
                        <div class="mt-5">
                            <h4>ABSTRACT</h4>
                            <p>{{ $paper->abstract_ind }}</p>
                        </div>
                        <div class="mt-3">
                            <i>{{ $paper->abstract_en }}</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
