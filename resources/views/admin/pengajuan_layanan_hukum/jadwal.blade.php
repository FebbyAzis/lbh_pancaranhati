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
            <h3>Jadwal Pendampingan</h3>
            <p class="text-subtitle text-muted">Anda dapat melihat jadwal pendampingan yang diterima, ditolak maupun pengajuan 
                pendampingan yang masih menunggu persetujuan pada halaman ini.</p>
        </div>
        <section class="section">
                    <div class="card">
            <div class="card-header">
                Tabel Data Jadwal Pendampingan
            </div>
            <div class="card-body">
   
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                               <th>Judul Permohonan</th>
                                <th>Tanggal Permintaan</th>
                                <th>Kategori Masalah</th>
                                 <th>Status</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($p as $no => $item)
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>
                                    <td>{{$item->judul_permohonan}}</td>
                                    <td>{{date("d/M/Y", strtotime($item->tanggal_permintaan));}}</td>
                                    <td>{{$item->kategori_masalah}}</td>
                                    @if ($item->jadwal->id == null)
                                        <td><i class="fas fa-xmark text-danger"></i>&nbsp; Belum ada jadwal</td>
                                    @else
                                        <td><i class="fas fa-check text-success"></i>&nbsp; Sudah ada jadwal</td>
                                    
                                    @endif
                                    <td>
                                        <a href="{{url('detail-jadwal/'.$item->id)}}" class="btn btn-sm btn-outline-primary">Detail</a>
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