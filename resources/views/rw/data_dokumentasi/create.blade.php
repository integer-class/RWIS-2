@extends('layouts.app')

@section('title', 'Multiple Upload')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/dropzone/dist/dropzone.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Multiple Upload</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Components</a></div>
                    <div class="breadcrumb-item">Multiple Upload</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Multiple Upload</h2>
                <p class="section-lead">
                    We use 'Dropzone.js' made by @Dropzone. You can check the full documentation <a href="http://www.dropzonejs.com/">here</a>.
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Multiple Upload</h4>
                            </div>
                            <div class="card-body">
                                
                                <form action="{{ route('dokumentasi.store') }}" method="post" enctype="multipart/form-data" class="dropzone" id="image-upload">
                                    @csrf
                                    <div>
                                        <h4>Upload Multiple Image By Click On Box</h4>
                                    </div>
                                </form>
                                <button id="uploadFile" class="btn btn-success mt-1">Upload Images</button>
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
    <script src="{{ asset('library/dropzone/dist/min/dropzone.min.js') }}"></script>
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
        // Initialize Dropzone
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone(".dropzone", { 
            autoProcessQueue: false, // Disable automatic processing of the queue
            paramName: "files",
            uploadMultiple: true,
            maxFilesize: 5, // Maximum file size in MB
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: false // Disable delete option
        });

        // Trigger manual upload on button click
        $('#uploadFile').click(function(){
            myDropzone.processQueue(); // Manually process the queue on button click
        });

        // Handle the response after uploading images
        myDropzone.on("success", function(file, response) {
            // Display success message using SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.message // Assuming the response contains a message field
            });
        });
    </script>
@endpush
