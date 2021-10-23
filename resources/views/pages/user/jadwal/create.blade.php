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
                            <h1 data-animation="bounceIn" data-delay="0.2s">Tambah Jadwal</h1>
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
        <form action="{{ route('jadwal.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_kegiatan">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" placeholder="Masukkan Nama Kegiatan" value="{{ old('nama_kegiatan') }}">
                @error('nama_kegiatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Kegiatan</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" placeholder="Masukkan Tanggal Kegiatan" value="{{ old('tanggal') }}">
                @error('tanggal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="jam">Jam Kegiatan</label>
                <input type="time" name="jam" id="jam" class="form-control" placeholder="Masukkan Jam Kegiatan" value="{{ old('jam') }}">
                @error('jam')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="detail_kegiatan">Detail Kegiatan</label>
                <textarea name="detail_kegiatan" id="detail_kegiatan" cols="30" rows="10" class="form-control" style="font-size: 16px;">{{ old('detail_kegiatan') }}</textarea>
                @error('detail_kegiatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="isMendesak">Mendesak</label> <br>
                <select name="isMendesak" id="isMendesak" class="form-control w-100">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
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

    <script>
        $('#isMendesak-1, #isMendesak-0').click(function() {
            if ($('#isMendesak-1').prop("checked", true)) {
                $('#isMendesak-0').prop("disabled", true);
                $('#isMendesak-0').prop("checked", false);
            }else if($('#isMendesak-0').prop("checked", true)) {
                $('#isMendesak-1').prop("disabled", true);
                $('#isMendesak-1').prop("checked", false);
            }
        });

        $('#btn-clear').click(function() {
            $('#isMendesak-1').prop("checked", false);
            $('#isMendesak-0').prop("checked", false);
            $('#isMendesak-1').prop("disabled", false);
            $('#isMendesak-0').prop("disabled", false);
        });

    </script>
@endpush
