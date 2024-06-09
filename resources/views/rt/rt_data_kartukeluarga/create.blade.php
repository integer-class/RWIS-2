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
                <h1>Tambah Kartu Keluarga</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data</a></div>
                    <div class="breadcrumb-item"><a href="#">Kartu keluarga</a></div>
                    <div class="breadcrumb-item">Tambah Kartu Keluarga</div>
                </div>
            </div>
            <h2>
            <div class="section-body">
                <a style="width:120px; height:38px" href="{{ route('kartu-keluarga.index') }}" class="btn btn-lg btn-primary">Kembali</a>
</h2>
                <div class="section-body">
                    @include('sweetalert::alert')

                    <div class="card">
                        <form action="{{ route('rt_kartukeluarga.store') }}" method="POST">
                            @csrf
                            <div class="card-header">
                                <h4>Form</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nomor KK</label>
                                            <input type="number" class="form-control" name="nomor_kk" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Kepala Keluarga</label>
                                            <input type="text" class="form-control" name="kepalakeluarga" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>RT</label>
                                            <input type="number" class="form-control" name="rt" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>RW</label>
                                            <input type="number" class="form-control" name="rw" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kelurahan</label>
                                            <input type="text" class="form-control" name="kelurahan" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kecamatan</label>
                                            <input type="text" class="form-control" name="kecamatan" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Kabupaten</label>
                                            <input type="text" class="form-control" name="kabupaten" required>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Provinsi</label>
                                            <input type="text" class="form-control" name="provinsi" required>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea style="height: 100px" class="form-control" name="alamat" required></textarea>
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
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
