@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Edit Founder {{ $item->nama }}</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('founder.update', $item->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan Nama" value="{{ $item->nama }}">
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input type="text" name="status" id="status" class="form-control @error('status') is-invalid @enderror" placeholder="Masukkan Status" value="{{ $item->status }}">
                @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan Deskripsi">{{ $item->deskripsi }}</textarea>
                @error('deskripsi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="urutan">Urutan</label>
                <input type="number" min="0" name="urutan" id="urutan" class="form-control @error('urutan') is-invalid @enderror" placeholder="Masukkan Urutan" value="{{ $item->urutan }}">
                @error('urutan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="foto_profil">Foto Profil</label><br>
                <img src="{{ asset('storage/images/foto_profil/'. $item->foto_profil) }}" alt="" class="rounded-circle" style="width: 200px">
                <input type="file" name="foto_profil" id="foto_profil" class="form-control mt-3 @error('foto_profil') is-invalid @enderror" placeholder="Masukkan Foto Profil" value="{{ old('foto_profil') }}">
                @error('foto_profil')
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

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('deskripsi');
    </script>
@endpush
