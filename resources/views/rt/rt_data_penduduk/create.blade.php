@extends('layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Penduduk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data</a></div>
                    <div class="breadcrumb-item"><a href="#">Penduduk</a></div>
                    <div class="breadcrumb-item">Tambah Penduduk</div>
                </div>
            </div>

            <h2 class="section">
                <a style="width:130px; height:38px; margin-bottom:20px" href="{{ route('penduduk.index') }}" class="btn btn-lg btn-primary">Kembali</a>
            </h2>

            <div class="section-body">
                {{-- <h2 class="section-title">Users</h2> --}}
                @include('sweetalert::alert')

                <div class="card">
                    <form action="{{ route('penduduk.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama (sesuai di ktp) </label>
                                        <input type="text"
                                            class="form-control"
                                            name="nama" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number"
                                            class="form-control"
                                            name="nik" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="form-control" name="agama" required>
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="katolik">Katolik</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="budha">Budha</option>
                                            <option value="konghucu">Konghucu</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status Kawin</label>
                                        <select class="form-control" name="status_perkawinan" required>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Belum Kawin">Belum Kawin</option>
                                            <option value="Cerai">Cerai</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gologongan darah</label>
                                        <select class="form-control" name="golongan_darah" required>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin" required>
                                            <option value="L">Laki-laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <select class="form-control" name="id_rt" required>
                                            <option value="">Select RT</option>
                                            @foreach($rt as $r)
                                                <option value="{{ $r->id_rt }}">{{ $r->nama_rt }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <select class="form-control" name="pekerjaan" id="pekerjaan" required>
                                            <option value="PNS">PNS</option>
                                            <option value="TNI">TNI</option>
                                            <option value="Polri">Polri</option>
                                            <option value="Karyawan Swasta">Karyawan Swasta</option>
                                            <option value="Wiraswasta">Wiraswasta</option>
                                            <option value="Petani">Petani</option>
                                            <option value="Nelayan">Nelayan</option>
                                            <option value="Buruh">Buruh</option>
                                            <option value="Pedagang">Pedagang</option>
                                            <option value="Guru">Guru</option>
                                            <option value="Dokter">Dokter</option>
                                            <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                            <option value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                            <option value="Tidak Bekerja">Tidak Bekerja</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Range Gaji</label>
                                        <input type="number"
                                            class="form-control"
                                            name="pendapatan" required>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status Sosial</label>
                                        <select class="form-control" name="status_sosial" required>
                                            <option value="Janda">Janda
                                        </option>
                                            <option value="yatimpiatu">Yatim Piatu</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status Rumah</label>
                                        <select class="form-control" name="status_rumah" required>
                                            <option value="milik">Milik Sendiri</option>
                                            <option value="Sewa">Sewa</option>
                                            <option value="Kontrak">Kontrak</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status Kesehatan</label>
                                        <select class="form-control" name="status_kesehatan" required>
                                            <option value="Sehat">Sehat</option>
                                            <option value="Sakit">Sakit</option>
                                            <option value="Disabilitas">Disabilitas</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nomor KK <span style="color:red;">(Jika tidak memiliki KK, <a href="{{ route('kartu-keluarga.create') }}">buat disini</a>)</span></label>
                                        <input type="text"
                                            class="form-control"
                                            name="nomor_kk" id="tags" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>alamat</label>
                                        <textarea style="height: 100px" class="form-control" name="alamat" required></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Roles</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="3" class="selectgroup-input" checked="">
                                                <span class="selectgroup-button">Penduduk</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="2" class="selectgroup-input">
                                                <span class="selectgroup-button">RT</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="1" class="selectgroup-input">
                                                <span class="selectgroup-button">RW</span>
                                            </label>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
<script>
    $( function() {
      // Mengambil data penduduk dari controller Laravel dan menyimpannya dalam format yang sesuai
      var availableTags = [
        @foreach($kartukeluarga as $kk)
          {
            label: "{{ $kk->nomor_kk }} - {{ $kk->kepalakeluarga }}",
            value: "{{ $kk->nomor_kk }}",
          },
        @endforeach
      ];
      $( "#tags" ).autocomplete({
        source: availableTags,
        select: function(event, ui) {
          // Mengisi input nama kepala keluarga saat nomor KK dipilih
          $(this).val(ui.item.label);
          return false;
        }
      });
    } );
</script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
{{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
@endpush
