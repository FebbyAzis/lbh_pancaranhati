@extends('layout.app')
@section('content')
    <div class="main-content container-fluid">
        @if (session('Success'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <strong>Success!</strong> {{session('Success')}}.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
        <div class="page-title">
            <h3>Ajukan Konsultasi</h3>
            <p class="text-subtitle text-muted">Ajukan konsultasi anda mengenai hukum yang sedang butuhkan dengan saran
                TF-IDF dan anda dapat melihat hasil saran tersebut pada halaman riwayat konsultasi.</p>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-body">
                    <div class="col-sm-12">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">

                            <center>
                                <img src="{{ asset('photos/konsul1.png') }}" class="d-block" width="35%" alt="...">
                            </center>



                        </div>
                        <center>
                            <button type="button" class="btn btn-lg btn-outline-primary block mt-3" data-toggle="modal"
                                data-target="#default">
                                Ajukan Sekarang
                            </button>
                        </center>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

<form action="{{ url('/pengajuan-konsultasi') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <!--Basic Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Form Pengajuan Konsultasi</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="basicInput">Judul Konsultasi</label>
                                <input type="text" class="form-control" id="basicInput" name="judul"
                                    placeholder="..." required>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Kategori Masalah</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="kategori" required>
                                        <option value="">-- Pilih Kategori--</option>
                                        <option value="Hukum Perdata">Hukum Perdata</option>
                                        <option value="Hukum Perdata">Hukum Pidana</option>
                                        <option value="Ketenagakerjaan">Ketenagakerjaan</option>
                                        <option value="Keluarga">Keluarga</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Masalah</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Dokumen Pendukung</label>
                                <input type="file" class="form-control" id="basicInput" name="dokumen"
                                    placeholder="...">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="basicInput">Privasi Konsultasi</label>
                                <div class="form-check">
                            <input class="form-check-input" type="radio" name="privasi" value="Public" id="flexRadioDefault1" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Publik (Anonim)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="privasi" value="Privat" id="flexRadioDefault1" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Privat (Hanya Admin)
                            </label>
                        </div>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Metode Tanggapan</label>
                                <div class="form-check">
                            <input class="form-check-input" type="radio" name="metode_tanggapan" value="Otomatis" id="flexRadioDefault1" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Otomatis (TF-IDF)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="metode_tanggapan" value="Manual" id="flexRadioDefault1" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Manual
                            </label>
                        </div>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Kontak Tambahan (Opsional)</label>
                                <input type="text" class="form-control" id="basicInput" name="kontak"
                                    placeholder="...">
                            </div>
                             <div class="form-check">
                            <input class="form-check-input" type="radio" name="setuju_syarat" id="flexRadioDefault1" required>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Saya Setuju
                            </label>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Kirim</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
