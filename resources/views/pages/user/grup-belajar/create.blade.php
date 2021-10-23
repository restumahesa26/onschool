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
                            <h1 data-animation="bounceIn" data-delay="0.2s">Tambah Grup Belajar</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Services</a></li>
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
        <form action="{{ route('grup-belajar.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_grup">Nama Grup Belajar</label>
                <input type="text" name="nama_grup" id="nama_grup" class="form-control" placeholder="Masukkan Nama Grup" style="min-height: 50px !important; font-size: 16px" value="{{ old('nama_grup') }}">
                @error('nama_grup')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Masukkan Kelas" style="min-height: 50px !important; font-size: 16px" value="{{ old('kelas') }}">
                @error('kelas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-2">Buat Grup</button>
        </form>
    </div>
</div>
@endsection
