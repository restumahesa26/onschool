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
                            <h1 data-animation="bounceIn" data-delay="0.2s">Detail Pertanyaan</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Lokakarya</a></li>
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
        <div class="card">
            <div class="card-body">
                <h3>{{ $item->user->nama }}</h3>
                <h4>{{ $item->sub_kategori->nama_sub_kategori }}</h4>
                <hr>
                <h4>{!! $item->pertanyaan !!}</h4>
                @forelse ($item2 as $item22)
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="column">
                                    <h3>{{ $item22->user->nama }} - {{ $item22->user->asal_sekolah }}</h3>
                                    <h4>{!! $item22->jawaban !!}</h4>
                                </div>
                                <div class="column">
                                    @if (Auth::user()->id === $item22->user_id)
                                    <form action="{{ route('lokakarya.hapus-jawaban', [$item22->id, $item->id]) }}" method="POST" class="mt-3">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('lokakarya.hapus-jawaban', [$item22->id, $item->id]) }}" class="btn-sm btn-danger" onclick="event.preventDefault(); this.closest('form').submit();">
                                            Hapus
                                        </a>
                                    </form>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                @empty
                    <div class="card">
                        <div class="card-body">
                            <h3>Belum ada jawaban</h3>
                        </div>
                    </div>
                @endforelse
                <form action="{{ route('lokakarya.kirim-jawaban', $item->id) }}" method="POST" class="mt-5">
                    @csrf
                    <div class="form-group">
                        <label for="jawaban">Tulis Jawaban</label>
                        <textarea name="jawaban" id="jawaban" class="form-control" required>{{ old('jawaban') }}</textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-info">Kirim Jawaban</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('jawaban');
    </script>
@endpush
