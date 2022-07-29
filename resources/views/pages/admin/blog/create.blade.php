@extends('layouts.admin')

@section('content')
<div>
    <h1 class="font-1 mt-5">Tambah Blog</h1>
  
</div>
<div class="bg-white p-5 shadow">
    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-4">
            <div class="col-xl-4">
                <label for="thumbnail">Gambar Thumbnail : </label>
                <input name="thumbnail" type="file" class="form-control" id="thumbnail" placeholder="thumbnail">
            </div>
        </div>
        
        <div class="form-group row">
            
            <div class="col-xl-8">
                <label for="judul">Judul : </label>
                <input type="text" name="judul" class="form-control" id="judul" aria-describedby="judul" placeholder="Masukan judul" required>
                
            </div>
            <br>

            
        </div>
        <div class="form-group">
            <label for="konten">Konten</label>
            <textarea name="konten" id="konten" class="form-control" placeholder="Masukkan Deskripsi"> </textarea>
            
           
        <button type="submit" class="btn btn-primary mt-3 pr-5 pl-5">Simpan</button>
    </form>
</div>

@push('addon-script')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script>
    CKEDITOR.replace('konten');
</script>
@endpush

@endsection
