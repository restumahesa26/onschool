@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Blog</h1>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('blog.create') }}" class="btn btn-primary mb-3 px-4">Tambah Data Blog</a>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Thumbnail</th>
                        
                        <th scope="col">aksi</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->slug }}</td>
                        <td><img src="{{ asset('storage/blog/'. $item->thumbnail) }}" alt="" style="width: 200px;"></td>
                        
                        <td>
                            <a href="{{ route('blog.edit',$item->id) }}"  class="btn btn-info mr-1">Edit</a>
                            <form action="{{ route('blog.destroy',$item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th scope="row" colspan="5" class="text-center">-- Data Kosong --</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
