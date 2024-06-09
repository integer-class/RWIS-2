@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
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
                                {{ $penduduk }}
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
                                <a href="{{ route('komplain.index') }}"
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
                                    </tbody>
                                </table>
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




    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

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

   


  


    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
@endpush
