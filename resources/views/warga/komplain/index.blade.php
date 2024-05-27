@extends('layouts.app')

@section('title', 'Posts')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">



        {{-- <section class="section"> --}}





        

     
            <div class="section-body">
                

                <div class="row">
                    
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('warga_komplain.create') }} " class="btn btn-primary">Tambah Komplain </a>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table-striped table-md table">
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>

                                        @foreach ($komplain as $komplains)

                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <a href="#">{{ $komplains->judul_komplain }}</a>
                                            </td>
                                            <td>{{ $komplains->kategori_komplain->nama_kategori_komplain }}</td>
                                            <td>
                                                {{ $komplains->created_at }}
                                            </td>
                                            <td>
                                                @if ($komplains->status_komplain == 'Diproses')
                                                <div class="badge badge-primary">Diproses</div>
                                            @elseif ($komplains->status_komplain == 'Diterima')
                                                <div class="badge badge-warning">Diterima</div>
                                            @elseif ($komplains->status_komplain == 'Selesai')
                                                <div class="badge badge-success">Selesai</div>
                                            @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#exampleModal{{ $komplains->id_komplain }}" >
                                                        Detail
                                                    </button>
                                            </td>

                                        </tr>



                                        <div class="modal fade" tabindex="-1" role="dialog"
                                        id="exampleModal{{ $komplains->id_komplain }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Detail Komplain</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6><strong>Judul Keluhan:</strong></h6>
                                                    <p id="judul_komplain">
                                                        {{ $komplains->judul_komplain }}
                                                    </p>
                                    
                                                    <h6><strong>Isi Keluhan:</strong></h6>
                                                    <p id="isi_komplain">
                                                        {{ $komplains->isi_komplain }}
                                                    </p>

                                                    <h6><strong>Kategori Keluhan:</strong></h6>
                                                    <p id="id_kategori_komplain">
                                                        {{ $komplains->kategori_komplain->nama_kategori_komplain }}
                                                    </p>
                                    
                                                    <h6><strong>Status Keluhan:</strong></h6>
                                                    <p id="status_komplain">
                                                        @if ($komplains->status_komplain == 'Diproses')
                                                            <div class="badge badge-primary">Diproses</div>
                                                            
                                                        @elseif ($komplains->status_komplain == 'Diterima')
                                                            <div class="badge badge-warning">Diterima</div>

                                                        @elseif ($komplains->status_komplain == 'Selesai')
                                                            <div class="badge badge-success">Selesai</div>

                                                        @endif
                                                    </p>


                                                    @if ($komplains->foto_komplain != null)
                                                        <h6><strong>Foto Keluhan:</strong></h6>
                                                        <img src="{{ asset('komplain/' . $komplains->foto_komplain) }}" alt="Foto Keluhan" width="200px">
                                                    @endif
                                    
                                                   
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                            
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link"
                                                href="#"
                                                tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link"
                                                href="#">1 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item">
                                            <a class="page-link"
                                                href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link"
                                                href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link"
                                                href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>

    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>


    <script src="{{ asset('library/dropzone/dist/min/dropzone.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/components-multiple-upload.js') }}"></script>
    <!-- Include SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script type="text/javascript">
  
        Dropzone.autoDiscover = false;

  
        var myDropzone = new Dropzone(".dropzone", { 
            // init: function() { 
            //     myDropzone = this;

            //     $.each(images, function(key,value) {
            //         var mockFile = { name: value.name, size: value.filesize};
     
            //         myDropzone.emit("addedfile", mockFile);
            //         myDropzone.emit("thumbnail", mockFile, value.path);
            //         myDropzone.emit("complete", mockFile);
          
            //     });
            // },
           autoProcessQueue: false,
           paramName: "files",
           uploadMultiple: true,
           maxFilesize: 5,
           acceptedFiles: ".jpeg,.jpg,.png,.gif",
           addRemoveLinks: false // Disable delete option
        });
      
        $('#uploadFile').click(function(){
           myDropzone.processQueue();
        });
        // Add this code to handle the response after uploading images
        myDropzone.on("success", function(file, response) {
            // Display success message using SweetAlert
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: response.message
            });
        });
  
</script>
@endpush
