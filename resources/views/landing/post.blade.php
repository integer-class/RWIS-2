@extends('layouts.app_landing')

@section('title', 'Single Post')

@section('content')
    <!-- Navbar -->
    <div class="site-header">
        <!-- Navbar content goes here -->
    </div>
    <!-- End Navbar -->

    <!-- Post Content -->
    <article class="entry">
        <div class="entry-content">
            <!-- Featured Image -->
            <div class="container mb-5">
                <!-- Your featured image goes here -->
            </div>

            <div class="container">
                <div class="row justify-content-lg-center">
                    <div class="col-lg-8">
                        <header class="entry-header">
                            <!-- Entry Meta -->
                            <div class="entry-meta-top">
                                <!-- Entry Author -->
                                <span class="entry-author"><i class="far fa-user"></i> Investment</span>
                                <!-- Entry Date -->
                                <span class="entry-meta-date"> <i class="far fa-clock"></i> April 13, 2020</span>
                                <!-- Entry Comment Count -->
                                <span class="entry-comment-count"><a href="/blog-single-post.html#comments"><i class="far fa-comment-alt"></i> No-comment</a></span>
                            </div>
                            <!-- Entry Title -->
                            <h1 class="mb-5 entry-title font-weight-bold">What Today’s Renters Truly Want</h1>
                        </header>

                        <!-- Post Content -->
                        <p class="mb-5">
                            <!-- Your post content goes here -->
                        </p>

                        <!-- Additional Images -->
                        <div class="row gx-lg-3">
                            <div class="col-6">
                                <!-- Additional Image 1 -->
                            </div>
                            <div class="col-6">
                                <!-- Additional Image 2 -->
                            </div>
                        </div>

                        <!-- More Content -->
                        <p class="my-4">
                            <!-- More content goes here -->
                        </p>

                        <!-- Single Image -->
                        <img src="assets/images/blog/3.jpg" alt="Single Post">

                        <!-- More Content -->
                        <p class="mt-4">
                            <!-- More content goes here -->
                        </p>

                        <!-- Post Navigation -->
                        <div class="navigation post-navigation">
                            <!-- Navigation Links -->
                            <div class="row align-items-center text-center nav-links">
                                <div class="col-lg-6 mb-4 mb-lg-0 text-lg-left">
                                    <!-- Previous Post -->
                                    <div class="nav-subtitle"> PREVIOUS </div>
                                    <div class="nav-title"><a href="blog-single-post.html"><i class="fas fa-angle-left fa-lg mr-1 text-mid-gray"></i> Sellentesque tristiue neque</a></div>
                                </div>
                                <div class="col-lg-6 text-lg-right">
                                    <!-- Next Post -->
                                    <div class="nav-title"><a href="blog-single-post.html">
                                        <div class="nav-subtitle">NEXT </div>Aliquam lobortis urna libero<span><i class="fas fa-angle-right fa-lg ml-1 text-mid-gray"></i></span></a></div>
                                </div>
                            </div>
                        </div>

                        <!-- Comments Area -->
                        <div class="comments comments-area container-small mt-4" id="comments">
                            <!-- Comments Section -->
                            <!-- Your comments section goes here -->
                        </div>
                        <!-- End Comments Area -->
                    </div>
                </div>
            </div>
        </div>
    </article>
    <!-- End Post Content -->

    <!-- Footer -->
    <footer class="site-footer">
        <!-- Footer content goes here -->
    </footer>
    <!-- End Footer -->

    <!-- JavaScript Files -->
    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Lozad js -->
    <script src="assets/js/lozad.min.js"></script>
    <!-- Bootstrap js -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Aos js -->
    <script src="assets/js/aos.js"></script>
    <!-- Slick flickity js -->
    <script src="assets/js/flickity.pkgd.min.js"></script>
    <!-- Magnific popup js -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Countdown js -->
    <script src="assets/js/jquery.countdown.js"></script>
    <!-- CountTo js -->
    <script src="assets/js/jquery.countTo.js"></script>
    <!-- Masonry js -->
    <script src="assets/js/masonry.pkgd.min.js"></script>
    <!-- Global - Main js -->
    <script src="assets/js/global.js"></script>
@endsection
