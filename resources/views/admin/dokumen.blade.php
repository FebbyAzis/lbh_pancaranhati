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
            <p class="text-subtitle text-muted">Anda dapat melihat, menambahkan, mengubah, dan menghapus dokumen pada halaman ini.</p>
        </div>
        <section class="section">

            <div class="card">
                <div class="card-header">
                    <div class="row py-3">
                        <div class="col-sm-6">
                            Tabel Data Dokumen
                        </div>
                        <div class="col-sm-6 text-right">
                            <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                    data-target="#default1">
                                    Tambah Dokumen
                                </button>
                              
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
                                    <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                    data-target="#default2{{$item->id}}">
                                    Edit
                                </button>
                                <button type="button" class="btn btn-sm btn-outline-danger block" data-toggle="modal"
                                    data-target="#default3{{$item->id}}">
                                    Hapus
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

<form action="{{ url('/tambah-dokumen') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="modal fade text-left" id="default1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Form Tambah Dokumen</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="basicInput">Judul Dokumen</label>
                        <input type="text" class="form-control" id="basicInput" name="judul_dokumen"
                            placeholder="..." required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Dokumen</label>
                        <input type="file" class="form-control" id="basicInput" name="dokumen" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

@foreach ($dk as $item)
<form action="{{ url('edit-dokumen/' .$item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade text-left" id="default2{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Form Edit Dokumen</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label for="basicInput">Judul Dokumen</label>
                        <input type="text" class="form-control" id="basicInput" name="judul_dokumen" value="{{$item->judul_dokumen}}"
                            placeholder="..." required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="3" required>{{$item->deskripsi}}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Dokumen saat ini</label>
                        <br>
                        <img src="{{ url('/photos/'.$item->dokumen)}}" width="100%">
                        <br>
                        <p>{{$item->dokumen}}</p>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Dokumen</label>
                        <input type="file" class="form-control @error('dokumen') is-invalid @enderror" id="basicInput" name="dokumen" required>
                        @error('dokumen')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

@foreach ($dk as $item)
<form action="{{ url('hapus-dokumen/' .$item->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('DELETE')
    <div class="modal fade text-left" id="default3{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Hapus</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">                    
<p>Apakah anda yakin ingin menghapus dokumen <b>{{$item->judul_dokumen}}</b>? </p>
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
@endforeach




