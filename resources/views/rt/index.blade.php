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
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Penduduk</h4>
                            </div>
                            <div class="card-body">
                                {{ $penduduk_hitung }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Keluarga</h4>
                            </div>
                            <div class="card-body">
                                {{ $kartu_keluarga }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-newspaper"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kas</h4>
                            </div>
                            <div class="card-body">
                                Rp {{ number_format($jumlah_kas, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
       
            </div>
            <div class="row">   
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics</h4>
                          
                        </div>
                        <div class="card-body">
                     

                            <canvas id="chartIuranBulanan" height="102"></canvas>

                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                Riwayat Komplain
                            </h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">

                                @foreach ($komplain as $k )
                                <li class="media">
                                    <img class="rounded-circle mr-3"
                                        width="50"
                                        src="{{ asset('penduduk/'.$k->foto) }}"
                                        alt="avatar">
                                    <div class="media-body">
                                        <div class="text-primary float-right">
                                            {{
                                                $k->created_at->diffForHumans()
                                            
                                            }}
                                        </div>
                                        <div class="media-title"> {{$k->nama}} </div>
                                        <span class="text-small text-muted">

                                            {{

                                                Str::limit($k->isi_komplain, 50)
                                            
                                            
                                            }}
                                        </span>
                                    </div>
                                </li>
                                    
                                @endforeach
                               
                              
                            </ul>
                            <div class="pt-1 pb-1 text-center">
                                <a href="#"
                                    class="btn btn-primary btn-lg btn-round">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-body pt-2 pb-2">
                            <canvas id="chartJumlahGender" height="300"></canvas>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">   
                            <h4>Penduduk</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="chartUsiaPenduduk" height="250"></canvas>

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


    
    <script>
        // Skrip untuk Chart 1: Iuran Bulanan
        var ctx1 = document.getElementById('chartIuranBulanan').getContext('2d');
        var iuranBulanan = @json($iuran_bulanan);
        var namaBulan = @json($nama_bulan);
    
        var labels1 = iuranBulanan.map(item => namaBulan[item.bulan]);
        var data1 = iuranBulanan.map(item => item.total);
    
        var chart1 = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: labels1,
                datasets: [{
                    label: 'Jumlah Iuran Bulanan',
                    data: data1,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Jumlah Iuran Bulanan'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    
        // Skrip untuk Chart 2: Usia Penduduk
        var ctx2 = document.getElementById('chartUsiaPenduduk').getContext('2d');
        const labelsUsia = @json($labels_usia);
        const data2 = {
          labels: labelsUsia,
          datasets: [
            {
              label: 'Jumlah Penduduk',
              data: @json($data_usia),
              backgroundColor: 'rgba(54, 162, 235, 0.6)',
              borderColor: 'rgba(54, 162, 235, 1)',
              borderWidth: 1
            }
          ]
        };
    
        const config2 = {
          type: 'bar',
          data: data2,
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'top',
              },
              title: {
                display: true,
                text: 'Grafik Usia Penduduk'
              }
            },
            scales: {
              y: {
                beginAtZero: true
              }
            }
          },
        };
    
        new Chart(ctx2, config2);
    
        // Skrip untuk Chart 3: Jumlah Laki-laki dan Perempuan
        var ctx3 = document.getElementById('chartJumlahGender').getContext('2d');
        var chart3 = new Chart(ctx3, {
            type: 'doughnut',
            data: {
                labels: ['Laki-laki', 'Perempuan'],
                datasets: [{
                    label: 'Jumlah',
                    data: [@json($jumlah_laki), @json($jumlah_perempuan)],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Jumlah Laki-laki dan Perempuan'
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
    </script>


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
                          

                            <form method="post" enctype="multipart/form-data" action="{{ route('rt_dashboard.update', $penduduk->nik) }}">
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
    <script src="{{ asset('js/page/features-post-create.js') }}"></script> --}}
@endpush
