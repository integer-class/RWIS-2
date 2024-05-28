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
                <h1>Tambah Pengumuman</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Pengumuman</a></div>
                    <div class="breadcrumb-item">Tambah Pengumuman</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Users</h2> --}}

                <h2 class="section">
                    
                    <a style="width:130px; height:38px; margin-bottom:20px" href="{{ route('pengumuman.index') }}" class="btn btn-lg btn-primary">Kembali</a>
    
    
                </h2>

                @include('sweetalert::alert')


                <div class="card">
                    <form action="{{ route('pengumuman.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Judul Pengumuman</label>
                                        <input type="text" class="form-control" name="judul">
                                        <input type="hidden" name="id_pengumuman" value="{{ $uniqueCode }}">
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tipe Pengumuman</label>
                                        <select class="form-control" name="kepentingan">
                                            <option value="Sangat Penting">Sangat Penting</option>
                                            <option value="Penting">Penting</option>
                                            <option value="Sedang">Sedang</option>
                                            <option value="Biasa">Biasa</option>
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Masa Berlaku</label>
                                        <input type="date" class="form-control" name="masa_berlaku">
                                    </div>
                                </div>
                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Foto (opsional)</label>
                                        <input type="file" class="form-control" name="foto">
                                    </div>
                                </div>
                    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pilih RT (bisa lebih dari 1)</label>
                                        <select name="rt[]" class="form-control selectric" multiple>
                                            @foreach ($rt as $r)
                                                <option value="{{ $r->id_rt }}">{{ $r->nama_rt }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Isi pengumuman</label>
                                        <textarea style="height: 100px" class="form-control" name="isi_pengumuman"></textarea>
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




<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

<link rel="stylesheet" href="/resources/demos/style.css">
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
@endpush

