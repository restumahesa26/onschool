@extends('layouts.home')

@section('title')
    <title>Onschool | Jadwal</title>
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
                            <h1 data-animation="bounceIn" data-delay="0.2s">Jadwal</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('jadwal.index') }}">Jadwal</a></li>
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
        <div class="row mt-5">
            <div class="col-lg-3">
                <a href="{{ route('jadwal.create') }}" class="btn btn-primary btn-block">Tambah Jadwal</a>
            </div>
            <div class="col-lg-9">
                Rincian Kegiatan
                @forelse ($items as $item)
                    <div class="card mb-3" style="border-radius: 10px; border-color: 193498;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="column">
                                    <h2>{{ $item->nama_kegiatan }}</h2>
                                    <h4 style="margin-top: -7px;">{!! $item->detail_kegiatan !!}</h4>
                                </div>
                                <div class="column">
                                    <h3>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('l, d M Y') }}</h3>
                                    <h3 style="margin-top: -10px;">Pukul {{ \Carbon\Carbon::parse($item->jam)->translatedFormat('H:i') }}</h3>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="column">
                                    <h3>Mendesak &nbsp; &nbsp; &nbsp;
                                        @if ($item->is_mendesak == 1)
                                            Ya <input type="checkbox" name="" id="" checked disabled>
                                        @elseif($item->is_mendesak == 0)
                                            Tidak <input type="checkbox" name="" id="" checked disabled>
                                        @endif
                                    </h3>
                                </div>
                                <div class="column d-flex justify-content-end">
                                    <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-sm btn-danger mr-3">Hapus</button>
                                    </form>
                                    <a href="{{ route('jadwal.edit', $item->id) }}" class="btn-sm btn-primary">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <h2 class="mt-3">Belum Ada Jadwal</h2>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('detail_kegiatan', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
