@extends('layouts.app_landing')

@section('title', 'Posts')


@section('main')
<div class="entry-content">

  <div class="container mt-5 pt-4">
    <div class="row">
      <div class="col-lg-8 col-md-12 offset-lg-2">
        <div class="pl-lg-5"> 
          <div class="property-block mb-0">
            <article class="property-item">
              <h2 class="content-title"><a href="">
                {{
                  $dokumentasi->judul
                }}
                
              </a></h2>
              
            </article>
          </div>
          <p class="mt-5 mb-4">
            {{
              $dokumentasi->deskripsi
            }}
            
            </p>
          <div class="mt-5 js-masonry small-gallery-gutters popup-gallery" data-masonry-options="{ }">


            @foreach ( $dokumentasi_foto as $foto )

            <div class="w-50 p-2"><img src="{{$foto->path}}" alt="Image"></div>
              
            @endforeach
        
       
          </div>
        </div>
      </div>
    </div>
  </div>  
    
  
  
@endsection