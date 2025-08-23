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
                                    <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                    data-target="#default1{{$item->id}}">
                                    Detail
                                </button>
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

@foreach ($dj as $item)
<div class="modal fade text-left" id="default1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Detail Jadwal Kegiatan</h5>
                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <strong>Pemohon</strong>
                    </div>
                    <div class="col-sm-1 text-right">
                        <p>:</p>
                    </div>
                    <div class="col-sm-8">
                        <p>{{ $item->users->first_name }} {{ $item->users->last_name }}</p>
                    </div>
                    <div class="col-sm-3">
                        <strong>Nama Kegiatan</strong>
                    </div>
                    <div class="col-sm-1 text-right">
                        <p>:</p>
                    </div>
                    <div class="col-sm-8">
                        <p>{{ $item->nama_kegiatan }}</p>
                    </div>
                    <div class="col-sm-3">
                        <strong>Tanggal</strong>
                    </div>
                    <div class="col-sm-1 text-right">
                        <p>:</p>
                    </div>
                    <div class="col-sm-8">
                        <p>{{ date('d/M/Y', strtotime($item->tanggal_waktu)) }}</p>
                    </div>
                    <div class="col-sm-3">
                        <strong>Waktu</strong>
                    </div>
                    <div class="col-sm-1 text-right">
                        <p>:</p>
                    </div>
                    <div class="col-sm-8">
                        <p>{{ date('H:i', strtotime($item->tanggal_waktu)) }}</p>
                    </div>
                    <div class="col-sm-3">
                        <strong>Lokasi</strong>
                    </div>
                    <div class="col-sm-1 text-right">
                        <p>:</p>
                    </div>
                    <div class="col-sm-8">
                        <p>{{$item->lokasi}}</p>
                    </div>
                        <div class="col-sm-3">
                            <strong>Petugas Pendamping</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{$item->petugas_pendamping}}</p>
                        </div>
                    <div class="col-sm-3">
                        <strong>Status</strong>
                    </div>
                    <div class="col-sm-1 text-right">
                        <p>:</p>
                    </div>
                    <div class="col-sm-8">
                        @if ($item->status_jadwal == 1)
                                    <p><i class="fas fa-clock text-primary"></i>&nbsp; Jadwal sedang berlangsung</p>
                                @else
                                    <p><i class="fas fa-check text-success"></i>&nbsp; Jadwal Selesai</p>
                                
                                @endif
                    </div>
                    
    
                </div>
            </div>
            <div class="modal-footer">
               
                <button type="submit" class="btn btn-danger ml-1" data-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Tutup</span>
                </button>
            </div>
        </div>
    </div>
    </div>
    
@endforeach

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