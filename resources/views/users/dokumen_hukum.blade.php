@extends('layout.app')
@section('content')
    <div class="main-content container-fluid">
        @if (session('tambah_dokumen'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('tambah_dokumen') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('edit_dokumen'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('edit_dokumen') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('hapus_dokumen'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('hapus_dokumen') }}.
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
            <h3>Dokumen</h3>
            <p class="text-subtitle text-muted">Anda dapat meliha dan mengunduh dokumen yang anda butuhkan pada halaman ini.</p>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-header">
                    <div class="row py-3">
                        <div class="col-sm-6">
                            Tabel Data Dokumen
                        </div>
                        <div class="col-sm-6 text-right">
                          
                              
                        </div>
                    </div>
                </div>
            
            <div class="card-body">
                   
                <table class="table table-hover table-striped" id="table1">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                           <th class="text-center">Nama Kegiatan</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Dokumen</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dk as $no => $item)
                            <tr>
                                <td class="text-center">{{ $no + 1 }}</td>
                                <td>{{$item->judul_dokumen}}</td>
                                <td>{{$item->deskripsi}}</td>
                              
                                <td><img src="{{ url('/photos/' . $item->dokumen) }}" width="30%"><br>
                                    {{$item->dokumen}}
                                    </td>
                                <td class="text-center">
                                    <a href="{{ url('/photos/' . $item->dokumen) }}" download
                                    class="btn btn-sm btn-outline-primary block">Unduh</a>
                                   
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








