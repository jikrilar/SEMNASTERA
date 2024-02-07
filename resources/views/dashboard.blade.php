@extends('layouts.admin')
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    @include('layouts.header')
    @include('layouts.sidebar')
    <div class="page-wrapper">
        <div class="page-breadcrumb bg-white">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="container-fluid">
            @if (Auth::user()->role == 'admin')
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">User Total</h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            <li class="ms-auto"><span class="counter text-success">{{ $numberOfAuthors }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Paper Total</h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash2"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            <li class="ms-auto"><span class="counter text-purple">{{ $numberOfPapers }}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="white-box analytics-info">
                        <h3 class="box-title">Semnastera Ke</h3>
                        <ul class="list-inline two-part d-flex align-items-center mb-0">
                            <li>
                                <div id="sparklinedash3"><canvas width="67" height="30"
                                        style="display: inline-block; width: 67px; height: 30px; vertical-align: top;"></canvas>
                                </div>
                            </li>
                            <li class="ms-auto"><span class="counter text-info">{{ $numberOfAgenda }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @else
            <div class="row justify-content-center">
                <div class="white-box">
                    <h3 class="font-bold">Welcome Back</h3>
                    <p class="text-muted">{{ Auth::user()->name }}</p>
                </div>
                <div class="white-box">
                    <p>Seminar Nasional Teknologi dan Riset Terapan (Semnastera) merupakan suatu forum satu tahunan yang diselenggarakan oleh Politeknik Sukabumi untuk kegiatan deseminasi hasil-hasil penelitian. Forum ini dapat dijadikan ajang bertukar informasi dalam bidang teknologi dan riset terapan bagi para akademisi, peneliti, praktisi industri, maupun instansi pemerintahan.</p>
                    <p>Topik makalah yang diterima untuk dipresentasikan meliputi bidang teknik dan non teknik, diantaranya: Teknologi Elektro dan Informatika, Teknologi Mesin dan Industri, Teknologi Sipil dan Lingkungan, serta Teknologi Bisnis dan Kewirausahaan.</p>
                    <p>Prosiding Semnastera 2019 tersedia secara online pada laman http://semnastera.polteksmi.ac.id dan telah teregistrasi pada ISSN Elektronik 2715-4602. Prosiding telah terindeks pada Google Scholar dan Garuda.</p>
                    {{-- <div class="justify-content-center align-items-center">
                        <img src="{{ asset('img/prosiding2023.png') }}" alt="" style="max-width: 300px">
                    </div> --}}
                    <div class="mt-3">
                        <a href="/submission" class="btn btn-primary">Submit Your Paper</a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
