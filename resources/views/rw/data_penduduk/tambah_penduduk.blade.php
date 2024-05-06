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
                <h1>Tambah Penduduk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data</a></div>
                    <div class="breadcrumb-item"><a href="#">Penduduk</a></div>
                    <div class="breadcrumb-item">Tambah Penduduk</div>
                </div>
            </div>

            <div class="section-body">
                {{-- <h2 class="section-title">Users</h2> --}}

                @include('sweetalert::alert')


                <div class="card">
                    <form action="{{ route('penduduk.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">

                            <div class="row" >
                                
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nama (sesuai di ktp) </label>
                                    <input type="text"
                                        class="form-control"
                                        name="nama">
                                </div>
                            </div>

                            <div class="col-md-12" >
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number"
                                        class="form-control"
                                        name="nik">
                                </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control" name="agama">
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                    
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Status Kawin</label>
                                    <select class="form-control" name="status_perkawinan">
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Kawin">Belum Kawin</option>
                                        <option value="Cerai">Cerai</option>
                                    </select>
                                </div>
                            </div>

                          

                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Gologongan darah</label>
                                    <select class="form-control" name="golongan_darah">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4" >
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal lahir</label>
                                    <input type="date" class="form-control" name="tanggal_lahir">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>RT</label>
                                    <select class="form-control" name="id_rt">
                                        <option value="">Select RT</option>
                                        @foreach($rt as $r)
                                            <option value="{{ $r->id_rt }}">{{ $r->nama_rt }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Pekerjaan </label>
                                    <input type="text"
                                        class="form-control"
                                        name="pekerjaan">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Nomor KK <span style="color:red;">(Jika tidak memiliki KK, <a href="{{ route('kartu-keluarga.create') }}">buat disini</a>)</span></label>

                                    <input type="text"
                                        class="form-control"
                                        name="nomor_kk">
                                </div>
                            </div>

                            

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>alamat </label>
                                    <textarea style="height: 100px" class="form-control" name="alamat"></textarea>
                                </div>
                            </div>

                            

                            

                            <div class="col-md-12">
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

