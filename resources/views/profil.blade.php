@extends('layout.app')
@section('content')
    <div class="main-content container-fluid">
        @if (session('edit_foto'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('edit_foto') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('edit_data'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('edit_data') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="page-title">
        <div class="row">
            <div class="col-sm-8">
                <h3>Profil</h3>
                <p class="text-subtitle text-muted">Pada halaman ini terdapat beberapa informasi terkait data 
                    pada akun anda. Anda dapat mengubah data tersebut kapanpun.</p>
            </div>
            <div class="col-sm-4 text-right">
                <button type="button" class="btn btn-sm btn-outline-primary block mt-2" data-toggle="modal"
                data-target="#default{{$user->id}}">
                Ubah Data Anda
            </button>
            </div>
        </div>
        
       
    </div>
    <section class="section">
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row mt-3 mb-2">
                    <div class="col-sm-3">
                        <div class="avatar mr-1">
                            <div class="row">
                                <div class="col-sm-12 mb-3">
                                    <center>
                                        @if ($user->foto_profil == null)
                                        <img src="{{ asset('images/avatar/avatar-s-1.png') }}" alt="" srcset="" 
                                        style="width:200px; height:200px; object-fit:cover;">
                                        @else
                                        <img src="{{ url('/photos/'.$user->foto_profil)}}" alt="" srcset="" 
                                        style="width:200px; height:200px; object-fit:cover;">
                                        @endif

                                   
                                    </center>
                                </div>
                                
                                <div class="col-sm-12 mt-4">
                                    <center>
                                        <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                        data-target="#default2{{$user->id}}">
                                        Ubah Foto Profil
                                    </button>
                                    
                                    </center>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <p><b>Nama Lengkap</b></p>
                        <p><b>Username</b></p>
                        <p><b>Hak Akses</b></p>
                        <p><b>Email</b></p>
                        <p><b>No Handphone</b></p>
                        <p><b>Tanggal Lahir</b></p>
                        <p><b>Jenis Kelamin</b></p>
                        <p><b>Alamat</b></p>
                    </div>
                    <div class="col-sm-1 text-right">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-sm-6">
                        <p>{{$user->first_name}} {{$user->last_name}}</p>
                        <p>{{$user->username}}</p>
                        @if ($user->role == 'admin')
                            <p>Administrator</p>
                        @else
                        <p>Pengguna</p>
                        @endif
                        <p>{{$user->email}}</p>
                        @if ($user->no_tlp == null)
                            <p>-</p>
                        @else
                        <p>{{$user->no_tlp}}</p>
                        @endif
                        @if ($user->ttl == null)
                        <p>-</p>
                        @else
                        <p>{{ date('d/M/Y', strtotime($user->ttl)) }}</p>
                        @endif
                        @if ($user->jenis_kelamin == null)
                            <p>-</p>
                        @else
                        <p>{{$user->jenis_kelamin}}</p>
                        @endif
                        @if ($user->alamat == null)
                            <p>-</p>
                        @else
                        <p>{{$user->alamat}}</p>
                        @endif
                    </div>
                    <div class="col-sm-12 text-right">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
</div>
@endsection

<form action="{{ url('edit-data/' . $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade text-left dyy" id="default{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Form Edit Data Anda</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="basicInput">Nama Depan</label>
                        <input type="text" class="form-control" id="basicInput" name="first_name" value="{{$user->first_name}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Nama Belakang</label>
                        <input type="text" class="form-control" id="basicInput" name="last_name" value="{{$user->last_name}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Username</label>
                        <input type="text" class="form-control" id="basicInput" name="username" value="{{$user->username}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="basicInput" name="email" value="{{$user->email}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">No Handphone</label>
                        <input type="text" class="form-control" id="basicInput" name="no_tlp" value="{{$user->no_tlp}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="basicInput" name="ttl" value="{{$user->ttl}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" id="" name="jenis_kelamin" required>
                            <option>--Pilih jenis kelamin--</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3" required>{{ $user->alamat }}</textarea>
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

<form action="{{ url('edit-foto/' .$user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade text-left" id="default2{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Ubah Foto Profil</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">                    
                   
                    <div class="form-group">
                        <label class="form-label" for="exampleInputText1">Foto saat ini</label>
                        <br>
                        <center>
                        @if ($user->foto_profil == null)
                        <img src="{{ asset('images/avatar/avatar-s-1.png') }}" alt="" srcset="" 
                        style="width:200px; height:200px; object-fit:cover;">
                        @else
                        <img src="{{ url('/photos/'.$user->foto_profil)}}" width="100%">
                        @endif
                        <br>
                    </center>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Ubah Foto Profil</label>
                        <input type="file" class="form-control @error('foto_profil') is-invalid @enderror" id="basicInput" name="foto_profil" required>
                        @error('foto_profil')
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