@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Data Guru</h1>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('data-guru.create') }}" class="btn btn-primary mb-3 px-4">Tambah Data Guru</a>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->asal_sekolah }}</td>
                        <td>
                            <a href="{{ route('data-guru.edit', $item->id) }}" class="btn btn-info mr-1">Edit</a>
                            <form action="{{ route('data-guru.destroy', $item->id) }}" method="POST" class="d-inline">
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
