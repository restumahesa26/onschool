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
                            <h1 data-animation="bounceIn" data-delay="0.2s">Edit Pertanyaan</h1>
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
        <form action="{{ route('lokakarya.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="sub_kategori_id" class="form-label">Kategori</label><br>
                <select name="sub_kategori_id" id="sub_kategori_id" class="form-control w-25">
                    <option value="">--Pilih Kategori Mapel--</option>
                    @foreach ($sub_kategoris as $sub_kategori)
                        <option value="{{ $sub_kategori->id }}" @if ($sub_kategori->id == $item->sub_kategori_id) selected @endif>{{ $sub_kategori->kategori->nama_kategori }} -- {{ $sub_kategori->nama_sub_kategori }}</option>
                    @endforeach
                </select>
            </div> <br><br>
            <div class="form-group">
                <label for="pertanyaan">Pertanyaan</label>
                <textarea name="pertanyaan" id="pertanyaan" class="form-control" required>{{ $item->pertanyaan }}</textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-info">Simpan Pertanyaan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('pertanyaan');
    </script>
@endpush
