@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Data Sub Kategori</h1>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('data-sub-kategori.create') }}" class="btn btn-primary mb-3 px-4">Tambah Data Sub Kategori</a>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Sub Kategori</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama_sub_kategori }}</td>
                        <td>{{ $item->kategori->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('data-sub-kategori.edit', $item->id) }}" class="btn btn-info mr-1">Edit</a>
                            <form action="{{ route('data-sub-kategori.destroy', $item->id) }}" method="POST" class="d-inline">
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
