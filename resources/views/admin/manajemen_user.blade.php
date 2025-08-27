@extends('layout.app')
@section('content')
    <div class="main-content container-fluid">
        @if (session('edit'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('edit') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="page-title">
            <h3>Manajemen User</h3>
            <p class="text-subtitle text-muted">Anda dapat mengelola profil user pada halaman ini.</p>
        </div>
        <section class="section">
                    <div class="card">
            <div class="card-header">
                Tabel Data Manajemen User
            </div>
            <div class="card-body">
   
                    <table class="table table-hover table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                               <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Email</th>
                                 <th>No Telepon</th>
                                 <th>Tanggal Lahir</th>
                                 <th>Jenis Kelamin</th>
                                 <th>Alamat</th>
                                 <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mu as $no => $item)
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>
                                    <td>{{$item->first_name}} {{$item->last_name}}</td>
                                    <td>{{$item->username}}</td>
                                    <td>{{$item->email}}</td>
                                    @if ($item->no_tlp == null)
                                    <td>-</td>
                                    @else
                                    <td>{{$item->no_tlp}}</td>
                                    @endif
                                    @if ($item->ttl == null)
                                    <td>-</td>
                                    @else
                                    <td>{{date("d/M/Y", strtotime($item->ttl));}}</td>
                                    @endif
                                    @if ($item->jenis_kelamin == null)
                                    <td>-</td>
                                    @else
                                    <td>{{$item->jenis_kelamin}}</td>
                                    @endif
                                    @if ($item->alamat == null)
                                    <td>-</td>
                                    @else
                                    <td>{{$item->alamat}}</td>
                                    @endif
                                    <td>
                                        <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                    data-target="#default3{{$item->id}}">
                                    Edit
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

@foreach ($mu as $item)
<form action="{{ url('edit-user/' . $item->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade text-left dyy" id="default3{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
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
                        <input type="text" class="form-control" id="basicInput" name="first_name" value="{{$item->first_name}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Nama Belakang</label>
                        <input type="text" class="form-control" id="basicInput" name="last_name" value="{{$item->last_name}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Username</label>
                        <input type="text" class="form-control" id="basicInput" name="username" value="{{$item->username}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="basicInput" name="email" value="{{$item->email}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">No Handphone</label>
                        <input type="text" class="form-control" id="basicInput" name="no_tlp" value="{{$item->no_tlp}}"
                            placeholder="..." required>
                    </div>

                    <div class="form-group">
                        <label for="basicInput">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="basicInput" name="ttl" value="{{$item->ttl}}"
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
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3" required>{{ $item->alamat }}</textarea>
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
