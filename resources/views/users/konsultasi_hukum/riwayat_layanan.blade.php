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
                                        <button type="button" class="btn btn-lg btn-outline-primary block mt-3"
                                            data-toggle="modal" data-target="#default{{ $item->id }}">
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

@foreach ($k as $item)
    <!--Basic Modal -->
    <div class="modal fade text-left" id="default{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel1">Detail Riwayat Konsultasi</h5>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p><b>Judul</b></p>
                        </div>
                        <div class="col-sm-1">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $item->judul }}</p>
                        </div>
                        <div class="col-sm-3">
                            <p><b>Kategori</b></p>
                        </div>
                        <div class="col-sm-1">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            <p>{{ $item->kategori }}</p>
                        </div>
                        <div class="col-sm-3">
                            <p><b>Deskripsi</b></p>
                        </div>
                        <div class="col-sm-1">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            {{ $item->deskripsi }}
                        </div>
                        <div class="col-sm-3">
                            <p><b>Metode Tanggapan</b></p>
                        </div>
                        <div class="col-sm-1">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            {{ $item->metode_tanggapan }}
                        </div>
                        <div class="col-sm-3">
                            <p><b>Kontak</b></p>
                        </div>
                        <div class="col-sm-1">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @if ($item->kontak == null)
                                <p>-</p>
                            @else
                                <p>{{ $item->kontak }}</p>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            <p><b>Dokumen</b></p>
                        </div>
                        <div class="col-sm-1">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @php
                                $dokumen = $item->dokumen;
                                $ext = strtolower(pathinfo($dokumen, PATHINFO_EXTENSION));
                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                            @endphp

                            @if (in_array($ext, $imageExtensions))
                                <!-- Jika file gambar -->
                                <img src="{{ url('/photos/' . $dokumen) }}" width="30%"><br>
                                <a href="{{ url('/photos/' . $dokumen) }}" target="_blank"
                                    class="btn btn-sm btn-primary">Lihat Gambar</a>
                            @elseif (in_array($ext, ['pdf', 'doc', 'docx']))
                                <!-- Jika file dokumen -->
                                <img src="{{ url('/photos/' . $item->dokumen) }}" width="30%"><br>
                                <a href="{{ url('/photos/' . $dokumen) }}" download
                                    class="btn btn-sm btn-success">Unduh Dokumen</a>
                            @elseif($item->dokumen == null)
                                <p class="text-muted">-</p>
                            @else
                                <!-- Jika tipe file tidak dikenali -->
                                <p class="text-muted">-</p>
                            @endif
                        </div>
                        <div class="col-sm-3">
                            <p><b>Jawaban Konsultasi</b></p>
                        </div>
                        <div class="col-sm-1">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @if ($item->metode_tanggapan == 'Otomatis')
                            @php
                       
                            $deskripsi = strtolower($item->deskripsi);
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
                        
                    
                            @else
                            @if($item->jawaban == null)
                            <p>Belum ada jawaban</p>
                            @else
                            <p>{{$item->jawaban}}</p>
                            @endif
                            @endif
                        
                        </div>
                        @if ($item->metode_tanggapan == 'Manual')
                        <div class="col-sm-3">
                            <strong>Dokumen dari Admin</strong>
                        </div>
                        <div class="col-sm-1 text-right">
                            <p>:</p>
                        </div>
                        <div class="col-sm-8">
                            @php
                                $dokumen_jawaban = $item->dokumen_jawaban;
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
                            <img src="{{ url('/photos/' . $item->dokumen_jawaban) }}" width="30%"><br>
                            <a href="{{ url('/photos/' . $dokumen_jawaban) }}" download
                                class="btn btn-sm btn-success mt-3 mb-3">Unduh Dokumen</a>
                        @elseif($item->dokumen_jawaban == null)
                        <p>-</p>
                        @else
                            <!-- Jika tipe file tidak dikenali -->
                            <p class="text-muted mt-3 mb-3">Format file tidak didukung</p>
                        @endif
                        @else
                            
                        @endif

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Tutup</span>
                    </button>

                </div>
            </div>
        </div>
    </div>
    </form>
@endforeach
