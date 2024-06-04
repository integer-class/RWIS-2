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
          <h3 class="mt-5">Location</h3>
          <div class="map-responsive mt-4 mb-lg-8 mb-md-7 mb-5">
            <iframe id="gmap_canvas" width="100" height="100" src="https://maps.google.com/maps?q=university%20of%20san%20francisco&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>  
    
  </div>
  
@endsection