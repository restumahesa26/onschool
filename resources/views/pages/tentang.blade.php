@extends('layouts.home')

@section('content')
<!--? slider Area Start-->
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">Tentang</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Tentang</a></li>
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
@forelse ($founders as $founder)
<section class="about-area3 fix mt-5">
    <div class="support-wrapper align-items-center">
        <div class="right-content3 text-right">
            <!-- img -->
            <div class="right-img mb-5">
                <img src="{{ asset('storage/images/foto_profil/' . $founder->foto_profil) }}" alt="" style="width: 350px" class="rounded-circle">
            </div>
        </div>
        <div class="left-content3">
            <!-- section tittle -->
            <div class="section-tittle section-tittle2 mb-20">
                <div class="front-text">
                    <h2 class="">{{ $founder->nama }}</h2>
                    <h3 class="">{{ $founder->status }}</h3>
                </div>
            </div>
            <div class="single-features">
                <h4>{!! $founder->deskripsi !!}</h4>
            </div>
        </div>
    </div>
</section>
@empty

@endforelse
<!--? About Area-3 Start -->

@endsection
