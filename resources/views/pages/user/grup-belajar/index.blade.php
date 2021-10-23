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
                            <h1 data-animation="bounceIn" data-delay="0.2s">Grup Belajar</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('grup-belajar.index') }}">Grup</a></li>
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
                    <h2>Grup Belajar Anda</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($items as $item)
            <div class="col-lg-6">
                <div class="properties properties2 mb-30">
                    <div class="properties__card">
                        <div class="properties__caption">
                            <p>{{ $item->kelas }}</p>
                            @if (Auth::user()->role == 'GURU')
                            <p>Kode Kelas : {{ $item->kode_kelas }}</p>
                            @endif
                            <h3><a href="#">{{ $item->nama_grup }}</a></h3>
                            <p>The automated process all your website tasks. Discover tools and techniques to engage effectively with vulnerable children and young people.
                            </p>
                            <a href="{{ route('grup-belajar.show', $item->id) }}" class="border-btn border-btn2">Find out more</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="d-flex justify-content-center">
                    <h3>Belum Ada Grup Belajar</h3>
                </div>
            @endforelse
        </div>
        @if (Auth::user()->role == 'GURU')
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 text-center">
                <a href="{{ route('grup-belajar.tambah') }}" class="btn btn-primary">Buat Grup Belajar Baru</a>
            </div>
        </div>
        @elseif (Auth::user()->role == 'SISWA')
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 text-center">
                <form action="{{ route('grup-belajar.gabung_kelas') }}" method="POST">
                    @csrf
                    <label for="kode_kelas">Kode Kelas</label>
                    <input type="text" name="kode_kelas" id="kode_kelas" class="form-control" placeholder="Masukkan Kode Kelas" style="min-height: 50px !important; font-size: 16px" value="{{ old('kode_kelas') }}">
                    <button type="submit" class="btn btn-info mt-3">Gabung Kelas</button>
                </form>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
