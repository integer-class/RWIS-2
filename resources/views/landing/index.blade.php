@extends('layouts.app_landing')

@section('title', 'Posts')


@section('main')

<link rel="stylesheet" href="{{ asset('css/landing.css')}}">

<article class="entry">
    <div class="entry-content">
        <!-- head title-->
        <div class="seventy-five-percent-bg">
            <div class="pt-lg-6 pb-lg-0 pt-md-6 pb-md-7 pt-5 pb-5">
                <div class="container mt-2 mb-lg-7">
                    <div class="row">
                        <div class="col-lg-6 mn-7 order-lg-1"><img
                                src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhrhQxd2o5adxbbtb7lPa3Ss4AsmBRXEsqCPiOJ7qfetfH0SXFlSg781a9bmtZMCr7WmUoqSyt0bEbjSXBv2xhDMH_BdqXP1DHSGhefoS6rjVfw00HulX1OzW9kbbrFA79LhP8NAOs3O6aM3eRQWPTvCVB5PUosBXJRfBHgskRPheV6hksFWzXAz3jg67g3/s1600/WhatsApp%20Image%202023-08-26%20at%2010.57.06.jpeg"
                                alt="home"></div>
                        <div class="col-lg-6 col-md-12 pb-lg-4 my-auto">
                            <div class="mt-lg-0 mt-md-5 mt-4">
                                <div class="pr-lg-6 pr-md-6">
                                    <h1 class="mt-3 mb-4 text-white">RWKU</h1>
                                    <div class="pt-2">
                                        <p class="lead mb-4 text-white">Situs web RWKU hadir untuk mempererat tali silaturahmi antar warga. Dengan platform ini, informasi penting dapat dibagikan dengan cepat, berita terbaru selalu tersedia, agenda kegiatan terupdate, dan segala info relevan sehari-hari bisa diakses dengan mudah. Bergabunglah dengan kami untuk tetap terhubung dan selalu mendapatkan kabar terbaru dari lingkungan sekitar!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- content title-->
        <div style="text-align: -webkit-center" class="container pt-lg-8 pb-lg-5 pt-md-6 pb-md-5 pt-5 pb-4">

            <div class="col-lg-9 mb-7">

                <div class="row">
                    <div class="col-sm-4 mb-4">
                        <h1 class="mb-3 display-4 timer" data-from="0" data-to="{{ $kartukeluarga }}" data-speed="5000"
                            data-refresh-interval="50"></h1>
                        <h5 class="mb-3">Rukun Tetangga</h5>
                    </div>
                    <div class="col-sm-4 mb-4">
                        <h1 class="mb-3 display-4 timer" data-from="0" data-to="{{ $penduduk }}" data-speed="5000"
                            data-refresh-interval="50"></h1>
                        <h5 class="mb-3">Penduduk</h5>
                    </div>
                    <div class="col-sm-4 mb-4">
                        <h1 class="mb-3 display-4 timer" data-from="0" data-to="{{ $kartukeluarga }}" data-speed="5000"
                            data-refresh-interval="50"></h1>
                        <h5 class="mb-3">Kartu Keluarga</h5>
                    </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="pr-lg-5 text-center">
                        <h1 class="mt-3 mb-4">VISI-MISI RWKU</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- icon box-->
        <div class="container mt-2">
            <div class="row gx-lg-5">
                <div class="col-lg-4">
                    <div class="icon-box">
                        <div class="px-4 py-5">
                            <div class="px-2">
                                <i class="fas fa-shield-alt icon-border "></i>
                                <h4 class="mb-3 text-white">AMAN</h4>
                                <p class="mb-0 text-white">Aplikasi ini aman digunakan dan sangat privasi</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-md-4 mt-3">
                    <div class="icon-box">
                        <div class="px-4 py-5">
                            <div class="px-2">
                                <i class="fas fa-handshake icon-border "></i>
                                <h4 class="mb-3 text-white ">MUDAH DIGUNAKAN</h4>
                                <p class="mb-0 text-white">Semua WARGA bisa menggunakan Aplikasi ini</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-lg-0 mt-md-4 mt-3">
                    <div class="icon-box">
                        <div class="px-4 py-5">
                            <div class="px-2">
                                <i class="fas fa-file-contract icon-border "></i>
                                <h4 class="mb-3 text-white ">MEMUDAHKAN MENCARI INFORMASI</h4>
                                <p class="mb-0 text-white">WARGA mudah untuk mencari informasi terbaru</p>
                            </div>
                        </div>
                    </div>
                </div>


        
        
        
        <!--one place-->
        <div class="container mt-lg-8 mt-md-6 mt-5">
            <div class="row gx-lg-5">
                <div class="col-lg-6 order-lg-1"><img src="{{ asset('assets/images/team/phonee.jpg') }}"
                        alt="home"></div>
                <div class="col-lg-6 col-md-12 pb-lg-4 my-auto">
                    <div class="mt-lg-0 mt-md-5 mt-3">
                        <div class="pr-lg-9 pr-md-7 pr-4">
                            <h1 class="mt-3 mb-4">
                                <marquee behavior="slide">Tentang Aplikasi</marquee>
                            </h1>
                            <p class="mb-lg-5 mb-md-4 mb-4">Selamat datang di web <B>RWKU</B>.  Kami menghargai privasi
                                Anda dan berkomitmen untuk melindungi data pribadi yang Anda bagikan kepada kami.
                                Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan
                                melindungi informasi pribadi Anda.</p>
                            <p class="mb-lg-5 mb-md-4 mb-4">Informasi lebih lanjut klik dibawah ini.</p>
                            <a class="btn btn-cornflower-blue" href="page-contact.html">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-lg-7 mb-lg-5 mt-md-6 mb-md-4 mt-5 mb-4">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="mb-4">Kegiatan Terakhir Warga</h1>
                    <div class="pr-6">
                        <p>Berikut adalah beberapa kegiatan terbaru yang telah diadakan oleh warga, guna mempererat
                            kebersamaan dan meningkatkan kesejahteraan Rw.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- property-->
        <div class="container">


            <div class="row gx-lg-5 gy-lg-5 gy-3 gx-lg-3 blog-post card-post-style">


                <!-- File: resources/views/landing/index.blade.php -->

                @foreach ($dokumentasi as $index => $dokumen)
                    <div class="col-lg-4">
                        <article>
                            <figure class="entry-media">
                                <a href="">
                                    <img class="lozad" src="{{ asset('thumbnail/' . $dokumen->thumbnail) }}"
                                        data-src="{{ asset('thumbnail/' . $dokumen->thumbnail) }}" alt="Entry Image" />
                                </a>
                            </figure>
                            <div class="entry-content-wrapper">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="{{ route('show', $dokumen->id_dokumentasi) }}"> {{ $dokumen->judul }}
                                        </a></h2>
                                    <div class="mb-2">
                                        <div class="entry-meta-top">
                                            <span class="entry-meta-date">
                                                <i class="far fa-clock"></i>
                                                <!-- Hari berdasarkan tanggal -->
                                                {{ $hari[$index] }}, {{ $dokumen->tanggal }}
                                            </span>
                                        </div>
                                    </div>
                                </header>
                                <div class="entry-content">
                                    <p>{{ $dokumen->deskripsi }}</p>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach



            </div>





        </div>
        <div class="container text-center">
            <a class="btn btn-cornflower-blue text-white mt-2" href="{{ route('landing_dokumentasi') }}">
                View more
            </a>
        </div>
        <!-- team-->
        <div class="bg-athens-gray mt-lg-8 mt-md-7 mt-6">
            <div class="py-lg-8 py-md-6 py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="mb-4">Struktur RW</h1>
                        </div>
                    </div>
                </div>
                <div class="container mt-lg-5 mt-md-4 mt-4">
                    <div class="row gx-lg-5 gy-5">
                        <div class="col-lg-4 mt-lg-5">
                            <div class="member-image"><img src="{{ asset('assets/images/team/uzii.jpg') }}"
                                    alt="team"></div>
                            <div class="member-content">
                                <div class="member-text">
                                    <h5 class="member-name">Uzi</h5>
                                    <div class="member-tag"><span class="member-role">Sekretaris</span></div>
                                    <ul class="list-unstyled list-inlinetrue">
                                        <li class="list-inline-item"><a class="pr-2 text-ebony-clay"
                                                href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a class="pr-2 text-ebony-clay"
                                                href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a class="pr-2 text-ebony-clay"
                                                href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-lg-6 mt-lg-6 mt-md-6 mt-9">
                            <div class="member-image"><img src="{{ asset('assets/images/team/.jpg') }}"
                                    alt="team"></div>
                            <div class="member-content">
                                <div class="member-text">
                                    <h5 class="member-name">Nathan</h5>
                                    <div class="member-tag"><span class="member-role">Ketua</span></div>
                                    <ul class="list-unstyled list-inlinetrue">
                                        <li class="list-inline-item"><a class="pr-2 text-ebony-clay"
                                                href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a class="pr-2 text-ebony-clay"
                                                href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a class="pr-2 text-ebony-clay"
                                                href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mt-lg-4 mt-lg-5 mt-md-6 mt-5">
                            <div class="member-image"><img src="{{ asset('assets/images/team/.jpg') }}"
                                    alt="team"></div>
                            <div class="member-content">
                                <div class="member-text">
                                    <h5 class="member-name">Udin</h5>
                                    <div class="member-tag"><span class="member-role">Bendahara</span></div>
                                    <ul class="list-unstyled list-inlinetrue">
                                        <li class="list-inline-item"><a class="pr-2 text-ebony-clay"
                                                href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li class="list-inline-item"><a class="pr-2 text-ebony-clay"
                                                href="#"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a class="pr-2 text-ebony-clay"
                                                href="#"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container text-center mt-5"><a class="btn btn-cornflower-blue text-white mt-2"
                        href="page-agents.html">View Members</a></div>
            </div>
        </div>
        <!-- ready to get started-->
        <div class="bg-cornflower-blue">
            <div class="container">
                <div class="py-lg-8 py-md-7 py-6">
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <div class="text-center">
                                <h1 class="mb-3 text-white">Ready to get started?</h1>
                                <div class="pt-3">
                                    <p class="px-lg-6 mb-5 text-white">Situs web RW bertujuan memperkuat koneksi warga,
                                        memfasilitasi pertukaran informasi penting, menyediakan berita terbaru, agenda
                                        kegiatan, dan info relevan sehari-hari. </p>
                                </div><a class="btn btn-white text-cornflower-blue" href="page-contact.html">Contact
                                    Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>


@endsection
<!-- Footer-->

<!-- End Footer-->
<!-- javascript files-->
<!-- jquery-->

<!-- lozad js-->
