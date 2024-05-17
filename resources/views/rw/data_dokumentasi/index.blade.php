@extends('layouts.app')

@section('title', 'Posts')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">

        <link rel="stylesheet"
        href="{{ asset('library/ionicons201/css/ionicons.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <a href="{{ route('dokumentasi.create') }} " class="btn btn-primary">Tambah Dokumentasi </a>
                {{-- <div class="section-header-button">
                    <a href="features-post-create.html"
                        class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Komplain</a></div>
                    <div class="breadcrumb-item">Semua Komplain</div>
                </div>
            </div>
            <div class="section-body">
              <div class="row">

                @foreach ( $dokumentasi as $dokumen )

                <div class="col-12 col-sm-6 col-md-6 col-lg-4">
                    <article class="article article-style-b">
                        <div class="article-header">
                            <div class="article-image"
                                data-background="{{ asset('storage/thumbnail/'.$dokumen->thumbnail) }}">
                            </div>
                            <div class="article-badge">
                                <div class="article-badge-item bg-danger"><i class="fas fa-fire"></i> {{ $dokumen->kategori }} </div>
                            </div>
                        </div>
                        <div class="article-details">
                            <div class="article-title">
                                <h2><a href="#"> {{ $dokumen->judul }}</a></h2>
                            </div>
                            <p>{{ $dokumen->deskripsi }}</p>
                            <div class="article-cta">
                                <a href="{{ route('dokumentasi.show', $dokumen->id_dokumentasi) }}">Lihat<i class="fas fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </article>
                </div>

              
                
                    
                @endforeach

                
              
               
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
