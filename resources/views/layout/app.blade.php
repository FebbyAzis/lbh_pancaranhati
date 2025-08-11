@php

use App\Models\Users;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

$user = Auth::user();


@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Voler Admin Dashboard</title>
    
   <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    
    <link rel="stylesheet" href="{{asset('vendors/chartjs/Chart.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/simple-datatables/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <link rel="stylesheet" href="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.svg') }}" type="image/x-icon">
</head>
<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <img src="{{ asset('images/logo.svg') }}" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            
            
                <li class='sidebar-title'>Home</li>
            
            @if ($user->role == 'users')
                                <li class="sidebar-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                    <a href="{{url('/dashboard')}}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>
                    
                </li>

                <li class='sidebar-title'>Main Menu</li>
                
                <li class="sidebar-item  has-sub {{ request()->is('ajukan-konsultasi*') ? 'active' : '' }} {{ request()->is('riwayat-layanan-konsultasi*') ? 'active' : '' }} {{ request()->is('detail-riwayat-layanan-konsultasi*') ? 'active' : '' }} {{ request()->is('bookmark-konsultasi*') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="triangle" width="20"></i> 
                        <span>Konsultasi Hukum</span>
                    </a>
                    
                    <ul class="submenu ">
                        
                        <li>
                            <a href="{{url('/ajukan-konsultasi')}}">Ajukan Konsultasi</a>
                        </li>
                        
                        <li>
                            <a href="{{url('/riwayat-layanan')}}">Riwayat Layanan</a>
                        </li>
                        
                        <li>
                            <a href="{{url('/bookmark-konsultasi')}}">Bookmark Konsultasi</a>
                        </li>
                    </ul>
                    
                </li>

                                <li class="sidebar-item  has-sub {{ request()->is('ajukan-pendampingan*') ? 'active' : '' }} {{ request()->is('riwayat-layanan-pendampingan*') ? 'active' : '' }} {{ request()->is('detail-riwayat-layanan-pendampingan*') ? 'active' : '' }} {{ request()->is('jadwal-pendampingan*') ? 'active' : '' }}">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="triangle" width="20"></i> 
                        <span>Layanan Hukum</span>
                    </a>
                    
                    <ul class="submenu">
                        
                        <li>
                            <a href="{{url('/ajukan-pendampingan')}}">Ajukan Pendampingan</a>
                        </li>
                        
                        <li>
                            <a href="{{url('/riwayat-layanan-pendampingan')}}">Riwayat Layanan</a>
                        </li>
                        
                        <li>
                            <a href="{{url('/jadwal-pendampingan')}}">Jadwal Pendampingan</a>
                        </li>
                    </ul>
                    
                </li>
            
                <li class="sidebar-item  {{ request()->is('dokumen-hukum*') ? 'active' : '' }}">
                    <a href="{{url('/dokumen-hukum')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Dokumen Hukum</span>
                    </a>
                    
                </li>

                <li class="sidebar-item  {{ request()->is('kalender-jadwal*') ? 'active' : '' }}">
                    <a href="{{url('/kalender-jadwal')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Kalender Jadwal</span>
                    </a>
                    
                </li>
            
            @else
                                          <li class="sidebar-item {{ request()->is('dashboard-admin*') ? 'active' : '' }}">
                    <a href="{{url('/dashboard-admin')}}" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>
                    
                </li>
            
                <li class="sidebar-item  {{ request()->is('konsultasi-masuk*') ? 'active' : '' }}">
                    <a href="{{url('/konsultasi-masuk')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Konsultasi Masuk</span>
                    </a>
                    
                </li>

                <li class="sidebar-item  {{ request()->is('jawaban-otomatis*') ? 'active' : '' }}">
                    <a href="{{url('/jawaban-otomatis')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Jawaban Otomatis</span>
                    </a>
                    
                </li>

                <li class="sidebar-item  {{ request()->is('pengajuan-layanan-hukum*') ? 'active' : '' }} {{ request()->is('detail-pengajuan-layanan-hukum*') ? 'active' : '' }}">
                    <a href="{{url('/pengajuan-layanan-hukum')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Pengajuan Layanan Hukum</span>
                    </a>
                    
                </li>

                <li class="sidebar-item  {{ request()->is('kelola-jadwal-pendampingan*') ? 'active' : '' }}">
                    <a href="{{url('/kelola-jadwal-pendampingan')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Jadwal & Kalender Pendampingan</span>
                    </a>
                    
                </li>

                <li class="sidebar-item  {{ request()->is('dokumen-dan-surat-kuasa*') ? 'active' : '' }}">
                    <a href="{{url('/dokumen-dan-surat-kuasa')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Dokumen & Surat Kuasa</span>
                    </a>
                    
                </li>

                <li class="sidebar-item  {{ request()->is('manajemen-user*') ? 'active' : '' }}">
                    <a href="{{url('/manajemen-user')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Manajemen User</span>
                    </a>
                    
                </li>

                <li class="sidebar-item  {{ request()->is('statistik-dan-laporan*') ? 'active' : '' }}">
                    <a href="{{url('/statistik-dan-laporan')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Statistik & Laporan</span>
                    </a>
                    
                </li>

                <li class="sidebar-item  {{ request()->is('pengaturan akun*') ? 'active' : '' }}">
                    <a href="{{url('/pengaturan-akun')}}" class='sidebar-link'>
                        <i data-feather="layout" width="20"></i> 
                        <span>Pengaturan Akun</span>
                    </a>
                    
                </li>
            
                <br>
                <br>
                <br>
            @endif
            

            
         
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown nav-icon">
                            <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="bell"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success mr-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        <div>
                                            <h6 class='text-bold'>New Order</h6>
                                            <p class='text-xs'>
                                                An order made by Ahmad Saugi for product Samsung Galaxy S69
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="dropdown nav-icon mr-2">
                            <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-lg-inline-block">
                                    <i data-feather="mail"></i>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <img src="{{ asset('images/avatar/avatar-s-1.png') }}" alt="" srcset="">
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block">Hi, {{AUTH::user()->first_name}} {{AUTH::user()->last_name}}</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                                <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                                <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                                <div class="dropdown-divider"></div>
                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal"><i data-feather="log-out"></i> Logout</button>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
    <form  action="{{ route('logout') }}" method="POST">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Keluar</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Apakah kamu yakin ingin keluar?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            <button type="submit" class="btn btn-primary">Ya</button>
          </div>
        </div>
      </div>
    </div>
</form>
            @yield('content')

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-left">
                        <p>2020 &copy; Voler</p>
                    </div>
                    <div class="float-right">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="http://ahmadsaugi.com">Ahmad Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>

      <script src="{{asset('js/feather-icons/feather.min.js')}}"></script>
    <script src="{{asset('vendors/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
    
    <script src="{{asset('vendors/chartjs/Chart.min.js')}}"></script>
    <script src="{{asset('vendors/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('js/pages/dashboard.js')}}"></script>
    <script src="{{asset('vendors/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('js/vendors.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>
