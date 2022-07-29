@extends('layouts.admin')


@section('content')
<div>
    <h1 class="font-1 mt-5">Edit Blog</h1>
  
</div>
<div class="bg-white p-5 shadow">
    <form action="{{ route('blog.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group row mb-4">
            <div class="col-xl-4">
                <label for="thumbnail">Gambar Thumbnail : </label>
                <input name="thumbnail" type="file" class="form-control" id="thumbnail" placeholder="thumbnail">
            </div>
        </div>
        
        <div class="form-group row">
            
            <div class="col-xl-8">
                <label for="judul">Judul : </label>
                <input type="text" name="judul" class="form-control" id="judul" aria-describedby="judul" placeholder="Masukan judul" value="{{ $item->judul }}">
                <small class="form-text text-muted">Judul tidak boleh mengandung garis miring atau slash ( / )</small>
            </div>
            <br>
            
        </div>
        <p class=" mt-5">Konten :</p>
        <textarea name="konten" class="form-control" id="konten" cols="30" rows="10">
           {!! $item->konten !!}
        </textarea>
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
