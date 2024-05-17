@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Dokumentasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data</a></div>
                    <div class="breadcrumb-item"><a href="#">Dokumentasi</a></div>
                    <div class="breadcrumb-item">Tambah Dokumentasi</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Users</h2> --}}

                @include('sweetalert::alert')


                <div class="card">
                    <form action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">

                            <div class="row" >
                                
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul Dokumentasi Kegiatan </label>
                                    <input type="text"
                                        class="form-control"
                                        name="judul">
                                </div>
                            </div>
                            <div class="col-md-8" >
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select class="form-control" name="kategori">
                                        <option value="Keagamaan">Keagamaan</option>
                                        <option value="Gotong Royong">Gotong Royong</option>
                                        <option value="Hajatan">Hajatan</option>
                                        <option value="Kegiatan Warga">Kegiatan Warga</option>
                                    </select>
                                    
                                </div>
                            </div>

                            <div>
                                <div class="form-group">
                                    <label>Thumnail</label>
                                    <div class="col-sm-9">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">

                                    </div>
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
    

                            </div>
                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea style="height: 100px" class="form-control" name="keterangan"></textarea>
                                   
                                </div>
                            </div>
                           

                           

                          

                        
                                
                            
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')

@endpush

