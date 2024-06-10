@extends('layouts.app')

@section('title', 'Category')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kartu Keluarga</h1>
                <div class="section-header-button">
                    {{-- <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a> --}}
                    {{-- <a href="{{ route('kartu-keluarga.create') }}" class="btn btn-primary">Tambah Kartu Keluarga</a> --}}
                </div>
                
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data</a></div>
                    <div class="breadcrumb-item">Kartu Keluarga</div>
                </div>
                
            </div>
            <div class="section-body">
                    <a style="width:130px; height:38px" href="{{ route('kartu-keluarga.index') }}" class="btn btn-lg btn-primary">Kembali</a>
                {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}



                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                               

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    @if ($kartuKeluarga)
                                    <table class="table">
                                        <tr>
                                            <th>Nomor KK</th>
                                            <td>{{ $kartuKeluarga->nomor_kk }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $kartuKeluarga->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kepala Keluarga</th>
                                            <td>{{ $kartuKeluarga->kepalakeluarga }}</td>
                                        </tr>
                                        <tr>
                                            <th>RT</th>
                                            <td>{{ $kartuKeluarga->rt }}</td>
                                        </tr>
                                        <tr>
                                            <th>RW</th>
                                            <td>{{ $kartuKeluarga->rw }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kelurahan</th>
                                            <td>{{ $kartuKeluarga->kelurahan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kecamatan</th>
                                            <td>{{ $kartuKeluarga->kecamatan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kabupaten</th>
                                            <td>{{ $kartuKeluarga->kabupaten }}</td>
                                        </tr>
                                        <tr>
                                            <th>Provinsi</th>
                                            <td>{{ $kartuKeluarga->provinsi }}</td>
                                        </tr>
                                        
                                    </table>
                                @else
                                    <p>No Kartu Keluarga found for the provided nomor KK.</p>
                                @endif
                                   
                                </div>
                                {{-- <div class="float-right">
                                    {{ $categories->withQueryString()->links() }}
                                </div> --}}
                            </div>
                        </div>

                        <div class="card" >
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            {{-- <th>No</th> --}}
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Pekerjaan</th>
                                            <th>Pendapatan</th>
                                            <th>Status</th>
                                            <th>Umur</th>
                                        </tr>
                                         @foreach ($penduduk as $p)
                                            <tr>
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                                <td>{{ $p->nik }}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->jenis_kelamin }}</td>
                                                <td>{{ $p->alamat }}</td>
                                                <td>{{ $p->pekerjaan }}</td>
                                                <td>{{ $p->pendapatan}}</td>
                                                <td>{{ $p->status}}</td>
                                                <td>{{ $p->umur }}</td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>


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
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
