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
                  <figure class="entry-media"><a href="blog-single-post.html"><img class="lozad" src="assets/images/blog/b1-lqip.jpg" data-src="assets/images/blog/b1.jpg" alt="Entry Image"/></a>
                  </figure>
                  <div class="entry-content-wrapper">
                    <header class="entry-header">
                      <h2 class="entry-title"><a href="blog-single-post.html">Five Tips To Start Investing In Real Estate</a></h2>
                      <div class="mb-2">
                        <div class="entry-meta-top"><span class="entry-meta-date"> <i class="far fa-clock"></i>March 22, 2020</span>
                        </div>
                      </div>
                    </header>
                    <div class="entry-content">
                      <p>Quisque sollicitudin lacinia sapien, eu tincidunt nunc accumsan laoreet. Curabitur feugiat posuere odio nec tincidunt Pellentesque sagittis nibh venenatis euismod.</p>
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