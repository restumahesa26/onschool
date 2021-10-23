@extends('layouts.home')

@section('content')
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">Kursus</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('kursus.index') }}">Kursus</a></li>
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
<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Materi</h2>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            @forelse ($items as $item)
            <div class="col-lg-4" id="properties">
                <div class="properties properties2 mb-30">
                    <div class="properties__card">
                        <div class="properties__img overlay1">
                            <a href="#"><img src="{{ asset('storage/images/thumbnail/'. $item->thumbnail) }}" alt=""></a>
                        </div>
                        <div class="properties__caption">
                            <p>{{ $item->kategori->nama_kategori }} {{ $item->sub_kategori->nama_sub_kategori }} Kelas {{ $item->kelas }}</p>
                            <h3 class="judul"><a href="#">{{ $item->judul }}</a></h3>
                            <p>{{ $item->deskripsi }}
                            </p>
                            <a href="{{ route('kursus.show', $item->id) }}" class="border-btn border-btn2">Lihat Materi</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="d-flex justify-content-center">
                    <h3>Belum Ada Materi Diupload</h3>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection
