@extends('layouts.app')

@section('title', 'Modal')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <div class="section-body">


            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-user"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total</h4>
                            </div>
                            <div class="card-body">
                                Rp {{ number_format($totalPemasukan - $totalPengeluaran, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pemasukan Bulan Ini</h4>
                            </div>
                            <div class="card-body">
                                Rp {{ number_format($totalPemasukan, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Pengeluaran Bulan Ini</h4>
                            </div>
                            <div class="card-body">
                                Rp {{ number_format($totalPengeluaran, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            


          

                    
                

            <div class="card">
                <div class="card-header">
                    <h4>Filter</h4>
                </div>
                <div class="card-body">
                    @include('sweetalert::alert')

                    <form id="filterForm" method="GET" action="{{ route('iuran.index') }}">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bulan">Bulan:</label>
                                    <select class="form-control selectric" id="bulan" name="bulan">
                                        <option value="">-- Pilih Bulan --</option>
                                        <option value="1" {{ $bulan == 1 ? 'selected' : '' }}>Januari</option>
                                        <option value="2" {{ $bulan == 2 ? 'selected' : '' }}>Februari</option>
                                        <option value="3" {{ $bulan == 3 ? 'selected' : '' }}>Maret</option>
                                        <option value="4" {{ $bulan == 4 ? 'selected' : '' }}>April</option>
                                        <option value="5" {{ $bulan == 5 ? 'selected' : '' }}>Mei</option>
                                        <option value="6" {{ $bulan == 6 ? 'selected' : '' }}>Juni</option>
                                        <option value="7" {{ $bulan == 7 ? 'selected' : '' }}>Juli</option>
                                        <option value="8" {{ $bulan == 8 ? 'selected' : '' }}>Agustus</option>
                                        <option value="9" {{ $bulan == 9 ? 'selected' : '' }}>September</option>
                                        <option value="10" {{ $bulan == 10 ? 'selected' : '' }}>Oktober</option>
                                        <option value="11" {{ $bulan == 11 ? 'selected' : '' }}>November</option>
                                        <option value="12" {{ $bulan == 12 ? 'selected' : '' }}>Desember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="tahun">Tahun:</label>
                                    <select class="form-control selectric" id="tahun" name="tahun">
                                        <option value="">-- Pilih Tahun --</option>
                                        @for ($i = date('Y'); $i >= 2020; $i--)
                                            <option value="{{ $i }}" {{ $tahun == $i ? 'selected' : '' }}>
                                                {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-center">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table-striped table">
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal</th>
                                        <th>Jenis</th>
                                        <th>Jumlah</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($iuran as $tr)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $tr->created_at }}</td>
                                            <td>
                                                @if ($tr->status == 'pemasukan')
                                                    <span class="badge badge-success">Pemasukan</span>
                                                @else
                                                    <span class="badge badge-danger">Pengeluaran</span>
                                                @endif
                                            </td>

                                            <td>

                                                Rp {{ number_format( $tr->jumlah, 2, ',', '.') }}
                                               
                                            
                                            </td>



                                            {{-- <td>{{ $tr->nomor_kk }} - {{ $tr->kepalakeluarga }}</td> --}}

                                            
                                            <td>
                                              
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal{{ $tr->id_iuran }}">
                                                        Detail
                                                    </button>

                                               
                                                
                                            </td>
                                        </tr>

                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="exampleModal{{ $tr->id_iuran }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Detail</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <h6><strong>Tanggal :</strong></h6>
                                                        <p id="tanggal">
                                                            {{ $tr->created_at }}
                                                        </p>
                                        
                                                        <h6><strong>Nama:</strong></h6>
                                                        <p id="nama">
                                                            {{ $tr->kepalakeluarga }}
                                                        </p>


                                                        <h6><strong>Jumlah:</strong></h6>
                                                        <p id="nama">
                                                            {{ $tr->jumlah }}
                                                        </p>



    
                                                       
                                                        <h6><strong>Jenis:</strong></h6>
                                                        <p id="status_komplain">
                                                            @if ($tr->status == 'pemasukan')
                                                                <div class="badge badge-primary">Pemasukan</div>
                                                                
                                                            @elseif ($tr->status == 'pengeluaran')
                                                            <div class="badge badge-danger">Pengeluaran</div>
    
                                                            @endif
                                                        </p>
    
    
                                                        @if ($tr->keterangan != null)
                                                            <h6><strong>Keterangan:</strong></h6>

                                                            <p id="nama">
                                                                {{ $tr->keterangan }}
                                                            </p>
                                                        @endif
                                        
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </table>
                            </div>
                            <div class="float-right">
                            {{ $iuran->withQueryString()->links() }}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/prismjs/prism.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/bootstrap-modal.js') }}"></script>
@endpush
