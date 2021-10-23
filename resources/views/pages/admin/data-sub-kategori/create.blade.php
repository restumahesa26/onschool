@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Tambah Data Sub Kategori</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('data-sub-kategori.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kategori_id">Kategori</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategories as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                    @endforeach
                </select>
                @error('kategori_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_sub_kategori">Nama Sub Kategori</label>
                <input type="text" name="nama_sub_kategori" id="nama_sub_kategori" class="form-control @error('nama_sub_kategori') is-invalid @enderror" placeholder="Masukkan Nama Sub Kategori" value="{{ old('nama_sub_kategori') }}">
                @error('nama_sub_kategori')
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
