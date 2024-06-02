@extends('layouts.app')

@section('title', 'Category')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Penduduk</h1>
                <div class="section-header-button">
                    <a href="{{ route('penduduk.create') }}" class="btn btn-primary">Tambah Penduduk</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data</a></div>
                    <div class="breadcrumb-item">Penduduk</div>
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
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>RT</th>
                                            <th>Role</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($penduduk as $p)
                                            <tr>
                                                <td>{{ $p->nik }}</td>
                                                <td>{{ $p->nama }}</td>
                                                <td>{{ $p->jenis_kelamin }}</td>
                                                <td>{{ $p->alamat }}</td>
                                                <td>{{ $p->nama_rt }}</td>
                                                <td>
                                                    @if ($p->role=='2')
                                                        <div class="badge badge-success">Ketua RT</div>
                                                    @elseif ($p->role=='3')
                                                        <div class="badge badge-info">Warga</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a href="#" data-toggle="dropdown" class="btn btn-outline-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('penduduk.show', $p->nik)}}" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                                            <a href="{{ route('penduduk.edit', $p->nik) }}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                            <a href="#" class="dropdown-item has-icon swal-confirm-archive" data-id="{{ $p->nik }}"><i class="far fa-trash-alt"></i> Arsip</a>
                                                            <div class="dropdown-divider"></div>
                                                        </div>
                                                    </div>
                                                    <form id="archive-form-{{ $p->nik }}" action="{{ route('penduduk.arsip', $p->nik) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>
                                                </td>
                                            </tr>
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
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>

    <script>
       document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.swal-confirm-archive').forEach(function (element) {
        element.addEventListener('click', function (event) {
            event.preventDefault();
            const id = this.getAttribute('data-id');
            Swal.fire({
                title: 'Are you sure?',
                text: 'Once archived, this record will be moved to the archive!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, archive it!',
                cancelButtonText: 'No, keep it'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('archive-form-' + id).submit();
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Cancelled', 'Your record is safe :)', 'error');
                }
            });
        });
    });
});
    </script>
@endpush
