<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIPDKM</title>
    <link rel="shortcut icon" href="{{asset('logo1.jpg')}}" type="image/x-icon">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .kop-surat {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-surat img {
            width: 80px;
            height: 80px;
            margin-right: 20px;
        }
        .kop-surat .text {
            text-align: center;
        }
        .kop-surat .text h1 {
            margin: 0;
            font-size: 24px;
        }
        .kop-surat .text h2 {
            margin: 0;
            font-size: 20px;
            font-weight: normal;
        }
        .kop-surat .text h3 {
            margin: 0;
            font-size: 16px;
            font-weight: normal;
        }
        .kop-surat .text p {
            margin: 0;
            font-size: 16px;
            font-style: italic;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
            font-size: 11px;
        }
        th {
            background-color: #f4f4f4;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #e0e0e0;
        }
        h1{
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="kop-surat">
        
        <img src="{{asset('logo1.jpg')}}" alt="Logo Posyandu"> <!-- Ganti logo.png dengan path logo -->
        <div class="text">
            <center>
            <h1 class>Sistem Informasi Posyandu Desa Karang Mekar</h1>
          <h2>Laporan Konsultasi</h2>
            <h3>Periode {{ date('d/M/Y', strtotime($tglawal)) }} - {{ date('d/M/Y', strtotime($tglakhir)) }}</h3>
        </center>
        </div>

    </div>
    <div class="card">
        {{-- <center>
        <h1>Data Penimbangan</h1>
    </center> --}}
        <div class="col-sm-12">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Judul</th>
                        <th>kategori</th>
                        <th>Deskripsi</th>
                        <th>Metode Tanggapan</th>
                        <th>Kontak</th>
                        <th>Status</th>
                        <th>Jawaban</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($k as $no=>$item)
                    <tr>
                        <td>{{$no+1}}</td>
                        <td>{{ date('d/M/Y', strtotime($item->created_at)) }}</td>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->kategori}}</td>
                        <td>{{$item->deskripsi}}</td>
                        <td>{{$item->metode_tanggapan}}</td>
                        <td>{{$item->kontak}}</td>
                        <td>
                            @if ($item->status == 1)
                            Belum ada jawaban
                        @else
                            Terjawab
                        
                        @endif
                        </td>
                        <td>
                            @if ($item->metode_tanggapan == 'Manual')
                            @if($item->jawaban == null)
                            Belum ada jawaban
                            @else
                            {{$item->jawaban}}
                            @endif
                        @else
                        @php
                  
                        $deskripsi = strtolower($item->deskripsi);
                    @endphp
                    
                    {{-- ======================= HUKUM KEKELUARGAAN ======================= --}}
                    @if (Str::contains($deskripsi, ['perceraian', 'cerai', 'talak']))
                        Perceraian dapat diajukan ke Pengadilan Agama (bagi Muslim) atau Pengadilan Negeri (bagi Non-Muslim).
                    
                    @elseif (Str::contains($deskripsi, ['hak asuh', 'anak', 'adopsi']))
                        Hak asuh anak biasanya diputuskan oleh pengadilan berdasarkan kepentingan terbaik bagi anak.
                    
                    @elseif (Str::contains($deskripsi, ['harta gono-gini', 'harta bersama']))
                        Harta bersama setelah perceraian dapat dibagi berdasarkan putusan pengadilan.
                    
                    @elseif (Str::contains($deskripsi, ['warisan', 'wasiat', 'hibah']))
                        Sengketa warisan dapat dilaporkan dan diselesaikan melalui pengadilan agama/negeri sesuai hukum yang berlaku.
                    
                    @elseif (Str::contains($deskripsi, ['kdrt', 'kekerasan rumah tangga', 'penganiayaan keluarga']))
                        Kasus KDRT dapat dilaporkan ke kepolisian atau lembaga perlindungan perempuan dan anak.
                    
                    {{-- ======================= HUKUM PERDATA ======================= --}}
                    @elseif (Str::contains($deskripsi, ['hutang', 'piutang']))
                        Kasus hutang-piutang termasuk perdata. Bukti perjanjian atau kuitansi dapat digunakan untuk menggugat di pengadilan negeri.
                    
                    @elseif (Str::contains($deskripsi, ['kontrak', 'perjanjian', 'wanprestasi']))
                        Jika ada wanprestasi (ingkar janji) dalam kontrak/perjanjian, pihak yang dirugikan dapat mengajukan gugatan ke pengadilan negeri.
                    
                    @elseif (Str::contains($deskripsi, ['jual beli', 'transaksi']))
                        Sengketa jual beli termasuk perdata. Jika salah satu pihak wanprestasi, pihak lain berhak menuntut ganti rugi.
                    
                    @elseif (Str::contains($deskripsi, ['sewa', 'kontrak sewa']))
                        Sengketa sewa menyewa dapat diselesaikan dengan perjanjian tertulis atau melalui pengadilan negeri.
                    
                    {{-- ======================= HUKUM PIDANA ======================= --}}
                    @elseif (Str::contains($deskripsi, ['pencurian', 'mencuri']))
                        Kasus pencurian termasuk pidana. Segera laporkan ke kepolisian dengan bukti atau saksi.
                    
                    @elseif (Str::contains($deskripsi, ['penganiayaan']))
                        Kasus penganiayaan termasuk pidana. Lakukan visum et repertum sebagai bukti dan laporkan ke polisi.
                    
                    @elseif (Str::contains($deskripsi, ['penipuan', 'tipu']))
                        Kasus penipuan termasuk pidana. Bukti transfer, komunikasi, atau saksi dapat digunakan untuk laporan polisi.
                    
                    @elseif (Str::contains($deskripsi, ['penggelapan']))
                        Kasus penggelapan termasuk pidana. Segera laporkan ke kepolisian dengan bukti kepemilikan.
                    
                    @elseif (Str::contains($deskripsi, ['pembunuhan']))
                        Kasus pembunuhan termasuk pidana berat. Segera laporkan ke kepolisian untuk penyelidikan lebih lanjut.
                    
                    @elseif (Str::contains($deskripsi, ['narkotika', 'narkoba']))
                        Kasus narkotika termasuk pidana khusus. Kepemilikan atau penggunaan dapat diproses hukum sesuai UU Narkotika.
                    
                    @elseif (Str::contains($deskripsi, ['korupsi']))
                        Kasus korupsi termasuk pidana khusus. Laporan dapat diajukan ke KPK atau kepolisian.
                    
                    @elseif (Str::contains($deskripsi, ['pemerasan']))
                        Kasus pemerasan termasuk pidana. Segera laporkan ke polisi dengan bukti komunikasi atau saksi.
                    
                    @elseif (Str::contains($deskripsi, ['perjudian', 'judi']))
                        Kasus perjudian termasuk pidana. Laporkan ke pihak berwenang untuk ditindaklanjuti.
                    
                    {{-- ======================= HUKUM KETENAGAKERJAAN ======================= --}}
                    @elseif (Str::contains($deskripsi, ['phk', 'pemutusan kerja']))
                        PHK harus sesuai ketentuan UU Ketenagakerjaan. Pekerja berhak atas pesangon, adukan ke Disnaker jika terjadi pelanggaran.
                    
                    @elseif (Str::contains($deskripsi, ['upah', 'gaji']))
                        Kasus gaji termasuk hukum ketenagakerjaan. Jika tidak dibayarkan, laporkan ke Disnaker setempat.
                    
                    @elseif (Str::contains($deskripsi, ['lembur']))
                        Kasus lembur termasuk ketenagakerjaan. Pekerja berhak atas upah lembur sesuai aturan UU.
                    
                    @elseif (Str::contains($deskripsi, ['pesangon']))
                        Jika pesangon tidak diberikan saat PHK, pekerja dapat menuntut melalui Pengadilan Hubungan Industrial.
                    
                    @elseif (Str::contains($deskripsi, ['bpjs']))
                        Perusahaan wajib mendaftarkan pekerja ke BPJS Kesehatan dan Ketenagakerjaan.
                    
                    @elseif (Str::contains($deskripsi, ['cuti']))
                        Kasus cuti termasuk hukum ketenagakerjaan. Pekerja berhak mendapatkan cuti sesuai aturan UU.
                    
                    @elseif (Str::contains($deskripsi, ['serikat pekerja']))
                        Pekerja berhak membentuk atau bergabung dalam serikat pekerja sesuai dengan UU.
                    
                    {{-- ======================= DEFAULT ======================= --}}
                    @else
                        Silakan konsultasi langsung ke petugas untuk mendapatkan bantuan lebih lanjut.
                    @endif
                    
                        @endif
                        </td>
                       
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    window.print();
</script>