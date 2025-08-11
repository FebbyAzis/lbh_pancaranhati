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
            <h3>Ajukan Pendampingan</h3>
            <p class="text-subtitle text-muted">Ajukan pendampingan anda mengenai hukum yang sedang butuhkan dengan saran
                TF-IDF dan anda dapat melihat hasil saran tersebut pada halaman riwayat pendampingan.</p>
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
                    <div class="card">
            <div class="card-header">
                Simple Datatable
            </div>
            <div class="card-body">
   
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                               <th>Judul Permohonan</th>
                                <th>Kategori Masalah</th>
                                <th>Detail Kasus</th>
                                <th>Lokasi Pendampingan</th>
                                 <th>Tanggal Permintaan</th>
                                   <th>Urgensi</th>
                                   <th>kontak_aktif</th>
                                    <th>Dokumen Pendukung</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($p as $no => $item)
                                <tr>
                                    <td>{{ $no + 1 }}</td>
                                    <td>{{$item->judul_permohonan}}</td>
                                    <td>{{$item->kategori_masalah}}</td>
                                    <td>{{$item->detail_kasus}}</td>
                                    <td>{{$item->lokasi_pendampingan}}</td>
                                    <td>{{date("d/M/Y", strtotime($item->tanggal_permintaan));}}</td>
                                    <td>{{$item->urgensi}}</td>
                                    <td>{{$item->kontak_aktif}}</td>
                                    <td><img src="{{ url('/photos/'.$item->dokumen_pendukung)}}" width="50%"></td>
                                   
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
             
            </div>
        </div>

        </section>
    </div>


<form action="{{ url('/pengajuan-pendampingan') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <!--Basic Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Form Pengajuan Pendampingan</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="users_id" value="{{$user->id}}">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="basicInput">Judul Permohonan</label>
                                <input type="text" class="form-control" id="basicInput" name="judul_permohonan"
                                    placeholder="..." required>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Kategori Masalah</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="kategori_masalah" required>
                                        <option value="">-- Pilih Kategori--</option>
                                        <option value="Hukum Perdata">Hukum Perdata</option>
                                        <option value="Hukum Pidana">Hukum Pidana</option>
                                        <option value="Ketenagakerjaan">Ketenagakerjaan</option>
                                        <option value="Hukum Keluarga">Hukum Keluarga</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Detail Kasus</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="detail_kasus" rows="3" required></textarea>
                            </div>
                           
                            <div class="form-group">
                                <label for="basicInput">Tanggal Permintaan</label>
                                <input type="date" class="form-control" id="basicInput" name="tanggal_permintaan"
                                    placeholder="..." required>
                            </div>
                            
                            
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="basicInput">Urgensi/TIngkat Prioritas</label>
                                <fieldset class="form-group">
                                    <select class="form-select" id="basicSelect" name="urgensi" required>
                                        <option value="">-- Pilih Kategori--</option>
                                        <option value="Rendah">Rendah</option>
                                        <option value="Sedang">Sedang</option>
                                        <option value="Mendesak">Mendesak</option>
                                    </select>
                                </fieldset>
                            </div>
                             <div class="form-group">
                                <label for="exampleFormControlTextarea1" class="form-label">Lokasi Pendampingan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="lokasi_pendampingan" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Dokumen Pendukung</label>
                                <input type="file"
                                    class="form-control @error('dokumen_pendukung') is-invalid @enderror"
                                    id="basicInput" name="dokumen_pendukung" placeholder="...">

                                @error('dokumen_pendukung')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Kontak Aktif</label>
                                <input type="text" class="form-control" id="basicInput" name="kontak_aktif"
                                    placeholder="..." required>
                            </div>
                            
                        </div>
                        <div class="col-sm-12 mt-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="flexRadioDefault1" name="persetujuan" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Saya setuju dengan pernyataan diatas.
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

{{-- @section('css')
        <link rel="stylesheet" href="{{ asset('vendors/simple-datatables/style.css')}}">
@endsection

@section('js')
      <script src="{{ asset('vendors/simple-datatables/simple-datatables.js')}}"></script>
@endsection --}}

@endsection