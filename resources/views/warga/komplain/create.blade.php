@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
   
    <!-- Dropzone CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Komplain</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data</a></div>
                    <div class="breadcrumb-item"><a href="#">Penduduk</a></div>
                    <div class="breadcrumb-item">Tambah Komplain</div>
                </div>
            </div>

            <div class="section-body">

                <h2 class="section">
                    
                    <a style="width:130px; height:38px; margin-bottom:20px" href="{{ route('warga_komplain.index') }}" class="btn btn-lg btn-primary">Kembali</a>
                </h2>
                @include('sweetalert::alert')

                <div class="card">

                    <form action="{{ route('warga_komplain.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Judul Komplain</label>
                                        <input type="text" class="form-control" name="judul_komplain" required>
                                        <input type="hidden" class="form-control" value="{{ $nik }}" name="nik" required>

                                    </div>
                                </div>
                    
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Kategori Komplain</label>
                                        <select class="form-control" name="id_kategori_komplain" required>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id_kategori_komplain }}">{{ $item->nama_kategori_komplain }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                    
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Isi Komplain</label>
                                        <textarea style="height: 100px" class="form-control" name="isi_komplain" required></textarea>
                                    </div>
                                </div>
                    
                                <!-- Dropzone Section -->
                                <div class="col-md-5" >
                                    <div class="form-group">
                                        <label>Thumbnail</label>
                                        <input type="file" class="form-control @error('foto_komplain') is-invalid @enderror" name="foto_komplain" id="foto_komplain">
                                        @error('foto_komplain')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    
                   
                </div>
            </div>
        </section>
    </div>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    
@endpush
