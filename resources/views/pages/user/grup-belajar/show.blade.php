@extends('layouts.home')

@section('title')
    <title>Onschool | Grup Belajar</title>
@endsection

@section('content')
<section class="slider-area slider-area2">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height2">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-11 col-md-12">
                        <div class="hero__caption hero__caption2">
                            <h1 data-animation="bounceIn" data-delay="0.2s">{{ $item->nama_grup }} {{ $item->kelas }}</h1>
                            <!-- breadcrumb Start-->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('grup-belajar.index') }}">Grup</a></li>
                                </ol>
                            </nav>
                            <!-- breadcrumb End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="courses-area section-padding40 fix">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3">
                <h3>Nama Guru</h3>
                <p>{{ $item->user->nama }}</p>
                <h3 class="mt-5">Nama Anggota Grup</h3>
                <ul>
                    @forelse ($item->grup_belajar_siswa as $siswa)
                        <li>{{ $siswa->user->nama }}</li>
                    @empty
                        <li>Belum Ada Anggota</li>
                    @endforelse
                </ul>
            </div>
            <div class="col-lg-8">
                @can('view', $item)
                    <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal" data-target="#tambah-pengumuman">
                        Buat pengumuman kelas
                    </button>
                @endcan
                <h3>Pengumuman</h3>
                @forelse ($item->grup_belajar_pengumuman as $pengumuman)
                    <div class="card my-3" style="border-radius: 10px">
                        <div class="card-body">
                            <p>{{ $pengumuman->user->nama }}</p>
                            <p style="margin-top: -20px; font-size: 14px">Pada {{ Carbon\Carbon::parse($pengumuman->created_at)->translatedFormat('l, d F Y') }}</p>
                            <p>{!! $pengumuman->isi_pengumuman !!}</p>
                            @can('view', $item)
                                <div class="d-flex justify-content-end">
                                    <form action="{{ route('grup-belajar-pengumuman.delete', $pengumuman->id) }}" method="POST" class="mr-3">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="font-size: 14px; padding: 20px 20px !important;">Hapus</button>
                                    </form>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ubah-pengumuman{{ $pengumuman->id }}" style="font-size: 14px; padding: 20px 20px !important;">
                                        Edit
                                    </button>
                                </div>
                            @endcan
                            <p>Komentar</p>
                            @foreach ($pengumuman->komentar as $komentar)
                                <div class="d-flex justify-content-between">
                                    <div class="column">
                                        <h3>{{ $komentar->user->nama }}</h3>
                                        <p style="margin-top: -17px;">{{ $komentar->komentar }}</p>
                                    </div>
                                    @can('view', $komentar)
                                        <div class="column">
                                            <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#ubah-komentar{{ $komentar->id }}">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                            <form action="{{ route('grup-belajar-pengumuman.delete-komentar', [$komentar->id, $item->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                            @endforeach
                            <form action="{{ route('grup-belajar-pengumuman.store-komentar', [$pengumuman->id, $item->id]) }}" method="POST">
                                @csrf
                                <input type="text" name="komentar" id="komentar" class="form-control" placeholder="Ketikkan Komentar....">
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-info mt-3">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <h3 class="text-center mt-5">-- Belum Ada Pengumuman --</h3>
                @endforelse
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="tambah-pengumuman" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Pengumuman kelas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('grup-belajar-pengumuman.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="grup_belajar_id" value="{{ $item->id }}">
                    <div class="form-group">
                        <label for="isi_pengumuman">Isi Pengumuman</label>
                        <textarea name="isi_pengumuman" id="isi_pengumuman" cols="30" rows="10" class="form-control" style="font-size: 16px;"></textarea>
                        @error('isi_pengumuman')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach ($item->grup_belajar_pengumuman as $pengumumans)
<div class="modal fade" id="ubah-pengumuman{{ $pengumumans->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Pengumuman kelas</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('grup-belajar-pengumuman.update', $pengumumans->id) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="grup_belajar_id" value="{{ $item->id }}">
                    <div class="form-group">
                        <label for="isi_pengumuman2">Isi Pengumuman</label>
                        <textarea name="isi_pengumuman_2" id="isi_pengumuman2" cols="30" rows="10" class="form-control" style="font-size: 16px; color: #000;">{!! $pengumumans->isi_pengumuman !!}</textarea>
                        @error('isi_pengumuman')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
    @foreach ($pengumumans->komentar as $komentars)
    <div class="modal fade" id="ubah-komentar{{ $komentars->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Komentar</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('grup-belajar-pengumuman.update-komentar', [$komentars->id, $item->id]) }}" method="POST">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="komentar">Ganti Komentar</label>
                            <input type="text" name="komentar" id="komentar" class="form-control" placeholder="Ketikkan Komentar...." value="{{ $komentars->komentar }}">
                            @error('isi_pengumuman')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
@endforeach
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('isi_pengumuman', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
        CKEDITOR.replace('isi_pengumuman_2', {
            filebrowserUploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endpush
