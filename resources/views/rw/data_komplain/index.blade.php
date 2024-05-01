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
                <h1>Komplain</h1>
                <div class="section-header-button">
                    {{-- <a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a> --}}
                  
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data</a></div>
                    <div class="breadcrumb-item">komplain</div>
                </div>
            </div>
            <div class="section-body">
                {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}



                <div class="row mt-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <form method="GET" action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" name="search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>                            </div>
                           
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-bordered table-md table">
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            {{-- <th>Rt</th> --}}
                                            <th>Created At</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>

                                        @foreach ($komplain as $k)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $k->penduduk->nama }}</td>
                                            {{-- <td>{{ $k->penduduk->rt }}</td> --}}
                                            <td>{{ $k->created_at }}</td>
                                            <td>
                                               
                                                @if ($k->status_komplain == 'Diproses')
                                                    <div class="badge badge-primary">Diproses</div>
                                                @elseif ($k->status_komplain == 'Diterima')
                                                    <div class="badge badge-warning">Diterima</div>
                                                @elseif ($k->status_komplain == 'Selesai')
                                                    <div class="badge badge-success">Selesai</div>
                                                @endif
                                               
                                            </td>
                                            <td><a href="#"
                                                    class="btn btn-secondary">Detail</a></td>   
                                        </tr>   
                                        @endforeach

{{-- 
                                        <tr>
                                            <td>1</td>
                                            <td>Irwansyah Saputra</td>
                                            <td>2017-01-09</td>
                                            <td>
                                                <div class="badge badge-success">Active</div>
                                            </td>
                                            <td><a href="#"
                                                    class="btn btn-secondary">Detail</a></td>
                                        </tr> --}}
                                       
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

