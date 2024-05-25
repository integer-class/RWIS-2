@extends('layouts.app')

@section('title', 'Posts')

@push('style')
<link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Komplain</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Komplain</a></div>
                <div class="breadcrumb-item">Semua Komplain</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('komplain.index') }}">Semua Komplain <span class="badge badge-white">{{ $jumlah_komplain }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('komplain.diterima') }}">Diterima <span class="badge badge-primary">{{ $jumlah_komplain_diterima }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('komplain.diproses') }}">Diproses <span class="badge badge-primary">{{ $jumlah_komplain_diproses }}</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('komplain.selesai') }}">Selesai <span class="badge badge-primary">{{ $jumlah_komplain_selesai }}</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Komplain warga</h4>
                        </div>
                        <div class="card-body">
                            <div class="float-right">
                                <form method="GET" action="{{ route('komplain.index') }}">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Search" value="{{ request()->search }}">
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
                                        <th>Judul</th>
                                        <th>Kategori Komplain</th>
                                        <th>Nama Pelapor</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                    </tr>
                                    @foreach ($komplain as $k)
                                    <tr>
                                        <td>{{ $k->judul_komplain }}
                                            <div class="table-links">
                                                <a href="{{ route('komplain.show', $k->id_komplain) }}">View</a>
                                                <div class="bullet"></div>
                                                <a href="#">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="#" class="text-danger">Trash</a>
                                            </div>
                                        </td>
                                        <td>{{ $k->kategori_komplain->nama_kategori_komplain }}</td>
                                        <td>
                                            <a href="#">
                                                <img alt="image" src="{{ asset('img/avatar/avatar-5.png') }}" class="rounded-circle" width="35">
                                                <div class="d-inline-block ml-1">{{ $k->penduduk->nama }}</div>
                                            </a>
                                        </td>
                                        <td>{{ $k->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            @if ($k->status_komplain == 'Diproses')
                                            <div class="badge badge-primary">Diproses</div>
                                            @elseif ($k->status_komplain == 'Diterima')
                                            <div class="badge badge-warning">Diterima</div>
                                            @elseif ($k->status_komplain == 'Selesai')
                                            <div class="badge badge-success">Selesai</div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            <div class="float-right">
                                {{ $komplain->links() }}
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
<script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
