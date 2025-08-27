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
            <h1 class>LBH Pancaran Hati</h1>
          <h2>Laporan Jadwal Pendampingan</h2>
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
                        <th>Judul Permohonan</th>
                        <th>Tanggal Permintaan</th>
                        <th>Kategori</th>
                        <th>Detail Kasus</th>
                        <th>Lokasi Pendampingan</th>
                        <th>Urgensi</th>
                        <th>Kontak Aktif</th>
                        <th>Status</th>
                        <th>Catatan</th>
                     
                    </tr>
                </thead>
                <tbody>
                    @foreach ($p as $no=>$item)
                    <tr>
                        <td>{{$no+1}}</td>
                        <td>{{$item->judul_permohonan}}</td>
                        <td>{{ date('d/M/Y', strtotime($item->tanggal_permintaan)) }}</td>
                        <td>{{$item->kategori_masalah}}</td>
                        <td>{{$item->detail_kasus}}</td>
                        <td>{{$item->lokasi_pendampingan}}</td>
                        <td>{{$item->urgensi}}</td>
                        <td>{{$item->kontak_aktif}}</td>
                       <td>
                        @if ($item->status == 1)
                        Menunggu Persetujuan
                    @elseif($item->status == 2)
                        Diterima
                    @else
                        Ditolak
                    @endif
                       </td>
                        <td>{{$item->catatan}}</td>
                        
                        
                       
                       
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