@extends('layouts.app')

@section('title', 'Category')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengumuman</h1>
                <div class="section-header-button">
                    {{-- <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a> --}}
                    <a href="{{ route('pengumuman.create') }}" class="btn btn-primary">Tambah Pengumuman</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data</a></div>
                    <div class="breadcrumb-item">Penduduk</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}



                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <div class="float-right">
                                    {{-- <form method="GET" action="{{ route('category.index') }}"> --}}
                                        <form method="GET" action="">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                           
                                            <th>Judul</th>
                                            <th>Kategori Komplain</th>
                                            <th>
                                                nama Pelapor
                                            </th>
                                            <th>
                                                Tanggal
                                            </th>
                                            <th>Status</th>
                                        </tr>
                                        {{-- @foreach ($komplain as $k) --}}
                                        <tr>
                                           
                                            <td>      
                                                  {{-- {{$k->judul_komplain}} --}}
                                                <div class="table-links">
                                                    <a href="
                                                    {{-- {{ route('komplain.show') }} --}}
                                                    ">View</a>
                                                    <div class="bullet"></div>
                                                    <a href="#">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#"
                                                        class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                                {{-- {{$k->kategori_komplain->nama_kategori_komplain}} --}}
                                            
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image"
                                                        src="{{ asset('img/avatar/avatar-5.png') }}"
                                                        class="rounded-circle"
                                                        width="35"
                                                        data-toggle="title"
                                                        title="">
                                                    {{-- <div class="d-inline-block ml-1">{{ $k->penduduk->nama }}</div> --}}
                                                </a>
                                            </td>
                                            <td>
                                                {{-- {{ $k->created_at->format('Y-m-d') }} --}}

                                            </td>
                                            <td>
{{--                                                 
                                                @if ($k->status_komplain == 'Diproses')
                                                    <div class="badge badge-primary">Diproses</div>
                                                @elseif ($k->status_komplain == 'Diterima')
                                                    <div class="badge badge-warning">Diterima</div>
                                                @elseif ($k->status_komplain == 'Selesai')
                                                    <div class="badge badge-success">Selesai</div>
                                                @endif --}}
                                            </td>
                                        </tr>
                                        {{-- @endforeach --}}
                                    </table>
                                </div>

                                

                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
