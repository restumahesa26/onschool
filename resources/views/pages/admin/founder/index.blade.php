@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Founder</h1>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('founder.create') }}" class="btn btn-primary mb-3 px-4">Tambah Founder</a>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto Profil</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td class="text-center py-2">
                            <img src="{{ asset('storage/images/foto_profil/'. $item->foto_profil) }}" alt="" class="rounded-circle" style="width: 200px;">
                        </td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('founder.edit', $item->id) }}" class="btn btn-info mr-1">Edit</a>
                            <form action="{{ route('founder.destroy', $item->id) }}" method="POST" class="d-inline">
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
