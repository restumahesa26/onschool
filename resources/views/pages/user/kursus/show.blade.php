@extends('layouts.home')

@section('title')
    <title>Onschool | Kursus</title>
@endsection

@section('content')
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">{{ $item->judul }}</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('kursus.index') }}">Kursus</a></li>
                                    <li class="breadcrumb-item"><a href="#">{{ $item->kategori->nama_kategori }} {{ $item->sub_kategori->nama_sub_kategori }} {{ $item->kelas }}</a></li>
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
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12">
                <h4></h4>
                <p class="mt-3">Deskripsi</p>
                <p style="margin-top: -18px;">{{ $item->deskripsi }}</p>
                <img src="{{ asset('storage/images/thumbnail/'. $item->thumbnail) }}" alt="" style="float: left; margin-right: 20px">
                <p>{!! $item->isi_materi !!}</p>
            </div>
            <div class="col-lg-12">
                <embed src="{{ asset('storage/file/materi/'. $item->file) }}" width="100%" height="550px" class="mt-4">
                </embed>
            </div>
        </div>
    </div>
</div>
@endsection
