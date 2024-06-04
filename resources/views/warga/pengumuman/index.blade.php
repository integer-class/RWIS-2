@extends('layouts.app')

@section('title', 'Pengumuman')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pengumuman</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Pengumuman</a></div>
                    <div class="breadcrumb-item">Pengumuman</div>
                </div>
            </div>
            <div class="section-body">
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
                                            <th>Judul</th>
                                            <th>Kepentingan</th>
                                            <th>Nama Pembuat</th>
                                            <th>Masa Berlaku</th>
                                            <th>Status</th>
                                        </tr>
                                        @foreach ($pengumuman_rtt as $p)
                                            <tr>
                                                <td>
                                                    {{ $p->judul }}
                                                    <div class="table-links">
                                                        <a href="#" data-toggle="modal" data-target="#exampleModal{{ $p->id }}">View</a>
                                                    </div>
                                                </td>
                                                <td>{{ $p->kepentingan }}</td>
                                                <td>
                                                    <a href="#">
                                                        <img alt="image" src="{{ asset('img/avatar/avatar-5.png') }}" class="rounded-circle" width="35">
                                                        <div class="d-inline-block ml-1">{{ $p->nama }}</div>
                                                    </a>
                                                </td>
                                                <td>{{ $p->tanggal_pengumuman }}</td>
                                                <td>{{ $p->status ?? 'N/A' }}</td> <!-- Tambahkan status -->
                                            </tr>

                                            <!-- Modal -->
                                            <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal{{ $p->id }}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Detail Pengumuman</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <h6><strong>Judul:</strong></h6>
                                                            <p id="judul">{{ $p->judul }}</p>

                                                            <h6><strong>Kepentingan:</strong></h6>
                                                            <p id="kepentingan">{{ $p->kepentingan }}</p>

                                                            <h6><strong>Tanggal Berlaku :</strong></h6>
                                                            <p id="tanggal">{{ $p->tanggal_pengumuman }}</p>

                                                            <h6><strong>Isi :</strong></h6>
                                                            <p id="nama">{{ $p->isi_pengumuman }}</p>

                                                            <h6><strong>Foto :</strong></h6>
                                                            @if ($p->foto)
                                                            <img src="{{ asset('pengumuman/' . $p->foto) }}" alt="Foto Pengumuman" width="200px">
                                                        @else
                                                            <p>Tidak ada foto</p>
                                                        @endif

                                                            

                                                        
                                                            <!-- Tambahkan atribut lainnya sesuai kebutuhan -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
