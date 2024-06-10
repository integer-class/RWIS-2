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
                <h1>
                    {{ $penduduk->nama }}
                </h1>
                <div class="section-header-button">
                    {{-- <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a> --}}
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data</a></div>
                    <div class="breadcrumb-item">Penduduk</div>
                </div>
            </div>
            


            <div class="section-body">
                <a style="width:130px; height:38px" href="{{ route('penduduk.index') }}" class="btn btn-lg btn-primary">Kembali</a>

                <div class="">
                    <div style="margin-left: 30px;margin-top:20px" class="row">

                        <div class="col-md-3">
                            <div class="">
                                <img style="border-radius:50px;"
                                    src=" {{ asset('penduduk/'.$penduduk->foto) }} "
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
                                  
                                
                                
                                
                              

                                

                                <div class="card">
                                <div class="card-header">
                                    <h4>Role</h4>
                                </div>
                                <div class="card-body">
                                <div class="form-group">
    
                                    <div>
                                    
                                        @if ($penduduk->role == '2')
                                            <span class="btn btn-primary btn-lg btn-block">Ketua RT</span>
                                        @elseif ($penduduk->role == '3')
                                            <span class="btn btn-primary btn-lg btn-block">Warga</span>
                                        @endif
                                    </div>
                                </div>

                                </div>
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
                                                {{
                                                    $komplain;
                                                }}
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
                                                <h4>Anggota Keluarga</h4>
                                            </div>
                                            <div class="card-body">
                                                {{
                                                    $jumlah_anggota_keluarga;
                                                }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                
                                <div class="card-body">
    <div class="row mb-3">
        <label for="nik" class="col-sm-4 col-form-label">NIK</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="nik" value="{{ $penduduk->nik }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="jenis_kelamin" class="col-sm-4 col-form-label">Jenis Kelamin</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="jenis_kelamin" value="{{ $penduduk->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="golongan_darah" class="col-sm-4 col-form-label">Golongan Darah</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="golongan_darah" value="{{ $penduduk->golong_darah }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="tanggal_lahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="tanggal_lahir" value="{{ $penduduk->tanggal_lahir }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="agama" class="col-sm-4 col-form-label">Agama</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="agama" value="{{ $penduduk->agama }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="status_perkawinan" class="col-sm-4 col-form-label">Status Perkawinan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="status_perkawinan" value="{{ $penduduk->status_perkawinan }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="alamat" value="{{ $penduduk->alamat }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-4 col-form-label">Pekerjaan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="alamat" value="{{ $penduduk->pekerjaan }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-4 col-form-label">Penghasilan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="alamat" value="{{ $penduduk->pendapatan }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-4 col-form-label">Status Sosial</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="alamat" value="{{ $penduduk->status_sosial }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-4 col-form-label">Status Kesehatan</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="alamat" value="{{ $penduduk->status_kesehatan }}" readonly>
        </div>
    </div>
    <div class="row mb-3">
        <label for="alamat" class="col-sm-4 col-form-label">Status Rumah</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="alamat" value="{{ $penduduk->status_rumah }}" readonly>
        </div>
    </div>
</div>

                                
                                
                            </div>


                            
                               
                           
                            
                             
                        </div>


                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Status</h4>
                                </div>
                                <div class="card-body">

                                  


                                    @if ($penduduk->status == 'hidup')

                                    <span class="btn btn-primary btn-lg btn-block">Hidup</span>


                                    @elseif ($penduduk->status == 'meninggal')

                                    <span  class="btn btn-danger btn-lg btn-block">Meninggal</span> 


                                    @elseif ($penduduk->status == 'pindah')

                                    <span  class="btn btn-warning btn-lg btn-block">Pindah</span>



                                        
                                    @endif




                                    {{-- @foreach ( as $d  )
                                        
                                    @endforeach
                                    <a href="#" class="btn btn-primary btn-lg btn-block">Hidup</a>
                                    <a href="#" class="btn btn-primary btn-lg btn-block">Pindah</a>
                                    <a href="#" class="btn btn-danger btn-lg btn-block">Meninggal</a> --}}
                                </div>
                                
                        </div>
                        @if(isset($penduduk_kk) && $penduduk_kk->count() > 0)
                        <div class="card">
                            <div class="card-header">
                                <h4>Anggota Keluarga</h4>
                            </div>
                            <div class="card-body">
                                @foreach ($penduduk_kk as $keluarga)
                                    <ul class="list-unstyled list-unstyled-border">
                                        <li class="media">
                                            <img alt="image" class="rounded-circle mr-3" width="50" src="{{asset('penduduk/'. $penduduk->foto)}}">
                                            <div class="media-body">
                                                <div class="font-weight-bold mt-0 mb-1">
                                                    <a style="color: black" href="{{ route('penduduk.show', $keluarga->nik)}}">{{ $keluarga->nama }}</a>
                                                </div>
                                                <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i>
                                                    Anggota
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    @endif



                        

                        
                    


                        
                          


                    </div>


                </div>


            </div>
        @endsection

        @push('scripts')
            <!-- JS Libraies -->
            <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

            <!-- Page Specific JS File -->
        @endpush
