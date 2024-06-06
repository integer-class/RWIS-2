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
                <h1>Bantuan Sosial </h1>
                <div class="section-header-button">
                    {{-- <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a> --}}
                    {{-- <a href="{{ route('kartu-keluarga.create') }}" class="btn btn-primary">Tambah Kartu Keluarga</a> --}}
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data</a></div>
                    <div class="breadcrumb-item">Kartu Keluarga</div>
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
                                            <th>No</th>
                                            <th>Nomor KK</th>
                                            <th>Alamat</th>
                                            <th>Kepala Keluarga</th>
                                            <th>Skor</th>
                                            <th>Action</th>
                                        </tr>
                                    
                                        @foreach($kartu_keluarga as $kk)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $kk->nomor_kk }}</td>
                                                <td>{{ $kk->alamat }}</td>
                                                <td>{{ $kk->kepala_keluarga }}</td>
                                                <td>{{ $skor_kartu_keluarga[$kk->nomor_kk] ?? 'N/A' }}</td>
                                                <td>
                                                    <div style="margin-left: -20px" class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-outline-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('kartu-keluarga.show', $kk->nomor_kk) }}" class="dropdown-item has-icon">
                                                                <i class="fas fa-eye"></i> View
                                                            </a>
                                                            <a href="{{ route('kartu-keluarga.edit', $kk->nomor_kk) }}" class="dropdown-item has-icon">
                                                                <i class="far fa-edit"></i> Edit
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
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
