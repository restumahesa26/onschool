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
                            <h1 data-animation="bounceIn" data-delay="0.2s">Edit Jadwal</h1>
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
        <form action="{{ route('jadwal.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" placeholder="Masukkan Nama Kegiatan" value="{{ $item->nama_kegiatan }}">
                @error('nama_kegiatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Kegiatan</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Masukkan Tanggal Kegiatan" value="{{ $item->tanggal }}">
                @error('tanggal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="jam">Jam Kegiatan</label>
                <input type="time" name="jam" id="jam" class="form-control" placeholder="Masukkan Jam Kegiatan" value="{{ $item->jam }}">
                @error('jam')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="detail_kegiatan">Detail Kegiatan</label>
                <textarea name="detail_kegiatan" id="detail_kegiatan" cols="30" rows="10" class="form-control" style="font-size: 16px;">{{ $item->detail_kegiatan }}</textarea>
                @error('detail_kegiatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="isMendesak">Mendesak</label> <br>
                <select name="isMendesak" id="isMendesak" class="form-control w-100">
                    <option value="1" @if ($item->is_mendesak == 1) selected @endif>Ya</option>
                    <option value="0" @if ($item->is_mendesak == 0) selected @endif>Tidak</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-5">Simpan Kegiatan</button>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('detail_kegiatan');
    </script>
@endpush
