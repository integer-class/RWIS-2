@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <div id="firstAccessMessage" style="display: none;">
            Selamat datang di dashboard RT!
        </div>
    
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (!sessionStorage.getItem('hasVisited')) {
                    sessionStorage.setItem('hasVisited', 'true');
                    document.getElementById('firstAccessMessage').style.display = 'block';
                }
            });
        </script>
        

        @include('sweetalert::alert')



        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Penduduk</h4>
                            </div>
                            <div class="card-body">
                                10
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Kas</h4>
                            </div>
                            <div class="card-body">
                                42
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-body">
                                1,201
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Online Users</h4>
                            </div>
                            <div class="card-body">
                                47
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Pengumuman</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">

                                @foreach ($pengumuman_rtt as $p )


                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('img/avatar/avatar-1.png') }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="text-primary float-right">Now</div>
                                        <div class="media-title">

                                            {{
                                                $p->judul;
                                            }}
                                        </div>
                                        <span class="text-small text-muted">

                                            {{ Str::limit($p->isi_pengumuman, 100) }}

                                            
                                            .</span>
                                    </div>
                                </li>
                                    
                                @endforeach
                                
                            </ul>
                            <div class="pt-1 pb-1 text-center">
                                <a href="{{ route('warga_pengumuman.index') }}"
                                    class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
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
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

        @if ($pengumuman_rt && $pengumuman_rt->kepentingan == 'Penting' && $tanggal_sekarang <= $pengumuman_rt->tanggal_pengumuman )
            <div class="modal fade" id="importantModal" tabindex="-1" role="dialog" aria-labelledby="importantModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="importantModalLabel">Pengumuman Penting</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{ $pengumuman_rt->isi_pengumuman }}

                            @if ($pengumuman_rt->foto == !null)
                                <img src="{{ asset('pengumuman/' . $pengumuman_rt->foto) }}" alt="foto pengumuman" style="width: 100%; height: auto;" class="mt-3" >
                                                            
                            @endif

                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>

        


    

    <script >
       

        document.addEventListener('DOMContentLoaded', function () {
                    console.log('masuk');
                    $('#importantModal').modal('show');

                   
                });
    </script>
@endif

    

    

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>


    @if ($penduduk->foto == 'default.png' || $password_default == 'yes')
            <!-- Modal HTML -->
            <div class="modal fade" id="fotoModal" tabindex="-1" role="dialog" aria-labelledby="fotoModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="fotoModalLabel">Lengkapi Data Diperlukan</h5>
                        </div>
                        <div class="modal-body">

                            @if ($penduduk->foto == 'default.png')
                                <p>Anda belum mengunggah foto profil. Silahkan unggah foto profil terlebih dahulu.</p>
                                
                            @elseif ($password_default == 'yes')
                                <p>Anda belum mengubah password default. Silahkan ubah password default terlebih dahulu.</p>
                                
                            @endif
                          

                            <form method="post" enctype="multipart/form-data" action="{{ route('warga_dashboard.update', $penduduk->nik) }}">
                                @csrf
                                @method('PUT') <!-- or @method('PATCH') -->
                            
                                @if ($password_default == 'yes')
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" placeholder="Ubah Password" name="password" class="form-control" id="password" required>
                                    </div>
                                @endif
                            
                               @if ( $penduduk->foto == 'default.png')
                               <div style="margin: auto;" id="image-preview" class="image-preview">
                                <label for="image-upload" id="image-label">Choose File</label>
                                <input type="file" name="image" id="image-upload" />
                            </div>
                                 @endif
                                
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                            
                        </div>

                        <div class="modal-footer">
                           
                    </div>
                </div>
            </div>

            <script>

                document.addEventListener('DOMContentLoaded', function () {
                    $('#fotoModal').modal('show');

                   
                });
            </script>
        @endif


         <!-- JS Libraies -->
    {{-- <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-post-create.js') }}"></script> --}}
@endpush