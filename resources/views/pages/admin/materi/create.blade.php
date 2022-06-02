@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Tambah Materi</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('materi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" id="judul" class="form-control @error('judul') is-invalid @enderror" placeholder="Masukkan Judul" value="{{ old('judul') }}">
                @error('judul')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
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
                <label for="sub_kategori_id">Sub Kategori</label>
                <select name="sub_kategori_id" id="sub_kategori_id" class="form-control">
                    <option value="">-- Pilih Sub Kategori --</option>
                    @foreach ($sub_kategories as $sub_kategori)
                        <option value="{{ $sub_kategori->id }}">{{ $sub_kategori->nama_sub_kategori }}</option>
                    @endforeach
                </select>
                @error('sub_kategori_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" id="kelas" class="form-control">
                    <option value="">-- Pilih Kelas --</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                @error('kelas')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" placeholder="Masukkan Deskripsi">{{ old('deskripsi') }}</textarea>
                @error('deskripsi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="isi_materi">Isi Materi</label>
                <textarea name="isi_materi" id="isi_materi" class="form-control" placeholder="Masukkan Isi Materi">{{ old('isi_materi') }}</textarea>
                @error('isi_materi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="Masukkan Thumbnail" value="{{ old('thumbnail') }}" required>
                @error('thumbnail')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="pdf">File Materi</label>
                <input type="file" name="pdf" id="pdf" class="form-control @error('pdf') is-invalid @enderror" placeholder="Masukkan File Materi" value="{{ old('pdf') }}" required>
                @error('pdf')
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
        CKEDITOR.replace('isi_materi', {
            height: 500,
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
