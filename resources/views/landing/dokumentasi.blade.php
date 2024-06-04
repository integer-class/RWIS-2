@extends('layouts.app_landing')

@section('title', 'Posts')


@section('main')


<article class="entry">
    <div class="entry-content">
      <!-- blog-->
      <div class="container mt-lg-3">
        <!-- Blog-->
        <div class="row gx-lg-5 gy-lg-5 gy-3 gx-lg-3 blog-post card-post-style">


            @foreach ($dokumentasi as $dokumen)
            <div class="col-lg-4">
                <article>
                  <figure class="entry-media"><a href="{{ route('show', $dokumen->id_dokumentasi) }}"><img class="lozad" src="{{ asset('thumbnail/'.$dokumen->thumbnail) }} " data-src="{{ asset('thumbnail/'.$dokumen->thumbnail) }}" alt="Entry Image"/></a>
                  </figure>
                  <div class="entry-content-wrapper">
                    <header class="entry-header">
                      <h2 class="entry-title"><a href="{{ route('show', $dokumen->id_dokumentasi) }}">{{$dokumen->judul }}</a></h2>
                      <div class="mb-2">
                        <div class="entry-meta-top"><span class="entry-meta-date"> <i class="far fa-clock"></i>{{$dokumen->tanggal}}</span>
                        </div>
                      </div>
                    </header>
                    <div class="entry-content">
                      <p>{{$dokumen->deskripsi}}</p>
                    </div>
                  </div>
                </article>
              </div>
                
            @endforeach
            
        
        
        </div>
        <!-- End Blog-->
      </div>
      <div class="container mt-6 mb-lg-8 mb-md-7 mb-5">
        <div class="row">
          <div class="col-lg-4 offset-4">
            <div class="ml-lg-7">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </article>



@endsection