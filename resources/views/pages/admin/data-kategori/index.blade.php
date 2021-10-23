@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Data Kategori</h1>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('data-kategori.create') }}" class="btn btn-primary mb-3 px-4">Tambah Data Kategori</a>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Sub Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>
                            @foreach ($item->sub_kategori as $sub_kategori)
                                <ul style="margin-top: -10px;">
                                    <li style="margin-bottom: -25px !important;">{{ $sub_kategori->nama_sub_kategori }}</li>
                                </ul>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('data-kategori.edit', $item->id) }}" class="btn btn-info mr-1">Edit</a>
                            <form action="{{ route('data-kategori.destroy', $item->id) }}" method="POST" class="d-inline">
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
