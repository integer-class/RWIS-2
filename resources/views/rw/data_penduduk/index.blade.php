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
                <h1>Penduduk</h1>
                <div class="section-header-button">
                    {{-- <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a> --}}
                    <a href="{{ route('penduduk.create') }}" class="btn btn-primary">Tambah Penduduk</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Data</a></div>
                    <div class="breadcrumb-item">Penduduk</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}



                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <div class="float-right">
                                    {{-- <form method="GET" action="{{ route('category.index') }}"> --}}
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
                                            {{-- <th>No</th> --}}
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
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
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
                                                    {{-- <div class="d-flex justify-content-center">
                                                        
                                                    
                                                        <a href='{{ route('penduduk.edit', $p->nik) }}' class="btn btn-sm btn-success btn-icon">
                                                            <i class="fas fa-eye"></i> View
                                                        </a>
                                                        <span style="margin-left: 10px;"></span>
                                                        <a href='{{ route('penduduk.edit', $p->nik) }}' class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i> Edit
                                                        </a>
                                                        
                                                        <form action="{{ route('penduduk.destroy', $p->nik) }}" method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>
                                                        </form>
                                                    
                                                     
                                                        
                                                    </div> --}}

                                                    <div style="margin-left: -20px" class="dropdown">
                                                        <a href="#"
                                                            data-toggle="dropdown"
                                                            class="btn btn-outline-primary dropdown-toggle">Options</a>
                                                        <div class="dropdown-menu">
                                                            <a href="{{ route('penduduk.show', $p->nik)}}"
                                                                class="dropdown-item has-icon"><i class="fas fa-eye"></i> View</a>
                                                            <a href="{{ route('penduduk.edit', $p->nik) }}"
                                                                class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a href=""
                                                                class="dropdown-item has-icon text-danger"><i
                                                                    class="far fa-trash-alt"></i> Delete</a>
                                                        </div>
                                                    </div>
                                                    
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
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
