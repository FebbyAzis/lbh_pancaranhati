@extends('layout.app')
@section('content')
    <div class="main-content container-fluid">
        @if (session('Success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('Success') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="page-title">
            <h3>Detail Riwayat Layanan Pendampingan</h3>
            <p class="text-subtitle text-muted">Anda dapat melihat detail riwayat layanan pendampingan yang diterima, ditolak
                maupun pengajuan
                pendampingan yang masih menunggu persetujuan pada halaman ini.</p>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header py-3">
                    Detail Data Riwayat Layanan Pendampingan Anda
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
                                class="btn btn-sm btn-primary mt-3">Lihat Gambar</a>

                        </div>
                        <div class="col-sm-3">
                            <strong>Jadwal Pendampingan</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">

                        </div>
                        <div class="col-sm-3">
                            <strong>Catatan</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">

                        </div>
                    </div>

                </div>
            </div>

        </section>
    </div>
@endsection
