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
            <h3>Riwayat Layanan Pendampingan</h3>
            <p class="text-subtitle text-muted">Anda dapat melihat riwayat layanan pendampingan yang diterima, ditolak maupun
                pengajuan
                pendampingan yang masih menunggu persetujuan pada halaman ini.</p>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Tabel Data Riwayat Layanan Pendampingan
                </div>
                <div class="card-body">

                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Judul</th>
                                <th class="text-center">Kategori</th>
                                <th class="text-center">Deskripsi</th>
                                <th class="text-center">Metode Tanggapan</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($k as $no => $item)
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->deskripsi }}</td>
                                    <td>{{ $item->metode_tanggapan }}</td>
                                    @if ($item->status == 1)
                                        <td><i class="fas fa-check text-success"></i>&nbsp; Terjawab</td>
                                    @else
                                        <td><i class="fas fa-clock text-primary"></i>&nbsp; Belum ada jawaban</td>
                                    @endif
                                    <td>
                                        {{-- <button type="button" class="btn btn-lg btn-outline-primary block mt-3"
                                            data-toggle="modal" data-target="#default{{ $item->id }}">
                                            Detail
                                        </button> --}}
                                        <a href="{{route('konsultasiUser.detail' ,$item->id)}}" class="btn btn-sm btn-outline-primary block">Detail</a>
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


