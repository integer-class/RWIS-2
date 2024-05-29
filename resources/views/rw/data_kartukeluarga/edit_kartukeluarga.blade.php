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
                <h1>Edit Kartu Keluarga</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data</a></div>
                    <div class="breadcrumb-item"><a href="#">Kartu Keluarga</a></div>
                    <div class="breadcrumb-item">Tambah Kartu Keluarga</div>
                </div>
            </div>

            <div class="section-body">
                <a style="width:130px; height:38px" href="{{ route('kartu-keluarga.index') }}" class="btn btn-lg btn-primary">Kembali</a>

                @include('sweetalert::alert')

                <div class="card">
                    <form action="{{ route('kartu-keluarga.update', $kartuKeluarga->nomor_kk) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Tambahkan ini untuk metode PUT -->
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>  
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nomor KK</label>
                                        <input type="number" class="form-control" name="nomor_kk" value="{{ old('nomor_kk', $kartuKeluarga->nomor_kk) }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kepala Keluarga</label>
                                        <input type="text" class="form-control" name="kepalakeluarga" value="{{ old('kepalakeluarga', $kartuKeluarga->kepalakeluarga) }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <input type="number" class="form-control" name="rt" value="{{ old('rt', $kartuKeluarga->rt) }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RW</label>
                                        <input type="number" class="form-control" name="rw" value="{{ old('rw', $kartuKeluarga->rw) }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <input type="text" class="form-control" name="kelurahan" value="{{ old('kelurahan', $kartuKeluarga->kelurahan) }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" value="{{ old('kecamatan', $kartuKeluarga->kecamatan) }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Kabupaten</label>
                                        <input type="text" class="form-control" name="kabupaten" value="{{ old('kabupaten', $kartuKeluarga->kabupaten) }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi" value="{{ old('provinsi', $kartuKeluarga->provinsi) }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea style="height: 100px" class="form-control" name="alamat">{{ old('alamat', $kartuKeluarga->alamat) }}</textarea>
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
