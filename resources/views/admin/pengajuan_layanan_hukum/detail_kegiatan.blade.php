@extends('layout.app')
@section('content')
    <div class="main-content container-fluid">
        @if (session('update_status'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('update_status') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('edit_kegiatan'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('edit_kegiatan') }}.
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
        <div class="page-title">
            <h3>Detail Jadwal Kegiatan</h3>
            <p class="text-subtitle text-muted">Anda dapat melihat detail Jadwal Kegiatan yang sudah dijadwalkan maupun belum dijadwalkan pada halaman ini.</p>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row py-3">
                        <div class="col-sm-6">
                            Detail Data Jadwal Kegiatan Anda
                        </div>
                        <div class="col-sm-6 text-right">
                            @if ($dj->status_jadwal == 1)
                                <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                    data-target="#default{{$dj->id}}">
                                    Update Status
                                </button>
                            @else
                            @endif
                            <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                    data-target="#dyy{{$dj->id}}">
                                    Edit Jadwal
                                </button>
                                
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
                            <p>{{ $dj->users->first_name }} {{ $dj->users->last_name }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Nama Kegiatan</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $dj->nama_kegiatan }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Tanggal</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ date('d/M/Y', strtotime($dj->tanggal_waktu)) }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Waktu</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ date('H:i', strtotime($dj->tanggal_waktu)) }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Lokasi</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{$dj->lokasi}}</p>
                        </div>
                            <div class="col-sm-3">
                                <strong>Petugas Pendamping</strong>
                            </div>
                            <div class="col-sm-1 text-right">
                                <p>:</p>
                            </div>
                            <div class="col-sm-8">
                                <p>{{$dj->petugas_pendamping}}</p>
                            </div>
                        <div class="col-sm-3">
                            <strong>Status</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @if ($dj->status_jadwal == 1)
                                        <p><i class="fas fa-clock text-primary"></i>&nbsp; Jadwal sedang berlangsung</p>
                                    @else
                                        <p><i class="fas fa-check text-success"></i>&nbsp; Jadwal Selesai</p>
                                    
                                    @endif
                        </div>
                        

                    </div>

                </div>
            </div>

        </section>
    </div>
@endsection


<form action="{{ url('update-kegiatan/' . $dj->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade text-left" id="default{{$dj->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Update Status</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Apakah anda yakin ingin mengubah status jadwal kegiatan
                        <b>{{ $dj->nama_kegiatan }} - {{ $dj->users->first_name }} {{ $dj->users->last_name }}</b> menjadi selesai?
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

<form action="{{ url('edit-detail-kegiatan/' . $dj->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade text-left dyy" id="dyy{{$dj->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Edit Jadwal Kegiatan</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="basicInput">Nama Kegiatan</label>
                        <input type="text" class="form-control" id="basicInput" name="nama_kegiatan" value="{{$dj->nama_kegiatan}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        
                        <label>Petugas saat ini : {{$dj->petugas_pendamping}}</label><br>
                        <label>Ganti Petugas</label>
                        <select class="select-petugas" id="dyy" name="petugas_pendamping[]" required multiple>
                            {{$dj->petugas_pendamping}}
                            @foreach ($pp as $item)
                                <option value="{{ $item->first_name }} {{ $item->last_name }}">{{ $item->first_name }} {{ $item->last_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Tanggal dan Waktu</label>
                        <input type="datetime-local" class="form-control" id="basicInput" name="tanggal_waktu" value="{{$dj->tanggal_waktu}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Lokasi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="lokasi" rows="3" required>{{ $dj->lokasi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Catatan dari Petugas</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="catatan_petugas" rows="3" required>{{$dj->catatan_petugas}}</textarea>
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
$(document).ready(function () {
    // Jalankan Select2 setiap modal dibuka
    $(document).on('shown.bs.modal', function (event) {
        var modal = $(event.target);
        modal.find('.select-petugas').select2({
            dropdownParent: modal, // parent sesuai modal aktif
            width: '100%'
        });
    });
});

</script>  
@endsection


