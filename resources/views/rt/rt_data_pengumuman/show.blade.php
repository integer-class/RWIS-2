@extends('layouts.app')

@section('title', 'Detail Pengumuman')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Pengumuman</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $pengumuman->judul }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>Kepentingan:</strong> {{ $pengumuman->kepentingan }}</p>
                    <p><strong>Tanggal Berlaku:</strong> {{ $pengumuman->tanggal_pengumuman }}</p>
                    <p><strong>Isi Pengumuman:</strong> {{ $pengumuman->isi_pengumuman }}</p>
                    <p><strong>RT yang Dipilih:</strong></p>
                    <ul>

                        @foreach ($pengumuman->rt as $rt)
                            <li>{{ $rt->nama_rt }}</li>
                        @endforeach
                    </ul>

                    {{-- foto --}}
                   @if ($pengumuman->foto != null)
                   <div class="form-group">
                    <label for="foto">Foto</label>
                    <br>
                    <img src="{{ asset('pengumuman/' . $pengumuman->foto) }}" alt="foto" style="width: 200px">

                     </div>
                       
                   @endif

                    
                    
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('rt_pengumuman.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
