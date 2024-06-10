@extends('layouts.app')

@section('title', 'Edit Penduduk')

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
                <h1>Edit Penduduk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data</a></div>
                    <div class="breadcrumb-item"><a href="#">Penduduk</a></div>
                    <div class="breadcrumb-item">Edit Penduduk</div>
                </div>
            </div>

            <h2 class="section">
                <a style="width:130px; height:38px; margin-bottom:20px" href="{{ route('penduduk.index') }}"
                    class="btn btn-lg btn-primary">Kembali</a>
            </h2>

            <div class="section-body">
                @include('sweetalert::alert')

                <div class="card">
                    <form action="{{ route('penduduk.update', $penduduk->nik) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama (sesuai di ktp) </label>
                                        <input type="text" class="form-control" name="nama"
                                            value="{{ $penduduk->nama }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" name="nik"
                                            value="{{ $penduduk->nik }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Agama</label>
                                        <select class="form-control" name="agama">
                                            <option value="Islam" {{ $penduduk->agama == 'Islam' ? 'selected' : '' }}>
                                                Islam</option>
                                            <option value="Kristen" {{ $penduduk->agama == 'Kristen' ? 'selected' : '' }}>
                                                Kristen</option>
                                            <option value="Katolik" {{ $penduduk->agama == 'Katolik' ? 'selected' : '' }}>
                                                Katolik</option>
                                            <option value="Hindu" {{ $penduduk->agama == 'Hindu' ? 'selected' : '' }}>
                                                Hindu</option>
                                            <option value="Budha" {{ $penduduk->agama == 'Budha' ? 'selected' : '' }}>
                                                Budha</option>
                                            <option value="Konghucu"
                                                {{ $penduduk->agama == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status Kawin</label>
                                        <select class="form-control" name="status_perkawinan">
                                            <option value="Kawin"
                                                {{ $penduduk->status_perkawinan == 'Kawin' ? 'selected' : '' }}>Kawin
                                            </option>
                                            <option value="Belum Kawin"
                                                {{ $penduduk->status_perkawinan == 'Belum Kawin' ? 'selected' : '' }}>Belum
                                                Kawin</option>
                                            <option value="Cerai"
                                                {{ $penduduk->status_perkawinan == 'Cerai' ? 'selected' : '' }}>Cerai
                                            </option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Gologongan darah</label>
                                        <select class="form-control" name="golongan_darah">
                                            <option value="A"
                                                {{ $penduduk->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                                            <option value="B"
                                                {{ $penduduk->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                                            <option value="AB"
                                                {{ $penduduk->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                                            <option value="O"
                                                {{ $penduduk->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="L" {{ $penduduk->jenis_kelamin == 'L' ? 'selected' : '' }}>
                                                Laki-laki</option>
                                            <option value="P" {{ $penduduk->jenis_kelamin == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tanggal lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir"
                                            value="{{ $penduduk->tanggal_lahir }}">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>RT</label>
                                        <select class="form-control" name="id_rt">
                                            <option value="">Select RT</option>
                                            @foreach ($rt as $r)
                                                <option value="{{ $r->id_rt }}"
                                                    {{ $penduduk->id_rt == $r->id_rt ? 'selected' : '' }}>
                                                    {{ $r->nama_rt }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <select class="form-control" name="pekerjaan" id="pekerjaan">
                                            <option value="PNS" {{ $penduduk->pekerjaan == 'PNS' ? 'selected' : '' }}>
                                                PNS</option>
                                            <option value="TNI" {{ $penduduk->pekerjaan == 'TNI' ? 'selected' : '' }}>
                                                TNI</option>
                                            <option value="Polri" {{ $penduduk->pekerjaan == 'Polri' ? 'selected' : '' }}>
                                                Polri</option>
                                            <option value="Karyawan Swasta"
                                                {{ $penduduk->pekerjaan == 'Karyawan Swasta' ? 'selected' : '' }}>Karyawan
                                                Swasta</option>
                                            <option value="Wiraswasta"
                                                {{ $penduduk->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta
                                            </option>
                                            <option value="Petani"
                                                {{ $penduduk->pekerjaan == 'Petani' ? 'selected' : '' }}>Petani</option>
                                            <option value="Nelayan"
                                                {{ $penduduk->pekerjaan == 'Nelayan' ? 'selected' : '' }}>Nelayan</option>
                                            <option value="Buruh"
                                                {{ $penduduk->pekerjaan == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                            <option value="Pedagang"
                                                {{ $penduduk->pekerjaan == 'Pedagang' ? 'selected' : '' }}>Pedagang
                                            </option>
                                            <option value="Guru" {{ $penduduk->pekerjaan == 'Guru' ? 'selected' : '' }}>
                                                Guru</option>
                                            <option value="Dokter"
                                                {{ $penduduk->pekerjaan == 'Dokter' ? 'selected' : '' }}>Dokter</option>
                                            <option value="Pelajar/Mahasiswa"
                                                {{ $penduduk->pekerjaan == 'Pelajar/Mahasiswa' ? 'selected' : '' }}>
                                                Pelajar/Mahasiswa</option>
                                            <option value="Ibu Rumah Tangga"
                                                {{ $penduduk->pekerjaan == 'Ibu Rumah Tangga' ? 'selected' : '' }}>Ibu
                                                Rumah Tangga</option>
                                            <option value="Tidak Bekerja"
                                                {{ $penduduk->pekerjaan == 'Tidak Bekerja' ? 'selected' : '' }}>Tidak
                                                Bekerja</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Range Gaji </label>
                                        <input type="number" class="form-control" name="pendapatan"
                                            value="{{ $penduduk->pendapatan }}">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status Sosial</label>
                                        <select class="form-control" name="status_sosial">
                                            <option value="Janda"
                                                {{ $penduduk->status_sosial == 'Janda' ? 'selected' : '' }}>Janda</option>
                                            <option value="yatimpiatu"
                                                {{ $penduduk->status_sosial == 'yatimpiatu' ? 'selected' : '' }}>Yatim
                                                Piatu</option>
                                            <option value="Lainnya"
                                                {{ $penduduk->status_sosial == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status Rumah</label>
                                        <select class="form-control" name="status_rumah">
                                            <option value="milik"
                                                {{ $penduduk->status_rumah == 'milik' ? 'selected' : '' }}>Milik Sendiri
                                            </option>
                                            <option value="Sewa"
                                                {{ $penduduk->status_rumah == 'Sewa' ? 'selected' : '' }}>Sewa</option>
                                            <option value="Kontrak"
                                                {{ $penduduk->status_rumah == 'Kontrak' ? 'selected' : '' }}>Kontrak
                                            </option>
                                            <option value="Lainnya"
                                                {{ $penduduk->status_rumah == 'Lainnya' ? 'selected' : '' }}>Lainnya
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Status Kesehatan</label>
                                        <select class="form-control" name="status_kesehatan">
                                            <option value="Sehat"
                                                {{ $penduduk->status_kesehatan == 'Sehat' ? 'selected' : '' }}>Sehat
                                            </option>
                                            <option value="Sakit"
                                                {{ $penduduk->status_kesehatan == 'Sakit' ? 'selected' : '' }}>Sakit
                                            </option>
                                            <option value="Disabilitas"
                                                {{ $penduduk->status_kesehatan == 'Disabilitas' ? 'selected' : '' }}>
                                                Disabilitas</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nomor KK <span style="color:red;">(Jika tidak memiliki KK, <a
                                                    href="{{ route('kartu-keluarga.create') }}">buat
                                                    disini</a>)</span></label>

                                        <input type="text" class="form-control" name="nomor_kk" id="tags"
                                            value="{{ $penduduk->nomor_kk }}"s>
                                    </div>
                                </div>



                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alamat </label>
                                        <textarea style="height: 100px" class="form-control" name="alamat">{{ $penduduk->alamat }}</textarea>
                                    </div>
                                </div>





                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Roles</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="3"
                                                    class="selectgroup-input" checked="">
                                                <span class="selectgroup-button">Penduduk</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="2"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">RT</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="roles" value="1"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">RW</span>
                                            </label>

                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Status</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="hidup"
                                                    class="selectgroup-input"
                                                    {{ $penduduk->status == 'hidup' ? 'checked' : '' }}>
                                                <span class="selectgroup-button">Hidup</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="meninggal"
                                                    class="selectgroup-input"
                                                    {{ $penduduk->status == 'meninggal' ? 'checked' : '' }}>
                                                <span class="selectgroup-button">Meninggal</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="status" value="pindah"
                                                    class="selectgroup-input"
                                                    {{ $penduduk->status == 'pindah' ? 'checked' : '' }}>
                                                <span class="selectgroup-button">Pindah</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

@endsection

@push('scripts')
    <script>
        $(function() {
            var availableTags = [
                @foreach ($kartukeluarga as $kk)
                    {
                        label: "{{ $kk->nomor_kk }} - {{ $kk->kepalakeluarga }}",
                        value: "{{ $kk->nomor_kk }}",
                    },
                @endforeach
            ];
            $("#tags").autocomplete({
                source: availableTags,
                select: function(event, ui) {
                    $(this).val(ui.item.label);
                    return false;
                }
            });
        });
    </script>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
@endpush
