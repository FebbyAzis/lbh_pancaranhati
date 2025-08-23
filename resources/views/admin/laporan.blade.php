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
            <h3>Laporan</h3>
            <p class="text-subtitle text-muted">Anda dapat membuat laporan berdasarkan tanggal awal dan tanggal akhir pada halaman ini.</p>
        </div>
        <section class="section">
                    <div class="card">
          
            <div class="card-body">
                <div class="row mt-3 mb-3">
                    <div class="col-sm-4">
                        <center>
                            <button type="button" class="btn btn btn-outline-primary block" data-toggle="modal"
                            data-target="#default1">
                            Laporan Konsultasi
                        </button>
                        </center>
                       
                    </div>
                    <div class="col-sm-4">
                        <center>
                            <button type="button" class="btn btn btn-outline-primary block" data-toggle="modal"
                                    data-target="#default2">
                                    Laporan Pendampingan
                                </button>
                        </center>
                    </div>
                    <div class="col-sm-4">
                        <center>
                            <button type="button" class="btn btn btn-outline-primary block" data-toggle="modal"
                                    data-target="#default3">
                                    Laporan Jadwal Pendampingan
                                </button>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        </section>
    </div>


@endsection


    <div class="modal fade text-left" id="default1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Form Cetak Laporan Konsultasi</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="basicInput">Tanggal Awal</label>
                        <input type="date" class="form-control" id="tglawal" name="tglawal"
                            placeholder="Masukan tanggal awal" required>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tglakhir" name="tglakhir"
                            placeholder="Masukan tanggal akhir" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <a href=""
                            onclick="this.href='/cetak-laporan-konsultasi/'+document.getElementById('tglawal').value+'/'+document.getElementById('tglakhir').value"
                            target="_blank">
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Cetak</span>
                    </button>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade text-left" id="default3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Form Cetak Laporan Jadwal Pendampingan</h5>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">                    
                <div class="form-group">
                    <label for="basicInput">Tanggal Awal</label>
                    <input type="date" class="form-control" id="tglawal1" name="tglawal"
                        placeholder="Masukan tanggal awal" required>
                </div>
                <div class="form-group">
                    <label for="basicInput">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="tglakhir1" name="tglakhir"
                        placeholder="Masukan tanggal akhir" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
                <a href=""
                        onclick="this.href='/cetak-laporan-jadwal-pendampingan/'+document.getElementById('tglawal1').value+'/'+document.getElementById('tglakhir1').value"
                        target="_blank">
                <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Cetak</span>
                </button>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="default2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
aria-hidden="true">
<div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="myModalLabel1">Form Cetak Laporan Jadwal Pendampingan</h5>
            <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <div class="modal-body">                    
            <div class="form-group">
                <label for="basicInput">Tanggal Awal</label>
                <input type="date" class="form-control" id="tglawal2" name="tglawal"
                    placeholder="Masukan tanggal awal" required>
            </div>
            <div class="form-group">
                <label for="basicInput">Tanggal Akhir</label>
                <input type="date" class="form-control" id="tglakhir2" name="tglakhir"
                    placeholder="Masukan tanggal akhir" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn" data-dismiss="modal">
                <i class="bx bx-x d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Tutup</span>
            </button>
            <a href=""
                    onclick="this.href='/cetak-laporan-pendampingan/'+document.getElementById('tglawal2').value+'/'+document.getElementById('tglakhir2').value"
                    target="_blank">
            <button type="submit" class="btn btn-primary ml-1">
                <i class="bx bx-check d-block d-sm-none"></i>
                <span class="d-none d-sm-block">Cetak</span>
            </button>
            </a>
        </div>
    </div>
</div>
</div>
