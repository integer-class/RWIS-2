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
                <h1>Posts</h1>
                <div class="section-header-button">
                    <a href="features-post-create.html"
                        class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Posts</a></div>
                    <div class="breadcrumb-item">All Posts</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Posts</h2>
                <p class="section-lead">
                    You can manage all posts, such as editing, deleting and more.
                </p>

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
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <strong>Title:</strong>
                                                <p>Nama Laporan</p>
                                            </div>
                                            <div class="col-md-6">
                                                <strong>Date:</strong>
                                                <p>5 Mei 2024</p>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <strong>Description:</strong>
                                                <p>Deskripsi singkat tentang laporan.</p>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <strong>Details:</strong>
                                                <p>Detail tambahan tentang laporan.</p>
                                            </div>
                                        </div>
                                        <!-- Form untuk mengubah status -->
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <strong>Status:</strong>
                                                <form>
                                                    <div class="form-group">
                                                        <select class="form-control" id="status">
                                                            <option value="on-going">On-going</option>
                                                            <option value="resolved">Resolved</option>
                                                            <option value="closed">Closed</option>
                                                        </select>
                                                    </div>
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
