@extends('layouts.home')

@section('title')
    <title>Onschool | Home</title>
@endsection

@section('content')
    <!--? slider Area Start-->
    <section class="slider-area ">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-7 col-md-12">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay="0.2s">Online School <br>onschool.id</h1>
                                <p data-animation="fadeInLeft" data-delay="0.4s">Build skills with courses,
                                    certificates, and degrees online from world-class universities and companies</p>
                                @if (Auth::user())
                                <a href="{{ route('kursus.index') }}" class="border-btn" data-animation="fadeInLeft" data-delay="0.7s">Mulai Belajar</a>
                                @else
                                <a href="{{ route('login') }}" class="border-btn" data-animation="fadeInLeft" data-delay="0.7s" style="color: #fff">Gabung Sekarang!</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ? services-area -->
    <div class="services-area">
        <div class="container">
            <div class="row justify-content-sm-center">
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="{{ url('frontend/assets/img/icon/icon1.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Kelola Jadwal</h3>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="{{ url('frontend/assets/img/icon/icon2.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Grup Belajar</h3>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="single-services mb-30">
                        <div class="features-icon">
                            <img src="{{ url('frontend/assets/img/icon/icon3.svg') }}" alt="">
                        </div>
                        <div class="features-caption">
                            <h3>Lokakarya</h3>
                            <p>The automated process all your website tasks.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses area start -->
    <div class="courses-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Mau belajar apa hari ini?</h2>
                    </div>
                </div>
            </div>
            <div class="courses-actives">
                <!-- Single -->
                @foreach ($materies as $materi)
                <div class="properties pb-20">
                    <div class="properties__card">
                        <div class="properties__img overlay1">
                            <a href="#"><img src="{{ asset('storage/images/thumbnail/'. $materi->thumbnail) }}" alt=""></a>
                        </div>
                        <div class="properties__caption">
                            <p>{{ $materi->kategori->nama_kategori }} {{ $materi->sub_kategori->nama_sub_kategori }} {{ $materi->kelas }}</p>
                            <h3><a href="#">{{ $materi->judul }}</a></h3>
                            <p>{{ $materi->deskripsi }}
                            </p>
                            <a href="#" class="border-btn border-btn2">Lihat Materi</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Courses area End -->
    <!--? About Area-1 Start -->
    <section class="about-area1 fix pt-10">
        <div class="support-wrapper align-items-center">
            <div class="left-content1">
                <div class="about-icon">
                    <img src="{{ url('frontend/assets/img/icon/about.svg') }}" alt="">
                </div>
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-55">
                    <div class="front-text">
                        <h2 class="">Apasih Onschool.id?</h2>
                        <p>Saat ini mayoritas tenaga pendidik cenderung hanya memanfaatkan platform yang tersedia untuk melakukan proses pembelajaran seperti apps classroom, zoom meeting, dan sebagainya. Serta mengirimkan tulisan, dokumen berkas dan video melalui platform yang digunakan. Namun, penggunaan video dan membaca dokumen cenderung seperti pembelajaran langsung secara ceramah sehingga peserta didik kurang aktif dalam pembelajaran. Dari permasalahan tersebut, maka kami menciptakan inovasi integrasi sistem Student Centered Learning dengan pengembangan rancangan pembelajaran secara daring dan berorientasi ke masa depan yaitu ONSCHOOL atau Online School sebagai simulasi sekolah tatap muka berbentuk daring. Pembelajaran ini didesain agar dapat meningkatkan keaktifan peserta didik sehingga peserta didik memiliki kreatifitas berpikir dan meningkatkan pemahaman konsep dalam pembelajaran.
                            </p>
                    </div>
                </div>
            </div>
            <div class="right-content1">
                <!-- img -->
                <div class="right-img">
                    <img src="{{ url('frontend/assets/img/gallery/about2.png') }}" alt="">

                    <div class="video-icon">
                        <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=MF9WKf4JT0I"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
    <!--? top subjects Area Start -->
    <div class="topic-area section-padding40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Kategori Pembelajaran</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($kategories as $kategori)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-topic text-center mb-30">
                        <div class="topic-img">
                            <img src="{{ url('frontend/assets/img/gallery/topic8.png') }}" alt="">
                            <div class="topic-content-box">
                                <div class="topic-content">
                                    <h3><a href="#">{{ $kategori->nama_sub_kategori }}</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
    <!-- top subjects End -->
    <!--? About Area-3 Start -->
    <section class="about-area3 fix">
        <div class="support-wrapper align-items-center">
            <div class="right-content3">
                <!-- img -->
                <div class="right-img">
                    <img src="{{ url('frontend/assets/img/gallery/about3.png') }}" alt="">
                </div>
            </div>
            <div class="left-content3">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="">Tujuan Onschool.id</h2>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ url('frontend/assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Memberikan sumber ilmu pengetahuan secara menyeluruh dalam lingkup materi sekolah menengah atas dan kemudahan dalam melakukan praktikum pada mata pelajaran tertentu.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ url('frontend/assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Melatih peserta didik dalam mengembangkan karakter sebagai makhluk sosial yang tidak melupakan pentingnya pendidikan.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ url('frontend/assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Memberikan pendekatan antara siswa dan guru.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ url('frontend/assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Mengurangi potensi terjadinya penyimpangan materi dan pandangan hegemoni ilmu sains yang mengakibatkan penyimpangan akhlak peserta didik.</p>
                    </div>
                </div>
                <div class="single-features">
                    <div class="features-icon">
                        <img src="{{ url('frontend/assets/img/icon/right-icon.svg') }}" alt="">
                    </div>
                    <div class="features-caption">
                        <p>Menghadirkan suasana baru dalam dunia daring yang membuat belajar lebih menyenangkan</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
    <!--? Team -->
    <section class="team-area section-padding40 fix">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-tittle text-center mb-55">
                        <h2>Founder Onschool.id</h2>
                    </div>
                </div>
            </div>
            <div class="team-active">
                @forelse ($founders as $founder)
                <div class="single-cat text-center">
                    <div class="cat-icon text-center">
                        <img src="{{ asset('storage/images/foto_profil/' . $founder->foto_profil) }}" alt="" class="rounded-circle pr-2" style="width: 200px">
                    </div>
                    <div class="cat-cap">
                        <h5><a href="services.html">{{ $founder->nama }}</a></h5>
                        <p>{{ $founder->status }}</p>
                    </div>
                </div>
                @empty

                @endforelse

            </div>
        </div>
    </section>
    <!-- Services End -->
    <!--? About Area-2 Start -->
    <section class="about-area2 fix pb-padding">
        <div class="support-wrapper align-items-center">
            <div class="right-content2">
                <!-- img -->
                <div class="right-img">
                    <img src="{{ url('frontend/assets/img/gallery/about2.png') }}" alt="">
                </div>
            </div>
            <div class="left-content2">
                <!-- section tittle -->
                <div class="section-tittle section-tittle2 mb-20">
                    <div class="front-text">
                        <h2 class="">Ayo, jadi bagian dari Oncshool.id</h2>
                        <p>Bersama Onschool, membangun pendidikan negeri menjadi lebih baik.</p>
                            @if (Auth::user())
                                <a href="{{ route('kursus.index') }}" class="border-btn">Mulai Belajar</a>
                            @else
                                <a href="{{ route('login') }}" class="border-btn">Gabung Sekarang</a>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Area End -->
@endsection
