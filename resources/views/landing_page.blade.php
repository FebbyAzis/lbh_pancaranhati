@php

use App\Models\Users;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

$user = Auth::user();


@endphp
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>LBH Pancaran Hati</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset ('photos/icon.jpg') }}" rel="icon">
  <link href="{{ asset ('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  <!-- Vendor CSS Files -->
  <link href="{{ asset ('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset ('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset ('assets/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Dewi
  * Template URL: https://bootstrapmade.com/dewi-free-multi-purpose-html-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        {{-- <img src="{{ asset ('photos/icon.jpg') }}" alt=""> --}}
        <h1 class="sitename">LBH Pancaran Hati</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#tentang-lembaga">Tentang Lembaga</a></li>
          <li><a href="#layanan-kami">Layanan Kami</a></li>
          <li><a href="#kontak-dan-alamat">Kontak dan Alamat</a></li>
          <li><a href="#team">FAQ</a></li>
  
          @if ($user == null)
              
          @else
          <li class="dropdown"><a href="#"><span>{{$user->username}}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Profil</a></li>
              <li><center><a class="btn btn-sm btn-danger text-light m-3 text-center" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign Out</a></center></li>
            
            </ul>
          </li>
          @endif
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

        @if ($user == null)
            <a class="cta-btn" href="{{url('/login')}}">Sign In</a>
        @elseif ($user->role == 'users')
            <a class="cta-btn" href="{{url('/dashboard')}}">Dashboard</a>
        @else
            <a class="cta-btn" href="{{url('/dashboard-admin')}}">Dashboard</a>
        @endif

    </div>
  </header>
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
  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <img src="{{ asset ('photos/gambar1.jpg') }}" alt="" data-aos="fade-in" style="object-fit:cover;">

      <div class="container d-flex flex-column align-items-center">
        <h2 data-aos="fade-up" data-aos-delay="100">LBH PANCARAN HATI</h2>
        <p data-aos="fade-up" data-aos-delay="200">Temukan solusi masalah hukum dengan konsultasi dan pendampingan hukum.</p>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
          @if ($user == null)
              <a href="{{url('/login')}}" class="btn-get-started">Konsultasi Sekarang</a>
          @elseif($user->role == 'admin')
          <a href="{{url('/dashboard-admin')}}" class="btn-get-started">Dashboard</a>
          @elseif($user->role == 'users')
          <a href="{{url('/ajukan-konsultasi')}}" class="btn-get-started">Konsultasi Sekarang</a>
          @endif
          
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="tentang-lembaga" class="about section">

      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <h3>Tentang Lembaga</h3>
            <img src="{{ asset ('photos/gambar3.jpg') }}" class="img-fluid rounded-4 mb-4" alt="">
            <p>Lembaga Bantuan Hukum Pancaran Hati Cirebon adalah sebuah
lembaga bantuan hukum yang berdiri sejak 14 Mei 2013 yang di buat oleh
Notaris Solichin, SH., M.KN dan disahkan oleh Menteri Hukum Dan Hak
Asasi Manusia dengan Nomor AHU-00096.60.10.2014. Sebuah lembaga
yang memberikan pelayanan, konsultasi dan bantuan hukum kepada
masyarakat yang tidak mampu yang membutuhkan keadilan.</p>
            <p>Lembaga Bantuan Hukum Pancaran Hati memberikan bantuan
hukum bermula mula pada UU Advokat pada Pasal 1 angka 9 menyatakan
bantuan hukum adalah jasa hukum yang di berikan advokat secara cmacuma kepada klien yang tidak mampu. Penerima bantuan hukum dalam UU
Bantuan Hukum adalah orang atau kelompok miskin. Dengan adanya UU
Bantuan Hukum, pemberi bantuan hukum adalah lembaga bantuan hukum
atau organisasi kemasyarakatan yang memberi layanan bantuan hukum
yang memenuhi persyaratan.</p>
          </div>
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="250">
            <div class="content ps-0 ps-lg-5">
              <p>
                Kemudian pada kata Pancaran Hati yaitu agar tersentuh hatinya
membantu orang sedang berperkara, baik perkara perdata maupun perkara
pidana. Tujuannya adalah untuk tolong-menolong sesama makhluk. Tolong
menolong sangat dianjurkan dalam bermasyarakat dan bernegara.
              </p>
            
              <p>
               Lembaga Bantuan Hukum Pancaran Hati Cirebon juga bekerja sama
Lapas Kuningan terkait dengan pelayanan dan konsultasi hukum dalam
rangka meningkatkan pengetahuan Warga Binaan Pemasyarakatan (WBP)
Seperti binaan cukur rambut dan servis AC, tujuannnya adalah sebagai
bekal setelah keluar dari lapas. 
              </p>

              <div class="position-relative mt-4">
                <img src="{{ asset ('photos/gambar2.jpg') }}" class="img-fluid rounded-4" alt="">
               
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->



    <!-- Services Section -->
    <section id="layanan-kami" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Layanan Kami<br></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-5">

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="service-item">
              <div class="img">
                <img src="{{ asset ('assets/img/services-1.jpg') }}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="fa-solid fa-comments"></i>
                </div>
                
                  <h3>Konsultasi</h3>
           
                <p>Layanan konsultasi hukum dapat diakses oleh masyarakat secara langsung. Dalam sesi konsultasi ini, para pengacara yang tergabung dalam lembaga ini siap memberikan nasihat hukum yang diperlukan oleh masyarakat.

                </p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
            <div class="service-item">
              <div class="img">
                <img src="{{ asset ('assets/img/services-2.jpg') }}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="fa-solid fa-handshake"></i>
                </div>
              
                  <h3>Penyuluhan</h3>
               
                <p>Penyuluhan hukum dilakukan secara rutin di berbagai komunitas. Dalam penyuluhan ini, masyarakat diajarkan tentang hak-hak mereka, prosedur hukum yang berlaku, serta cara mengakses bantuan hukum.</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
            <div class="service-item">
              <div class="img">
                <img src="{{ asset ('assets/img/services-3.jpg') }}" class="img-fluid" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="fa-solid fa-calendar-days"></i>
                </div>
              
                  <h3>Kegiatan</h3>
              
                <p>Kegiatan advokasi meliputi penyusunan laporan penelitian, lokakarya, dan diskusi publik yang bertujuan untuk meningkatkan kesadaran akan isu-isu hukum yang dihadapi oleh masyarakat.
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->



    <!-- Contact Section -->
    <section id="kontak-dan-alamat" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Kontak dan Alamat</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <div class="col-lg-6 ">
            <div class="row gy-4">

              <div class="col-lg-12">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Kedawung, Kec. Kedawung, Kabupaten Cirebon, Jawa Barat, Indonesia</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>(+62)87839785107</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>lbhpancaranhatia9@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

            </div>
          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
              <div class="row gy-4">

                <div class="col-md-12">
                  <center>
                  <img src="{{asset('photos/WhatsApp.png')}}" width="40%" alt="">
                  </center>
                </div>
                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                  <a href="https://wa.me/6287839785107?text=Halo%2C%20saya%20tertarik%20dengan%20produk%20Anda."  target="blank">Send Message</a>
                  
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer dark-background">

    {{-- <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Dewi</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Marketing</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12 footer-newsletter">
          <h4>Our Newsletter</h4>
          <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
          <form action="forms/newsletter.php" method="post" class="php-email-form">
            <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your subscription request has been sent. Thank you!</div>
          </form>
        </div>

      </div>
    </div> --}}

    <div class="container copyright text-center mt-4">
       <span>Copyright &copy; LBH Pancaran Hati</span>&nbsp;<span id="tahun1"></span>
   
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>



  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  <script src="{{ asset ('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset ('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset ('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset ('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset ('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset ('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset ('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset ('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

 <script type="text/javascript">
        function updateClock() {
            const now = new Date();
document.getElementById('tahun1').textContent = now.getFullYear();
            document.getElementById('hari').textContent = now.toLocaleDateString(undefined, {
                weekday: 'long'
            });
            document.getElementById('tanggal').textContent = now.getDate();
            document.getElementById('bulan').textContent = now.toLocaleDateString(undefined, {
                month: 'long'
            });
            document.getElementById('tahun').textContent = now.getFullYear();
            
            document.getElementById('waktu').textContent = now.toLocaleTimeString();
        }

        // Update waktu setiap detik
        setInterval(updateClock, 1000);

        // Memastikan tampilan awal sudah terisi
        updateClock();
    </script>
  <!-- Main JS File -->
  <script src="{{ asset ('assets/js/main.js') }}"></script>

</body>

</html>