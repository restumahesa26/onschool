@extends('layouts.home')

@section('title')
    <title>Onschool | Onschool Training</title>
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
                            <h1 data-animation="bounceIn" data-delay="0.2s">Onschool Training</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Onschool Training</a></li>
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
<div class="container my-5">
    <h2>Pendaftaran Anda Sedang Diverifikasi Oleh Admin</h2>
    <h3>Apabila Pendaftaran Anda Sudah Diverifikasi, Admin Akan Memasukkan Nomor Anda Ke Grup Whatsapp Sesuai Dengan Program Pelatihan Yang Diikuti</h3>
</div>
@endsection
