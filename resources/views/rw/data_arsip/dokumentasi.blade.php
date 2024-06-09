@extends('layouts.app')

@section('title', 'Posts')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Arsip</h1>
                {{-- <div class="section-header-button">
                    <a href="features-post-create.html"
                        class="btn btn-primary">Add New</a>
                </div> --}}
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Arsip</a></div>
                    <div class="breadcrumb-item">Arsip Dokumentasi</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <h2 class="section-title">Posts</h2>
                <p class="section-lead">
                    You can manage all posts, such as editing, deleting and more.
                </p> --}}

                <div class="row">
                    <div class="col-12">
                        <div class="card mb-0">
                            <div class="card-body">
                                <ul class="nav nav-pills">
                                 
                                    <li class="nav-item">
                                        <a class="nav-link" href=" {{route('arsip.index') }} ">
                                            Penduduk <span class="badge badge-primary">
                                                {{ $penduduk_hitung}}
                                            </span>
                                        </a>
                                            
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('arsip.pengumuman') }}">
                                            Pengumuman <span class="badge badge-primary">
                                                {{ $pengumuman_hitung }}
                                            </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link active"
                                            href="{{ route('arsip.dokumentasi') }}">Dokumentasi<span class="badge badge-white"> 
                                                {{ $dokumentasi_hitung}}
                                                 </span></a>
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
                                <h4>Arsip Warga</h4>
                            </div>
                            <div class="card-body">
                          
                                <div class="float-right">
                                    <form method="GET" >
                                        <div class="input-group">
                                            <input name="search" type="text"
                                                class="form-control"
                                                placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table-striped table">
                                            <tr>
                                                <th>Nama Dokumentasi</th>
                                                <th>Tanggal</th>
                                                <th>Kategori</th>
                                                <th>Keterangan</th>
                                                <th>Action</th>
                                            </tr>
                                            @foreach ($dokumentasi as $d)
                                                <tr>
                                                    <td>{{ $d->judul }}</td>
                                                    <td>{{ $d->tanggal }}</td>
                                                    <td>{{ $d->kategori }}</td>
                                                    <td>{{ $d->deskripsi }}</td>
                                                    
                                                    
                                                    <td>
                                                        <div class="dropdown">
                                                            <a href="#" data-toggle="dropdown" class="btn btn-outline-primary dropdown-toggle">Options</a>
                                                            <div class="dropdown-menu">
                                                                <a href="{{ route('dokumentasi.show', $d->id_dokumentasi)}}" class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                                                
                                                                <a href="#" class="dropdown-item has-icon swal-confirm-archive" data-id="{{ $d->id_dokumentasi }}">
                                                                    <i class="fas fa-trash-restore"></i>Restore
                                                                </a>
                                                                <div class="dropdown-divider"></div>
                                                            </div>
                                                        </div>
                                                        <form id="archive-form-{{ $d->id_dokumentasi }}" action="{{ route('dokumentasi.restore', $d->id_dokumentasi) }}" method="POST" style="display: none;">
                                                            @csrf
                                                            @method('PUT')
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                                <div class="float-right">
                                    {{ $dokumentasi->links() }}
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
    <script>
        document.addEventListener('DOMContentLoaded', function () {
     document.querySelectorAll('.swal-confirm-archive').forEach(function (element) {
         element.addEventListener('click', function (event) {
             event.preventDefault();
             const id = this.getAttribute('data-id');
             Swal.fire({
                 title: 'Are you sure?',
                 text: 'Once restore, this record will be moved to the restore!',
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonText: 'Yes, restore it!',
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
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
