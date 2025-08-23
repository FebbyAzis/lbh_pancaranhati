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
        @if (session('detailjadwal'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('detailjadwal') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('update_jadwal'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('update_jadwal') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('edit_jadwal'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('edit_jadwal') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
        <div class="page-title">
            <h3>Detail Jadwal Pendampingan</h3>
            <p class="text-subtitle text-muted">Anda dapat melihat detail Jadwal Pendampingan yang sudah dijadwalkan maupun belum dijadwalkan pada halaman ini.</p>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row py-3">
                        <div class="col-sm-6">
                            Detail Data Jadwal Pendampingan Anda
                        </div>
                        <div class="col-sm-6 text-right">
                            @if ($j->status == 1)
                            <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                    data-target="#default2{{$j->id}}">
                                    Update Status
                                </button>
                            <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                    data-target="#default1{{$j->id}}">
                                    Edit Jadwal
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                    data-target="#default4">
                                    Tambah Jadwal
                                </button>
                                
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <strong>Pemohon</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $j->users->first_name }} {{ $j->users->last_name }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Judul Acara</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $j->judul_acara }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Deskripsi</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $j->deskripsi }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Tanggal Mulai</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ date('d/M/Y', strtotime($j->tanggal_mulai)) }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Tanggal Selesai</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ date('d/M/Y', strtotime($j->tanggal_selesai)) }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Lokasi</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{$j->lokasi}}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Status</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @if ($j->status == 1)
                                        <p><i class="fas fa-clock text-primary"></i>&nbsp; Dijadwalkan</p>
                                    @else
                                        <p><i class="fas fa-check text-success"></i>&nbsp; Jadwal Selsai</p>
                                    
                                    @endif
                        </div>
                        

                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    Jadwal Kegiatan Anda
                </div>
            
            <div class="card-body">
                   
                <table class="table table-hover table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                           <th class="text-center">Nama Kegiatan</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Waktu</th>
                            <th class="text-center">Lokasi</th>
                             <th class="text-center">Petugas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dj as $no => $item)
                            <tr>
                                <td class="text-center">{{ $no + 1 }}</td>
                                <td>{{$item->nama_kegiatan}}</td>
                                <td>{{date("d/M/Y", strtotime($item->tanggal_waktu));}}</td>
                                <td>{{date("H:i", strtotime($item->tanggal_waktu));}}</td>
                                <td>{{$item->lokasi}}</td>
                                <td>{{$item->petugas_pendamping}}</td>
                                <td>
                                    <a href="{{url('detail-jadwal-kegiatan/'.$item->id)}}" class="btn btn-sm btn-outline-primary">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
         
            </div>
        </div>
        </section>
    </div>
@endsection


<form action="{{ url('terima-pengajuan/' . $j->id) }}" method="POST">
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
                        Apakah anda yakin ingin menerima Jadwal Pendampingan dengan judul permohonan
                        <b>{{ $j->judul_permohonan }} - {{ $j->kategori_masalah }}</b>
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

<form action="{{ url('update-jadwal/' . $j->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade text-left" id="default2{{$j->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
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
                        Apakah anda yakin ingin mengubah status jadwal 
                        <b>{{ $j->judul_acara }} - {{ $j->users->first_name }} {{ $j->users->last_name }}</b> menjadi selesai?
                    </p>
             
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

<form action="{{ url('/tambah-jadwal') }}" method="POST">
    @csrf
    @method('POST')
    <div class="modal fade text-left" id="default4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Form Tambah Jadwal</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="jadwal_id" value="{{ $j->id }}">
                    <input type="hidden" name="users_id" value="{{ $j->users->id }}">

                    <div class="form-group">
                        <label for="basicInput">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="basicInput" name="nama_kegiatan" value="{{$j->judul_acara}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label>Pilih Petugas</label>
                        <select class="default4" name="petugas_pendamping[]" multiple required>
                            
                            @foreach ($pp as $item)
                                <option value="{{ $item->first_name }} {{ $item->last_name }}">{{ $item->first_name }} {{ $item->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Tanggal dan Waktu</label>
                        <input type="datetime-local" class="form-control" id="basicInput" name="tanggal_waktu"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="lokasi" rows="3" required>{{ $j->lokasi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Catatan dari Petugas</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="catatan_petugas" rows="3" required></textarea>
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

<form action="{{ url('edit-jadwal/' . $j->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade text-left dyy" id="default1{{$j->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">form Edit Jadwal</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="basicInput">Judul Acara</label>
                        <input type="text" class="form-control" id="basicInput" name="judul_acara" value="{{$j->judul_acara}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3" required>{{$j->deskripsi}}</textarea>
                    </div>    

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="basicInput" name="tanggal_mulai" value="{{$j->tanggal_mulai}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="basicInput" name="tanggal_selesai" value="{{$j->tanggal_selesai}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="lokasi" rows="3" required>{{ $j->lokasi }}</textarea>
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

@section('js')
<script>
       
       $('#default4').on('shown.bs.modal', function () {
    $('.default4').select2({
        dropdownParent: $('#default4'),
        width: '100%'
    });
});
</script>  
@endsection