@extends('layouts.app')
@section('title','Beranda')
@section('content')
<h1 class="mb-3">Berita utama</h1>
{{-- <p>Total Berita Dipublikasikan: <strong>{{ $total }}</strong></p> --}}

<div class="row">
        <!-- ##### Hero Area Start ##### -->
    <div class="hero-area">
        <!-- Hero Post Slides -->
        <div class="hero-post-slides owl-carousel">

            <!-- Single Slide -->
            <div class="single-slide">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Single Blog Post Area -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-1" data-animation="fadeInUpBig" data-delay="100ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img src="{{ ('assets/img/bg-img/1.jpg') }}"></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <a href="#" class="post-title">Traffic Problems in Time Square</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <!-- Single Blog Post Area -->
                            <div class="single-blog-post style-1 mb-30" data-animation="fadeInUpBig" data-delay="300ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img src="{{ ('assets/img/bg-img/2.jpg') }}"></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <a href="#" class="post-title">The best way to spend your holliday</a>
                                </div>
                            </div>
                            <!-- Single Blog Post Area -->
                            <div class="single-blog-post style-1 mt-20" data-animation="fadeInUpBig" data-delay="500ms" data-duration="1000ms">
                                <!-- Blog Thumbnail -->
                                <div class="blog-thumbnail bg-overlay">
                                    <a href="#"><img src="{{ ('assets/img/bg-img/3.jpg') }}"></a>
                                </div>

                                <!-- Blog Content -->
                                <div class="blog-content">
                                    <span class="post-date">June 20, 2018</span>
                                    <a href="#" class="post-title">Sport results for the weekend games</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- ##### Hero Area End ##### -->

</div>

<div class="row mt-5 p-12">
    <h2>Mini thumb news</h2>
    @foreach($latest as $item)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <p class="text-muted">{{ $item->kategori }} | {{ $item->tanggal_publikasi->format('d M Y') }}</p>
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <a href="/berita/{{ $item->slug }}" class="btn btn-sm btn-
                    primary">Baca selengkapnya</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection