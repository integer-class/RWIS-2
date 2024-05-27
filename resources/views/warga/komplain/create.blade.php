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
                @include('sweetalert::alert')

                <div class="card">
                    <form id="complaintForm" action="{{ route('rt_penduduk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Judul Komplain</label>
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Kategori Komplain</label>
                                        <select class="form-control" name="kategori_komplain_id" required>
                                            @foreach ($kategori as $item)
                                                <option value="{{ $item->id_kategori_komplain }}">{{ $item->nama_kategori_komplain }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Isi Komplain</label>
                                        <textarea style="height: 100px" class="form-control" name="pekerjaan" required></textarea>
                                    </div>
                                </div>

                                <!-- Dropzone Section -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Upload Files</label>
                                        <div class="dropzone" id="my-dropzone"></div>
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
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <!-- Dropzone JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>

    <script>
        Dropzone.options.myDropzone = {
            url: '{{ route('rt_penduduk.store') }}',
            autoProcessQueue: false,
            uploadMultiple: true,
            parallelUploads: 10,
            maxFiles: 10,
            paramName: 'file',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            init: function() {
                var myDropzone = this;

                this.on("sendingmultiple", function(file, xhr, formData) {
                    // Append the form data
                    $("form#complaintForm").serializeArray().forEach(function(field) {
                        formData.append(field.name, field.value);
                    });
                });

                $("form#complaintForm").on('submit', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    myDropzone.processQueue();
                });
            },
            successmultiple: function(files, response) {
                console.log(response);
                // Handle the response after a successful upload
            },
            errormultiple: function(files, response) {
                console.log(response);
                // Handle the response after a failed upload
            }
        };
    </script>
@endpush
