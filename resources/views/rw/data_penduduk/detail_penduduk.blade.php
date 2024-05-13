@extends('layouts.app')

@section('title', 'Profile')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content">

        <div class="section">
            <div class="section-header">
                <h1>Penduduk</h1>
                <div class="section-header-button">
                    {{-- <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a> --}}
                    <a href="{{ route('penduduk.create') }}" class="btn btn-primary">Tambah Penduduk</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data</a></div>
                    <div class="breadcrumb-item">Penduduk</div>
                </div>
            </div>


            <div class="section-body">
                <div class="">
                    <div style="margin-left: 30px;margin-top:90px" class="row">

                        <div class="col-md-3">
                            <div class="">
                                <img style="border-radius:50px;"
                                    src="https://akademik.polinema.ac.id/upload_dir/foto_ktm_valid/2022/1667983329-nr2z6-QX8b8.jpg"
                                    alt="profile" class="img-fluid">
                            </div>

                            <div class="" style="margin-top: 20px;">
                                <div style="border-radius: 100px; border: 2px solid blue; height: 55px; padding: 10px; text-align: center; overflow: visible;" class="card">
                                    <div class="card-body" style="margin: 0;">
                                      <h4 style="margin: -10px;  white-space: nowrap; text-overflow: ellipsis;">
                                        {{$penduduk->nama}}
                                      </h4>
                                    </div>
                                  </div>
                                  
                                
                                
                                
                              

                                

                                <div class="form-group">
                                    <select style="height: 50px" class="form-control">
                                        <option>Warga</option>
                                        <option>Option 2</option>
                                        <option>Option 3</option>
                                    </select>
                                </div>


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-primary">
                                            <i class="far fa-user"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Total Komplain</h4>
                                            </div>
                                            <div class="card-body">
                                                10
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="card card-statistic-1">
                                        <div class="card-icon bg-success">
                                            <i class="fas fa-circle"></i>
                                        </div>
                                        <div class="card-wrap">
                                            <div class="card-header">
                                                <h4>Jumlah Keluarga</h4>
                                            </div>
                                            <div class="card-body">
                                                47
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-header">
                                    <h4>Alamat</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="nik">NIK</label>
                                        <input type="text" class="form-control" id="nik" value="1234567890"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <input type="text" class="form-control" id="jenis_kelamin" value="Laki-laki"
                                            readonly>
                                    </div>
                                    <div class="form-group ">
                                        <label for="tempat_lahir">Golongan Darah</label>
                                        <input type="text" class="form-control lg" id="tempat_lahir" value="B"
                                            readonly>
                                    </div>
        
                                    <div class="form-group">
                                        <label for="tanggal_lahir">Tanggal Lahir</label>
                                        <input type="text" class="form-control" id="tanggal_lahir" value="1990-01-01"
                                            readonly>
                                    </div>

                                    <div class="form-group ">
                                        <label for="tempat_lahir">Agama</label>
                                        <input type="text" class="form-control lg" id="tempat_lahir" value="Islam"
                                            readonly>
                                    </div>

                                    <div class="form-group ">
                                        <label for="tempat_lahir">Status Perkawinan</label>
                                        <input type="text" class="form-control lg" id="tempat_lahir" value="Islam"
                                            readonly>
                                    </div>
                                </div>
                                
                                
                            </div>


                            
                               
                           
                            
                             
                        </div>


                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Actions</h4>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="btn btn-primary btn-lg btn-block">Edit</a>
                                    <a href="#" class="btn btn-danger btn-lg btn-block">Delete</a>
                                </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Actions</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-border">
                                    <li class="media">
                                        <img alt="image" class="rounded-circle mr-3" width="50" src="http://127.0.0.1:8001/img/avatar/avatar-1.png">
                                        <div class="media-body">
                                            <div class="font-weight-bold mt-0 mb-1">Hasan Basri</div>
                                            <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i>
                                                Kepala Keluarga</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img alt="image" class="rounded-circle mr-3" width="50" src="http://127.0.0.1:8001/img/avatar/avatar-2.png">
                                        <div class="media-body">
                                            <div class="font-weight-bold mt-0 mb-1">Bagus Dwi Cahya</div>
                                            <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i>
                                                Anggota Keluarga</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img alt="image" class="rounded-circle mr-3" width="50" src="http://127.0.0.1:8001/img/avatar/avatar-3.png">
                                        <div class="media-body">
                                            <div class="font-weight-bold mt-0 mb-1">Wildan Ahdian</div>
                                            <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i>
                                                Anggota Keluarga</div>
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img alt="image" class="rounded-circle mr-3" width="50" src="http://127.0.0.1:8001/img/avatar/avatar-4.png">
                                        <div class="media-body">
                                            <div class="font-weight-bold mt-0 mb-1">Rizal Fakhri</div>
                                            <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i>
                                                Anggota Keluarga</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>


                        
                          


                    </div>


                </div>


            </div>
        @endsection

        @push('scripts')
            <!-- JS Libraies -->
            <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

            <!-- Page Specific JS File -->
        @endpush
