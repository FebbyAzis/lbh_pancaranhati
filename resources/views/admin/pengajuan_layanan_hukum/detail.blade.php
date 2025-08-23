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
                            @elseif($p->status == 2)
                            <button type="button" class="btn btn-sm btn-outline-success block" data-toggle="modal"
                                    data-target="#default3">
                                    Atur Jadwal
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
                            <strong>Catatan dari Petugas</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">

                            <p>{{ $p->catatan }}</p>
                        </div>

                        <div class="col-sm-3">
                            <strong>Dokumen dari Petugas</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        @php
                        $dokumen_admin = $p->dokumen_admin;
                        $ext = strtolower(pathinfo($dokumen_admin, PATHINFO_EXTENSION));
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    @endphp
                
                        <div class="col-sm-8">
                            
                    @if (in_array($ext, $imageExtensions))
                    <!-- Jika file gambar -->
                    <img src="{{ url('/photos/' . $dokumen_admin) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $dokumen_admin) }}" target="_blank"
                        class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>
                @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                    <!-- Jika file dokumen -->
                    <img src="{{ url('/photos/' . $p->dokumen_admin) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $dokumen_admin) }}" download
                        class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                @elseif($p->dokumen_admin == null)
                @else
                    <!-- Jika tipe file tidak dikenali -->
                    <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                @endif
                           

                        </div>

                       

                </div>
            </div>

            </div>
            <div class="card">
                <div class="card-header">
                    Dokumen Anda
                </div>
                <div class="card-body mt-3">
                    <div class="row">
                        <div class="col-sm-3">
                            <strong>Surat Panggilan Sidang</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        @php
                        $surat_panggilan_sidang = $p->surat_panggilan_sidang;
                        $ext = strtolower(pathinfo($surat_panggilan_sidang, PATHINFO_EXTENSION));
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    @endphp
                
                        <div class="col-sm-8">
                            
                    @if (in_array($ext, $imageExtensions))
                    <!-- Jika file gambar -->
                    <img src="{{ url('/photos/' . $surat_panggilan_sidang) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $surat_panggilan_sidang) }}" target="_blank"
                        class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>
                @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                    <!-- Jika file dokumen -->
                    <img src="{{ url('/photos/' . $p->surat_panggilan_sidang) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $surat_panggilan_sidang) }}" download
                        class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                @elseif($p->surat_panggilan_sidang == null)
                @else
                    <!-- Jika tipe file tidak dikenali -->
                    <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                @endif
                           

                        </div>

                        <div class="col-sm-3">
                            <strong>Bukti Transaksi</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        @php
                        $bukti_transaksi = $p->bukti_transaksi;
                        $ext = strtolower(pathinfo($bukti_transaksi, PATHINFO_EXTENSION));
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    @endphp
                
                        <div class="col-sm-8">
                            
                    @if (in_array($ext, $imageExtensions))
                    <!-- Jika file gambar -->
                    <img src="{{ url('/photos/' . $bukti_transaksi) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $bukti_transaksi) }}" target="_blank"
                        class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>
                @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                    <!-- Jika file dokumen -->
                    <img src="{{ url('/photos/' . $p->bukti_transaksi) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $bukti_transaksi) }}" download
                        class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                @elseif($p->bukti_transaksi == null)
                @else
                    <!-- Jika tipe file tidak dikenali -->
                    <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                @endif
                           

                        </div>

                        <div class="col-sm-3">
                            <strong>Scan Akta</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        @php
                        $akta = $p->akta;
                        $ext = strtolower(pathinfo($akta, PATHINFO_EXTENSION));
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    @endphp
                
                        <div class="col-sm-8">
                            
                    @if (in_array($ext, $imageExtensions))
                    <!-- Jika file gambar -->
                    <img src="{{ url('/photos/' . $akta) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $akta) }}" target="_blank"
                        class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>
                @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                    <!-- Jika file dokumen -->
                    <img src="{{ url('/photos/' . $p->akta) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $akta) }}" download
                        class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                @elseif($p->akta == null)
                @else
                    <!-- Jika tipe file tidak dikenali -->
                    <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                @endif
                           

                        </div>

                        <div class="col-sm-3">
                            <strong>Dokumen Perjanjian</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        @php
                        $perjanjian = $p->perjanjian;
                        $ext = strtolower(pathinfo($perjanjian, PATHINFO_EXTENSION));
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    @endphp
                
                        <div class="col-sm-8">
                            
                    @if (in_array($ext, $imageExtensions))
                    <!-- Jika file gambar -->
                    <img src="{{ url('/photos/' . $perjanjian) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $perjanjian) }}" target="_blank"
                        class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>
                @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                    <!-- Jika file dokumen -->
                    <img src="{{ url('/photos/' . $p->perjanjian) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $perjanjian) }}" download
                        class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                @elseif($p->perjanjian == null)
                @else
                    <!-- Jika tipe file tidak dikenali -->
                    <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                @endif
                           

                        </div>

                        <div class="col-sm-3">
                            <strong>Scan KTP</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        @php
                        $ktp = $p->ktp;
                        $ext = strtolower(pathinfo($ktp, PATHINFO_EXTENSION));
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    @endphp
                
                        <div class="col-sm-8">
                            
                    @if (in_array($ext, $imageExtensions))
                    <!-- Jika file gambar -->
                    <img src="{{ url('/photos/' . $ktp) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $ktp) }}" target="_blank"
                        class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>
                @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                    <!-- Jika file dokumen -->
                    <img src="{{ url('/photos/' . $p->ktp) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $ktp) }}" download
                        class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                @elseif($p->ktp == null)
                @else
                    <!-- Jika tipe file tidak dikenali -->
                    <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                @endif
                           

                        </div>

                        <div class="col-sm-3">
                            <strong>Surat Kuasa</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        @php
                        $surat_kuasa = $p->surat_kuasa;
                        $ext = strtolower(pathinfo($surat_kuasa, PATHINFO_EXTENSION));
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    @endphp
                
                        <div class="col-sm-8">
                            
                    @if (in_array($ext, $imageExtensions))
                    <!-- Jika file gambar -->
                    <img src="{{ url('/photos/' . $surat_kuasa) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $surat_kuasa) }}" target="_blank"
                        class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>
                @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                    <!-- Jika file dokumen -->
                    <img src="{{ url('/photos/' . $p->surat_kuasa) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $surat_kuasa) }}" download
                        class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                @elseif($p->surat_kuasa == null)
                @else
                    <!-- Jika tipe file tidak dikenali -->
                    <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                @endif
                           

                        </div>

                        <div class="col-sm-3">
                            <strong>Bukti Lainnya</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        @php
                        $bukti_lainnya = $p->bukti_lainnya;
                        $ext = strtolower(pathinfo($bukti_lainnya, PATHINFO_EXTENSION));
                        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    @endphp
                
                        <div class="col-sm-8">
                            
                    @if (in_array($ext, $imageExtensions))
                    <!-- Jika file gambar -->
                    <img src="{{ url('/photos/' . $bukti_lainnya) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $bukti_lainnya) }}" target="_blank"
                        class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>
                @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                    <!-- Jika file dokumen -->
                    <img src="{{ url('/photos/' . $p->bukti_lainnya) }}" width="30%"><br>
                    <a href="{{ url('/photos/' . $bukti_lainnya) }}" download
                        class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                @elseif($p->bukti_lainnya == null)
                @else
                    <!-- Jika tipe file tidak dikenali -->
                    <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                @endif
                           

                        </div>



                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection


<form action="{{ url('terima-pengajuan/' . $p->id) }}" method="POST" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label for="basicInput">Dokumen untuk Pemohon (Opsional)</label>
                        <input type="file"
                            class="form-control @error('dokumen_admin') is-invalid @enderror"
                            id="basicInput" name="dokumen_admin" placeholder="...">

                        @error('dokumen_admin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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

<form action="{{ url('tolak-pengajuan/' . $p->id) }}" method="POST" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label for="basicInput">Dokumen untuk Pemohon (Opsional)</label>
                        <input type="file"
                            class="form-control @error('dokumen_admin') is-invalid @enderror"
                            id="basicInput" name="dokumen_admin" placeholder="...">

                        @error('dokumen_admin')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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

<form action="{{ url('/atur-jadwal') }}" method="POST" enctype="multipart/form-data">
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
                    {{-- <input type="hidden" name="petugas_id" value="{{ $users }}"> --}}
                    <input type="hidden" name="users_id" value="{{$p->users_id}}">
                    
                    {{-- <div class="form-group">
                        <label>Pilih Petugas</label>
                        <select class="default3" name="petugas[]" multiple required>
                            
                            @foreach ($pp as $item)
                                <option value="{{ $item->id }}">{{ $item->first_name }} {{ $item->last_name }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    
                    <div class="form-group">
                        <label for="basicInput">Judul Acara</label>
                        <input type="text" class="form-control" id="basicInput" name="judul_acara" value="{{$p->judul_permohonan}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3" required>{{$p->detail_kasus}}</textarea>
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

@section('css')

@endsection

@section('js')
<script>
       
       $('#default3').on('shown.bs.modal', function () {
    $('.default3').select2({
        dropdownParent: $('#default3'),
        width: '100%'
    });
});
</script>  
@endsection

