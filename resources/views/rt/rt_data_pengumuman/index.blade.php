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
                 <a href="{{ route('rt_pengumuman.create') }}" class="btn btn-primary">Tambah Pengumuman</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Pengumuman</a></div>
                    <div class="breadcrumb-item">Pengumuman</div>
                </div>
            </div>
            <div class="section-body">
               



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
                                            <th>Kepentingan</th>
                                            <th>
                                                Nama Pembuat
                                            </th>
                                            <th>
                                                Masa Berlaku
                                            </th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach ($pengumuman as $k)
                                        <tr>
                                           
                                            <td>      
                                                  {{$k->judul}}
                                                <div class="table-links">
                                                    <a href="
                                                    {{ route('rt_pengumuman.show', $k->id_pengumuman ) }}
                                                    ">View</a>
                                                    <div class="bullet"></div>
                                                    {{-- {{
                                                        $huruf = $k->id_pengumuman
                                                    }} --}}
                                                    <a href="{{ route('rt_pengumuman.edit', $k->id_pengumuman) }}">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="#"
                                                        class="text-danger">Trash</a>
                                                </div>
                                            </td>
                                            <td>
                                                {{$k->kepentingan}}
                                            
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <img alt="image"
                                                        src="{{ asset('img/avatar/avatar-5.png') }}"
                                                        class="rounded-circle"
                                                        width="35"
                                                        data-toggle="title"
                                                        title="">
                                                    <div class="d-inline-block ml-1">{{ $k->nama }}</div>
                                                </a>
                                            </td>
                                            <td>
                                                {{ $k->tanggal_pengumuman }}

                                            </td>
                                            <td>

                                                @if ($k->tanggal_pengumuman > date('Y-m-d'))
                                                    <div class="badge badge-success">Aktif</div>
                                                @else
                                                    <div class="badge badge-danger">Tidak Aktif</div>
                                                @endif

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
