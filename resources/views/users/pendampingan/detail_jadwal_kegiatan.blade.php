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
                            <strong>Nama Kegiatan</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $j->nama_kegiatan }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Tanggal</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ date('d/M/Y', strtotime($j->tanggal_waktu)) }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Waktu</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ date('H:i', strtotime($j->tanggal_waktu)) }}</p>
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
                                <strong>Petugas Pendamping</strong>
                            </div>
                            <div class="col-sm-1 text-right">
                                <p>:</p>
                            </div>
                            <div class="col-sm-8">
                                <p>{{$j->petugas_pendamping}}</p>
                            </div>
                        <div class="col-sm-3">
                            <strong>Status</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @if ($j->status_jadwal == 1)
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