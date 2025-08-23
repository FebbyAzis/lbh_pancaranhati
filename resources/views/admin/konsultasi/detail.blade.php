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
    @if (session('jawab_konsultasi'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Success!</strong> {{ session('jawab_konsultasi') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
        <div class="page-title">
            </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <div class="row py-3">
                        <div class="col-sm-6">
                            Detail Data Konsultasi
                        </div>
                        <div class="col-sm-6 text-right">
                            @if ($k->status == 1)
                            <button type="button" class="btn btn-sm btn-outline-primary block" data-toggle="modal"
                                    data-target="#default2{{$k->id}}">
                                    Jawab Konsultasi
                                </button>
                           
                                
                            @else
                            @endif
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
                            <p>{{ $k->users->first_name }} {{ $k->users->last_name }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Judul</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $k->judul }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Kategori</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $k->kategori }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Deskripsi</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $k->deskripsi }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Metode Tanggapan</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $k->metode_tanggapan }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Tanggal</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ date('d/M/Y', strtotime($k->created_at)) }}</p>
                        </div>

                        <div class="col-sm-3">
                            <strong>Status</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @if ($k->status == 1)
                                        <p><i class="fas fa-clock text-primary"></i>&nbsp; Belum ada jawaban</p>
                                    @else
                                        <p><i class="fas fa-check text-success"></i>&nbsp; Terjawab</p>
                                    
                                    @endif
                        </div>
                        <div class="col-sm-3">
                            <strong>Kontak Aktif</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @if ($k->kontak == null)
                                <p>-</p>
                            @else
                            <p>{{ $k->kontak }}</p>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            <strong>Dokumen</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @php
                                $dokumen = $k->dokumen;
                                $ext = strtolower(pathinfo($dokumen, PATHINFO_EXTENSION));
                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                            @endphp
                        
                              
                                    
                            @if (in_array($ext, $imageExtensions))
                            <!-- Jika file gambar -->
                            <img src="{{ url('/photos/' . $dokumen) }}" width="30%"><br>
                            <a href="{{ url('/photos/' . $dokumen) }}" target="_blank"
                                class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>
                        @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                            <!-- Jika file dokumen -->
                            <img src="{{ url('/photos/' . $k->dokumen) }}" width="30%"><br>
                            <a href="{{ url('/photos/' . $dokumen) }}" download
                                class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                        @elseif($k->dokumen == null)
                        <p>-</p>
                        @else
                            <!-- Jika tipe file tidak dikenali -->
                            <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                        @endif
                  
    
                        </div>
                        <div class="col-sm-3">
                            <strong>Jawaban</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @if ($k->metode_tanggapan == 'Manual')
                                @if($k->jawaban == null)
                                <p>Belum ada jawaban</p>
                                @else
                                <p>{{$k->jawaban}}</p>
                                @endif
                            @else
                            @php
                      
                            $deskripsi = strtolower($k->deskripsi);
                        @endphp
                        
                        {{-- ======================= HUKUM KEKELUARGAAN ======================= --}}
                        @if (Str::contains($deskripsi, ['perceraian', 'cerai', 'talak']))
                            <p class="text-danger">Perceraian dapat diajukan ke Pengadilan Agama (bagi Muslim) atau Pengadilan Negeri (bagi Non-Muslim).</p>
                        
                        @elseif (Str::contains($deskripsi, ['hak asuh', 'anak', 'adopsi']))
                            <p class="text-warning">Hak asuh anak biasanya diputuskan oleh pengadilan berdasarkan kepentingan terbaik bagi anak.</p>
                        
                        @elseif (Str::contains($deskripsi, ['harta gono-gini', 'harta bersama']))
                            <p class="text-info">Harta bersama setelah perceraian dapat dibagi berdasarkan putusan pengadilan.</p>
                        
                        @elseif (Str::contains($deskripsi, ['warisan', 'wasiat', 'hibah']))
                            <p class="text-primary">Sengketa warisan dapat dilaporkan dan diselesaikan melalui pengadilan agama/negeri sesuai hukum yang berlaku.</p>
                        
                        @elseif (Str::contains($deskripsi, ['kdrt', 'kekerasan rumah tangga', 'penganiayaan keluarga']))
                            <p class="text-danger">Kasus KDRT dapat dilaporkan ke kepolisian atau lembaga perlindungan perempuan dan anak.</p>
                        
                        {{-- ======================= HUKUM PERDATA ======================= --}}
                        @elseif (Str::contains($deskripsi, ['hutang', 'piutang']))
                            <p class="text-primary">Kasus hutang-piutang termasuk perdata. Bukti perjanjian atau kuitansi dapat digunakan untuk menggugat di pengadilan negeri.</p>
                        
                        @elseif (Str::contains($deskripsi, ['kontrak', 'perjanjian', 'wanprestasi']))
                            <p class="text-warning">Jika ada wanprestasi (ingkar janji) dalam kontrak/perjanjian, pihak yang dirugikan dapat mengajukan gugatan ke pengadilan negeri.</p>
                        
                        @elseif (Str::contains($deskripsi, ['jual beli', 'transaksi']))
                            <p class="text-info">Sengketa jual beli termasuk perdata. Jika salah satu pihak wanprestasi, pihak lain berhak menuntut ganti rugi.</p>
                        
                        @elseif (Str::contains($deskripsi, ['sewa', 'kontrak sewa']))
                            <p class="text-secondary">Sengketa sewa menyewa dapat diselesaikan dengan perjanjian tertulis atau melalui pengadilan negeri.</p>
                        
                        {{-- ======================= HUKUM PIDANA ======================= --}}
                        @elseif (Str::contains($deskripsi, ['pencurian', 'mencuri']))
                            <p class="text-danger">Kasus pencurian termasuk pidana. Segera laporkan ke kepolisian dengan bukti atau saksi.</p>
                        
                        @elseif (Str::contains($deskripsi, ['penganiayaan']))
                            <p class="text-danger">Kasus penganiayaan termasuk pidana. Lakukan visum et repertum sebagai bukti dan laporkan ke polisi.</p>
                        
                        @elseif (Str::contains($deskripsi, ['penipuan', 'tipu']))
                            <p class="text-danger">Kasus penipuan termasuk pidana. Bukti transfer, komunikasi, atau saksi dapat digunakan untuk laporan polisi.</p>
                        
                        @elseif (Str::contains($deskripsi, ['penggelapan']))
                            <p class="text-danger">Kasus penggelapan termasuk pidana. Segera laporkan ke kepolisian dengan bukti kepemilikan.</p>
                        
                        @elseif (Str::contains($deskripsi, ['pembunuhan']))
                            <p class="text-danger">Kasus pembunuhan termasuk pidana berat. Segera laporkan ke kepolisian untuk penyelidikan lebih lanjut.</p>
                        
                        @elseif (Str::contains($deskripsi, ['narkotika', 'narkoba']))
                            <p class="text-danger">Kasus narkotika termasuk pidana khusus. Kepemilikan atau penggunaan dapat diproses hukum sesuai UU Narkotika.</p>
                        
                        @elseif (Str::contains($deskripsi, ['korupsi']))
                            <p class="text-danger">Kasus korupsi termasuk pidana khusus. Laporan dapat diajukan ke KPK atau kepolisian.</p>
                        
                        @elseif (Str::contains($deskripsi, ['pemerasan']))
                            <p class="text-danger">Kasus pemerasan termasuk pidana. Segera laporkan ke polisi dengan bukti komunikasi atau saksi.</p>
                        
                        @elseif (Str::contains($deskripsi, ['perjudian', 'judi']))
                            <p class="text-danger">Kasus perjudian termasuk pidana. Laporkan ke pihak berwenang untuk ditindaklanjuti.</p>
                        
                        {{-- ======================= HUKUM KETENAGAKERJAAN ======================= --}}
                        @elseif (Str::contains($deskripsi, ['phk', 'pemutusan kerja']))
                            <p class="text-warning">PHK harus sesuai ketentuan UU Ketenagakerjaan. Pekerja berhak atas pesangon, adukan ke Disnaker jika terjadi pelanggaran.</p>
                        
                        @elseif (Str::contains($deskripsi, ['upah', 'gaji']))
                            <p class="text-info">Kasus gaji termasuk hukum ketenagakerjaan. Jika tidak dibayarkan, laporkan ke Disnaker setempat.</p>
                        
                        @elseif (Str::contains($deskripsi, ['lembur']))
                            <p class="text-info">Kasus lembur termasuk ketenagakerjaan. Pekerja berhak atas upah lembur sesuai aturan UU.</p>
                        
                        @elseif (Str::contains($deskripsi, ['pesangon']))
                            <p class="text-info">Jika pesangon tidak diberikan saat PHK, pekerja dapat menuntut melalui Pengadilan Hubungan Industrial.</p>
                        
                        @elseif (Str::contains($deskripsi, ['bpjs']))
                            <p class="text-info">Perusahaan wajib mendaftarkan pekerja ke BPJS Kesehatan dan Ketenagakerjaan.</p>
                        
                        @elseif (Str::contains($deskripsi, ['cuti']))
                            <p class="text-info">Kasus cuti termasuk hukum ketenagakerjaan. Pekerja berhak mendapatkan cuti sesuai aturan UU.</p>
                        
                        @elseif (Str::contains($deskripsi, ['serikat pekerja']))
                            <p class="text-info">Pekerja berhak membentuk atau bergabung dalam serikat pekerja sesuai dengan UU.</p>
                        
                        {{-- ======================= DEFAULT ======================= --}}
                        @else
                            <p class="text-muted">Silakan konsultasi langsung ke petugas untuk mendapatkan bantuan lebih lanjut.</p>
                        @endif
                        
                            @endif
                        </div>

                        @if ($k->metode_tanggapan == 'Manual')
                        <div class="col-sm-3">
                            <strong>Dokumen dari Admin</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @php
                                $dokumen_jawaban = $k->dokumen_jawaban;
                                $ext = strtolower(pathinfo($dokumen_jawaban, PATHINFO_EXTENSION));
                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                            @endphp
                        
                              
                                    
                            @if (in_array($ext, $imageExtensions))
                            <!-- Jika file gambar -->
                            <img src="{{ url('/photos/' . $dokumen_jawaban) }}" width="30%"><br>
                            <a href="{{ url('/photos/' . $dokumen_jawaban) }}" target="_blank"
                                class="btn btn-sm btn-primary mt-3 mb-3">Lihat Gambar</a>
                        @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                            <!-- Jika file dokumen_jawaban -->
                            <img src="{{ url('/photos/' . $k->dokumen_jawaban) }}" width="30%"><br>
                            <a href="{{ url('/photos/' . $dokumen_jawaban) }}" download
                                class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                        @elseif($k->dokumen_jawaban == null)
                        <p>-</p>
                        @else
                            <!-- Jika tipe file tidak dikenali -->
                            <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                        @endif
                        @else
                            
                        @endif
                        
                    </div>
                   
                
                </div>
            </div>


        </section>
    </div>
@endsection

<form action="{{ url('jawab-konsultasi/' . $k->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade text-left" id="default2{{$k->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Form Jawab Konsultasi</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <strong>Judul</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $k->judul }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Kategori</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $k->kategori }}</p>
                        </div>
                        <div class="col-sm-3">
                            <strong>Deskripsi</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $k->deskripsi }}</p>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="2">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Jawaban Anda</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="jawaban" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="basicInput">Dokumen untuk Pemohon (Opsional)</label>
                        <input type="file"
                            class="form-control @error('dokumen_jawaban') is-invalid @enderror"
                            id="basicInput" name="dokumen_jawaban" placeholder="...">

                        @error('dokumen_jawaban')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
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
       
       $('#default4').on('shown.bs.modal', function () {
    $('.default4').select2({
        dropdownParent: $('#default4'),
        width: '100%'
    });
});
</script>  
@endsection