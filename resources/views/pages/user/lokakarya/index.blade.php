@extends('layouts.home')

@section('title')
    <title>Onschool | Lokakarya</title>
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
                            <h1 data-animation="bounceIn" data-delay="0.2s">Lokakarya</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('lokakarya.index') }}">Lokakarya</a></li>
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
                    <h2>Pertanyaanmu</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-3">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('lokakarya.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="sub_kategori_id" class="form-label">Kategori</label><br>
                                <select name="sub_kategori_id" id="sub_kategori_id" class="form-control">
                                    <option value="">--Pilih Kategori Mapel--</option>
                                    @foreach ($sub_kategoris as $sub_kategori)
                                        <option value="{{ $sub_kategori->id }}">{{ $sub_kategori->kategori->nama_kategori }} -- {{ $sub_kategori->nama_sub_kategori }}</option>
                                    @endforeach
                                </select>
                            </div> <br><br>
                            <div class="form-group">
                                <label for="pertanyaan">Pertanyaan</label>
                                <textarea name="pertanyaan" id="pertanyaan" class="form-control" required>{{ old('pertanyaan') }}</textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-info">Kirim Pertanyaan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @forelse ($items2 as $item2)
            <div class="col-lg-8 my-3 mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="column">
                                <h3>{{ $item2->user->nama }}</h3><h4>{{ $item2->sub_kategori->nama_sub_kategori }}</h4>
                            </div>
                            <div class="column">
                                <a href="{{ route('lokakarya.edit', $item2->id) }}" class="btn-sm btn-primary">Edit</a>
                            </div>
                        </div>
                        <hr>
                        <p>{!! $item2->pertanyaan !!}</p>
                        <div class="column text-center">
                            <a href="{{ route('lokakarya.show', $item2->id) }}" class="btn btn-primary">Lihat Jawaban</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</div>

<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <h2>Jawab Pertanyaan Forum</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @forelse ($items as $item)
                <div class="col-lg-8 my-3">
                    <div class="card">
                        <div class="card-body">
                            <h3>{{ $item->user->nama }}</h3><h4>{{ $item->sub_kategori->nama_sub_kategori }}</h4>
                            <hr>
                            <p>{!! $item->pertanyaan !!}</p>
                            <div class="column text-center">
                                <a href="{{ route('lokakarya.show', $item->id) }}" class="btn btn-primary">Jawab</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty

            @endforelse
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('pertanyaan', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
