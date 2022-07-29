@extends('layouts.home')

@section('title')
    <title>Onschool | Blog</title>
@endsection

@section('content')
<section>
    <section class="slider-area slider-area2">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height2">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Artikel Onschool </h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                    </ol>
                                </nav>
                                <!-- breadcrumb End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>


<div class="container">
    <div class="row mt-5">
        <div class="col-lg-8">
            <small class="mr-3"> <b> <i class="fas fa-calendar"></i> Tanggal : {{$item->created_at}}</b></small>
            <h3 class="mt-5 font-1" style="font-weight: bolder;">{{$item->judul}}</h3>

            {{-- <small> <b> <i class="fas fa-user"></i> Penulis : {{$berita->penulis}}</b></small> --}}
            <hr>
            <img src=" {{ asset('storage/blog/'. $item->thumbnail) }} " alt="thumbnail" class="img-fluid" width="800">
            <div class="mt-5">
                {!! $item->konten !!}
            </div>
        </div>
        <div class="col-lg-4">
            <h1>Berita Terbaru</h1>
            @forelse ($recents as $recent)
            <a href="{{ route('Blog-show',$recent->slug) }}">
                <div class="row pt-3">
                    <div class="col-lg-6 col-sm-12">
                        <h3 class="mb-3">{{ $recent->judul }}</h3>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <img src="{{ asset('storage/blog/'. $recent->thumbnail) }}" alt="" width="200">
                    </div>
                </div>
            </a>
            @empty

            @endforelse
        </div>
    </div>
</div>

@endsection
