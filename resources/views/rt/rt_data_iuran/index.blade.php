@extends('layouts.app')

@section('title', 'Modal')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/prismjs/themes/prism.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Filter</h4>
                </div>
                <div class="card-body">
                    @include('sweetalert::alert')

                    <form id="filterForm" method="GET" action="{{ route('rt_iuran.index') }}">
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
                                        <th>Nomor KK</th>
                                        <th>Kepala Keluarga</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($result as $kk)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kk->nomor_kk }}</td>
                                            <td>{{ $kk->kepalakeluarga }}</td>
                                            <td>
                                                @if ($kk->sudah_bayar == 'sudah')
                                                    <span class="badge badge-success">Lunas</span>
                                                @else
                                                    <span class="badge badge-danger">Belum Lunas</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($kk->sudah_bayar == 'belum')
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal{{ $kk->nomor_kk }}">
                                                        Bayar Iuran
                                                    </button>

                                                @else
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal{{ $kk->nomor_kk }}" disabled>
                                                        Bayar Iuran
                                                    </button>
                                                @endif
                                                
                                            </td>
                                        </tr>

                                        <div class="modal fade" tabindex="-1" role="dialog"
                                            id="exampleModal{{ $kk->nomor_kk }}">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Bayar Iuran</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('rt_iuran.store') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="nomor_kk"
                                                                value="{{ $kk->nomor_kk }}">
                                                            <input type="hidden" name="bulan"
                                                                value="{{ $bulan }}">
                                                            <input type="hidden" name="tahun"
                                                                value="{{ $tahun }}">
                                                            <div class="form-group">
                                                                <label for="nomor_kk">Nomor KK:</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $kk->nomor_kk }}" disabled>

                                                                <label style="margin-top : 10px" for="kepalakeluarga">Kepala
                                                                    Keluarga:</label>
                                                                <input type="text" class="form-control"
                                                                    value="{{ $kk->kepalakeluarga }}" disabled>

                                                                <label style="margin-top : 10px"
                                                                    for="jumlah">Jumlah:</label>
                                                                <input type="text" class="form-control" name="jumlah"
                                                                    value="100000" required>
                                                            </div>
                                                            <div class="modal-footer bg-whitesmoke br">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </table>
                            </div>
                            {{-- <div class="float-right">
                            {{ $categories->withQueryString()->links() }}
                        </div> --}}
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
