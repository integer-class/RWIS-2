@extends('layouts.app')

@section('title', 'Posts')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Penduduk</h1>
                <div class="section-header-button">
                    {{-- <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a> --}}
                    {{-- <a href="{{ route('penduduk.create') }}" class="btn btn-primary">Tambah Penduduk</a> --}}
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Komplain</a></div>
                    <div class="breadcrumb-item">Detail Komplain</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <h2 class="section-title">Posts</h2>
                <p class="section-lead">
                    You can manage all posts, such as editing, deleting and more.
                </p> --}}

        
                <a href="{{ route('rt_komplain.index') }}" class="btn btn-primary">Kembali</a>

                <div class="row">
                  
                </div>
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Detail Komplain</h4>
                            </div>
                            
                            <div class="card-body">
                                <!-- Gambar Laporan -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <img src="https://cloud.jpnn.com/photo/jatim/news/normal/2023/09/25/tumpukan-sampah-yang-mulai-menutup-setengah-badan-jalan-di-j-ml8v.jpg" class="img-fluid" alt="Laporan Image">
                                    </div>
                                    <!-- Detail Laporan -->
                                    @include('sweetalert::alert')

                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Judul:</strong>
                                                <p>
                                                    {{ $komplain->judul_komplain }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Date:</strong>
                                                <p>
                                                    {{ $komplain->created_at->format('Y-m-d') }}

                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Pelapor:</strong>
                                                <p>
                                                    {{ $komplain->penduduk->nama }}
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Kategori:</strong>
                                                <p>
                                                    {{ $komplain->kategori_komplain->nama_kategori_komplain }}

                                                </p>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <strong>Deskripsi:</strong>
                                                <p>{{$komplain->isi_komplain}}</p>
                                            </div>
                                        </div>
                                       
                                        
                                        <!-- Form untuk mengubah status -->
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <strong>Status:</strong>
                                                <form action="{{ route('rt_komplain.update', $komplain->id_komplain) }}" method="POST">
                                                    {{ csrf_field() }}
                                                    {{ method_field('PUT') }}
                                                    <div class="form-group">

                                                        <select name="status_komplain" class="form-control" id="status">
                                                        
{{-- 
                                                            <option value="Diproses">Diproses</option>
                                                            <option value="Selesai">Selesai</option> --}}

                                            
                                                            
                                                            <option value="Diproses" {{ $komplain->status_komplain == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                                            <option value="Selesai" {{ $komplain->status_komplain == 'Selesai' ? 'selected' : '' }}>Selesai</option>

                                                            
                                                        </select>
                                                    </div>
                                                    <input type="hidden" name="id_komplain" value="{{ $komplain->id_komplain }}">

                                                    <button type="submit" class="btn btn-primary">Update Status</button>
                                                </form>
                                            </div>
                                        </div>
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
