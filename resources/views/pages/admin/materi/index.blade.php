@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Materi</h1>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('materi.create') }}" class="btn btn-primary mb-3 px-4">Tambah Materi</a>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->kategori->nama_kategori }} {{ $item->sub_kategori->nama_sub_kategori }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>
                            <a href="{{ route('materi.edit', $item->id) }}" class="btn btn-info mr-1">Edit</a>
                            <form action="{{ route('materi.destroy', $item->id) }}" method="POST" class="d-inline">
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
