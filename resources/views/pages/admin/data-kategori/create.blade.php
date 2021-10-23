@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Tambah Data Kategori</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('data-kategori.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_kategori">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control @error('nama_kategori') is-invalid @enderror" placeholder="Masukkan Nama Kategori" value="{{ old('nama_kategori') }}">
                @error('nama_kategori')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Data</button>
        </form>
    </div>
</div>
@endsection
