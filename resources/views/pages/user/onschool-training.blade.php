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
    <div class="row">
        <div class="col-md-8">
            <form action="{{ route('onschool-training.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="no_hp">No Whatsapp</label>
                    <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="Masukkan No Whatsapp" style="min-height: 40px !important; font-size: 16px" value="{{ old('no_hp') }}">
                    @error('no_hp')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jenis" style="margin-top: 12px !important">Jenis Program Pelatihan</label> <br>
                    <select name="jenis" id="jenis" class="form-control w-100">
                        <option value="" hidden>--Pilih Jenis Program Pelatihan--</option>
                        <option value="Karya Tulis Ilmiah ( Luring )" @if(old('jenis') == 'Karya Tulis Ilmiah ( Luring )') selected @endif>Karya Tulis Ilmiah ( Luring )</option>
                        <option value="Karya Tulis Ilmiah ( Daring )" @if(old('jenis') == 'Karya Tulis Ilmiah ( Daring )') selected @endif>Karya Tulis Ilmiah ( Daring )</option>
                        <option value="Koding" @if(old('jenis') == 'Koding') selected @endif>Koding</option>
                    </select>
                    @error('nama_grup')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="bukti_pembayaran" style="margin-top: 16px !important">Bukti Pembayaran</label>
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" placeholder="Masukkan Bukti Pembayaran" style="min-height: 40px !important; font-size: 16px">
                    @error('bukti_pembayaran')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Daftar Program Pelatihan</button>
            </form>
        </div>
        <div class="col-md-4 mt-3">
            <h3>Informasi Pembayaran</h3>
            <h3>BANK BENGKULU</h3>
            <h3>DANI FAZLI</h3>
            <h3>0010201201080</h3>
        </div>
    </div>
</div>
@endsection
