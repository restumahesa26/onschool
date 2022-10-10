@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Data Pendaftaran Onschool Training</h1>
</div>
<div class="card">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Nomor WA</th>
                        <th scope="col">Jenis Program</th>
                        <th scope="col">Bukti Pendaftaran</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->jenis }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal{{ $item->id }}">
                                Lihat
                            </button>
                        </td>
                        <td>
                            @if ($item->status == 'Belum Diverifikasi')
                            <span class="badge badge-danger">{{ $item->status }}</span>
                            @else
                            <span class="badge badge-success">{{ $item->status }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($item->status == 'Belum Diverifikasi')
                            <a href="{{ route('onschool-training.admin-verifikasi', $item->id) }}" class="btn btn-info mr-1">Verifikasi</a>
                            @else
                            <a href="{{ route('onschool-training.admin-batal-verifikasi', $item->id) }}" class="btn btn-danger mr-1">Batal Verifikasi</a>
                            @endif
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
        @forelse ($items as $item)
        <!-- Modal -->
        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <embed src="{{ asset('storage/file/bukti-pembayaran/'. $item->bukti_pembayaran) }}" width="100%" class="mt-4">
                        </embed>
                    </div>
                </div>
            </div>
        </div>
        @empty

        @endforelse
    </div>
</div>
@endsection
