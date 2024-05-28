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

            <div class="section-body">
                @include('sweetalert::alert')

                {{-- <h2 class="section-title">Users</h2> --}}



                <div class="card">
                    <form action="{{ route('kartu-keluarga.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">

                            <div class="row" >
                                
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nomor KK</label>
                                    <input type="number"
                                        class="form-control"
                                        name="nomor_kk">
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label>Kepala Keluarga</label>
                                    <input type="text"
                                        class="form-control"
                                        name="kepalakeluarga">
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="number"
                                        class="form-control"
                                        name="rt">
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="number"
                                        class="form-control"
                                        name="rw">
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Kelurahan</label>
                                    <input type="text"
                                        class="form-control"
                                        name="kelurahan">
                                </div>
                            </div>
                            {{-- <div class="col-md-4">
                                <div class="form-group">
                                    <label>Kelurahan </label>
                                    <input style="height: 100px" class="form-control" name="alamat"></input>
                                </div>
                            </div> --}}

                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text"
                                        class="form-control"
                                        name="kecamatan">
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Kabupaten</label>
                                    <input type="text"
                                        class="form-control"
                                        name="kabupaten">
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text"
                                        class="form-control"
                                        name="provinsi">
                                </div>
                            </div>

                            



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>alamat </label>
                                    <textarea style="height: 100px" class="form-control" name="alamat"></textarea>
                                </div>
                            </div>

                    
         

                          

                            

                          

                            

                            

                            {{-- <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Roles</label>
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="roles" value="3" class="selectgroup-input"
                                                checked="">
                                            <span class="selectgroup-button">Penduduk</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="roles" value="2" class="selectgroup-input">
                                            <span class="selectgroup-button">RT</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="roles" value="1" class="selectgroup-input">
                                            <span class="selectgroup-button">RW</span>
                                        </label>
    
                                    </div>
                                </div> 
                            </div> --}}
                                
                            
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

