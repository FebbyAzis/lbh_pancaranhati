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
            <h3>Konsultasi Masuk</h3>
            <p class="text-subtitle text-muted">Anda dapat melihat konsultasi masuk yang telah diajukan sebelumnya oleh pengguna pada halaman ini.</p>
        </div>
        <section class="section">
                    <div class="card">
            <div class="card-header">
                Tabel Data Konsultasi Masuk Manual/Petugas
            </div>
            <div class="card-body">
   
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                               <th>Judul</th>
                               <th>Kategori</th>
                                <th>Deskripsi</th>
                                 <th>Status</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($km as $no => $item)
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>
                                    <td>{{date("d/M/Y", strtotime($item->created_at));}}</td>
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->kategori}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                
                                    @if ($item->status == 1)
                                        <td><i class="fas fa-clock text-primary"></i>&nbsp; Belum ada jawaban</td>
                                    @else
                                        <td><i class="fas fa-check text-success"></i>&nbsp; Terjawab</td>
                                    
                                    @endif
                                    <td>
                                        <a href="{{route('detail.konsultasi',$item->id)}}" class="btn btn-sm btn-outline-primary">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
             
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Tabel Data Konsultasi Masuk Otomatis
            </div>
            <div class="card-body">
   
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                               <th>Judul</th>
                               <th>Kategori</th>
                                <th>Deskripsi</th>
                                 <th>Status</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ko as $no => $item)
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>
                                    <td>{{date("d/M/Y", strtotime($item->created_at));}}</td>
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->kategori}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                
                                    @if ($item->status == 1)
                                        <td><i class="fas fa-clock text-primary"></i>&nbsp; Belum ada jawaban</td>
                                    @else
                                        <td><i class="fas fa-check text-success"></i>&nbsp; Terjawab</td>
                                    
                                    @endif
                                    <td>
                                        <a href="{{route('detail.konsultasi',$item->id)}}" class="btn btn-sm btn-outline-primary">Detail</a>
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