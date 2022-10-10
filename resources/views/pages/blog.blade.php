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
                        <div class="col-xl-8 col-lg-11 col-md-12">
                            <div class="hero__caption hero__caption2">
                                <h1 data-animation="bounceIn" data-delay="0.2s">Blog</h1>
                                <!-- breadcrumb Start-->
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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

<hr class="mb-5">
<div class="container">
    <div class="row">
        @foreach ($items as $item)
            {{-- <div class="card d-inline-block m-1" style="width: 18rem;">

                <img class="card-img-top" width="285" height="180" src="{{ URL::asset('storage/berita') }}/{{$item->thumbnail}}" alt="Card image cap">
                <div class="card-body" height="150" >
                    <small>Penulis : {{$item->penulis}}</small>
                    <br>
                    <small>Tanggal : {{ Str::limit($item->created_at, 10) }} </small>
                    <hr>
                    <a href="{{route('user.berita.show', [$bahasa, $item->judul])}}" class="text-dark">
                        <h5 class="card-title">{{$item->judul}}</h5>
                    </a>
                </div>
            </div> --}}
            <div class="m-3 d-inline-block m-1" style="width: 20rem;">
                <img class="card-img-top" width="500 " height="200 " src="{{ asset('storage/blog/'. $item->thumbnail) }}" alt="Card image cap">
                <small class="mr-3"> <b> <i class="fas fa-calendar"></i> Tanggal : {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d-m-Y H:i') }}</b></small>
                <div class="card-body" height="150" >
                    {{-- <small>Penulis : {{$item->penulis}}</small>
                    <br> --}}
                    <small><i class="fas fa-flag"></i> {{$item->slug}} </small>
                    <h4 class="card-title">
                        <a href="{{ route('Blog-show',$item->slug) }}" class="text-dark">
                            <b>{{$item->judul}}</b>
                        </a>
                    </h4>

                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
