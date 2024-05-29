@extends('layouts.app')

@section('title', 'Edit Pengumuman')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pengumuman</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form action="{{ route('rt.rt_data_pengumuman.update', $pengumuman->id_pengumuman) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Judul Pengumuman</label>
                                    <input type="text" class="form-control" name="judul" value="{{ $pengumuman->judul }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipe Pengumuman</label>
                                    <select class="form-control" name="kepentingan" required>
                                        <option value="Sangat Penting" {{ $pengumuman->kepentingan == 'Sangat Penting' ? 'selected' : '' }}>Sangat Penting</option>
                                        <option value="Penting" {{ $pengumuman->kepentingan == 'Penting' ? 'selected' : '' }}>Penting</option>
                                        <option value="Sedang" {{ $pengumuman->kepentingan == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                                        <option value="Biasa" {{ $pengumuman->kepentingan == 'Biasa' ? 'selected' : '' }}>Biasa</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Masa Berlaku</label>
                                    <input type="date" class="form-control" name="masa_berlaku" value="{{ $pengumuman->tanggal_pengumuman }}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Foto (opsional)</label>
                                    <input type="file" class="form-control" name="foto">
                                    @if ($pengumuman->foto)
                                        <img src="{{ asset('pengumuman/' . $pengumuman->foto) }}" alt="Foto Pengumuman" class="img-fluid mt-2">
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Isi Pengumuman</label>
                                    <textarea class="form-control" name="isi_pengumuman" rows="5" required>{{ $pengumuman->isi_pengumuman }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>RT yang Dipilih</label>
                                    <select class="form-control select2" multiple="multiple" name="rt[]" required>
                                        @foreach($rt as $r)
                                            <option value="{{ $r->id_rt }}" {{ in_array($r->id_rt, $pengumuman->rt->pluck('id_rt')->toArray()) ? 'selected' : '' }}>{{ $r->nama_rt }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <button class="btn btn-secondary" type="reset">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
