@extends('layout.app')
@section('content')
    <div class="main-content container-fluid">
        @if (session('diterima'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('diterima') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('ditolak'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('ditolak') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('jadwal'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('jadwal') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="page-title">
            <h3>Detail Pengajuan Layanan Hukum</h3>
            <p class="text-subtitle text-muted">Anda dapat melihat detail pengajuan layanan hukum yang diterima, ditolak
                maupun pengajuan
                pendampingan yang masih menunggu persetujuan pada halaman ini.</p>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row py-3">
                        <div class="col-sm-6">
                            Detail Data Pengajuan Layanan Hukum Anda
                        </div>
                        <div class="col-sm-6 text-right">
                            @if ($p->status == 1)
                                <button type="button" class="btn btn-sm btn-outline-success block" data-toggle="modal"
                                    data-target="#default1">
                                    Terima Pengajuan
                                </button>
                                &nbsp;
                                <button type="button" class="btn btn-sm btn-outline-danger block" data-toggle="modal"
                                    data-target="#default2">
                                    Tolak Pengajuan
                                </button>
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <strong>Judul Layanan</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $p->judul_permohonan }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Kategori Masalah</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $p->kategori_masalah }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Tanggal Permohonan</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ date('d/M/Y', strtotime($p->tanggal_permintaan)) }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Deskripsi Kasus</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $p->detail_kasus }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Status Layanan</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @if ($p->status == 1)
                                <p><i class="fas fa-clock text-primary"></i>&nbsp; Menunggu Persetujuan</p>
                            @elseif($p->status == 2)
                                <p><i class="fas fa-check text-success"></i>&nbsp; Diterima</p>
                            @else
                                <p><i class="fas fa-xmark text-danger"></i>&nbsp; Ditolak</p>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            <strong>Prioritas</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $p->urgensi }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Kontak Aktif</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">

                            <p>{{ $p->kontak_aktif }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Dokumen Pendukung</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <img src="{{ url('/photos/' . $p->dokumen_pendukung) }}" width="30%"><br>
                            <a href="{{ url('photos/' . $p->dokumen_pendukung) }}" target="_blank"
                                class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>

                        </div>
                        <div class="col-sm-3">
                            <strong>Jadwal Pendampingan</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-2">
                                    <p>Tanggal</p>
                                </div>
                                <div class="col-sm-10">
                                    <p>{{ date('d/M/Y', strtotime($p->jadwal->tanggal_mulai)) }} -
                                        {{ date('d/M/Y', strtotime($p->jadwal->tanggal_selesai)) }}</p>
                                </div>
                                <div class="col-sm-2">
                                    Lokasi
                                </div>
                                <div class="col-sm-10">
                                    <p>{{ $p->jadwal->lokasi }}</p>
                                </div>
                                <div class="col-sm-2">
                                    Petugas
                                </div>
                                <div class="col-sm-10">
                                    <p>{{ $p->jadwal->petugas->first_name }} {{ $p->jadwal->petugas->last_name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <strong>Catatan</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $p->jadwal->catatan }}</p>
                        </div>
                    </div>

                </div>
            </div>

        </section>
    </div>
@endsection


<form action="{{ url('terima-pengajuan/' . $p->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade text-left" id="default1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Terima Pengajuan</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Apakah anda yakin ingin menerima pengajuan layanan hukum dengan judul permohonan
                        <b>{{ $p->judul_permohonan }} - {{ $p->kategori_masalah }}</b>
                    </p>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Catatan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="catatan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tidak</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Ya</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="{{ url('tolak-pengajuan/' . $p->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade text-left" id="default2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Tolak Pengajuan</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Apakah anda yakin ingin menolak pengajuan layanan hukum dengan judul permohonan
                        <b>{{ $p->judul_permohonan }} - {{ $p->kategori_masalah }}</b>
                    </p>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Catatan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="catatan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tidak</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Ya</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="{{ url('/atur-jadwal') }}" method="POST">
    @csrf
    @method('POST')
    <div class="modal fade text-left" id="default3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Form Atur Jadwal</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="pendampingan_id" value="{{ $p->id }}">
                    <input type="hidden" name="petugas_id" value="{{ $users }}">

                    <div class="form-group">
                        <label for="basicInput">Judul Acara</label>
                        <input type="text" class="form-control" id="basicInput" name="judul_acara"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="basicInput" name="tanggal_mulai"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="basicInput" name="tanggal_selesai"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="lokasi" rows="3" required>{{ $p->lokasi_pendampingan }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tidak</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Ya</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
