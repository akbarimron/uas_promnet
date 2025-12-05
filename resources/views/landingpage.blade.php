<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym Universitas Pendidikan Indonesia</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" referrerpolicy="no-referrer" />
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <!-- AOS Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary: #B63333;
            --secondary: #181A1F;
            --accent: #b65856;
            --background_color: #f9fafb;
        }
        body { font-family: Montserrat, Arial, sans-serif; background-color: var(--background_color); color: var(--secondary); }
        .bg-primary-custom { background-color: var(--primary); }
        .bg-secondary-custom { background-color: var(--secondary); }
        .btn-primary-custom { background-color: var(--primary); border-color: var(--primary); color: #fff; transition: .3s; }
        .btn-primary-custom:hover { transform: scale(1.05); background-color: var(--accent); border-color: var(--primary); color: #fff; }
        .btn-primary-custom:focus { background-color: var(--primary); border-color: var(--primary); color: #fff; box-shadow: 0 0 0 0.50rem rgba(182, 51, 51, 0.25); }
        .navbar { background-color: var(--secondary); }
        .text-primary-custom { color: var(--primary); }
        .shadow-custom { box-shadow: 0 10px 15px -3px rgba(0,0,0,.1); }
        header { position: sticky; top: 0; z-index: 50; }
        .hero-section {
            background: linear-gradient(rgba(0,0,0,.55), rgba(0,0,0,.55)), url("{{ asset('storage/img/dummy.jpg') }}") center center / cover no-repeat;
            color: #fff; min-height: 100vh; display: flex; align-items: center; position: relative;
        }
        .hero-content { position: relative; z-index: 2; }
        .gradient-red { background: linear-gradient(135deg,#B63333 0%,#501616 100%); }
        .gradient-blue { background: linear-gradient(135deg,#3b82f6 0%,#1e40af 100%); }
        .gradient-green { background: linear-gradient(135deg,#10b981 0%,#047857 100%); }
        .gradient-purple { background: linear-gradient(135deg,#a855f7 0%,#7e22ce 100%); }
        .gradient-dark { background: linear-gradient(135deg,#374151 0%,#111827 100%); }
        .text-light-custom { transition: .3s; color: white; }
        .text-light-custom:hover { background-color: var(--primary); border-radius: 5px; }
       
        
        .health-motivation .content-wrapper { position:relative; z-index:2; }
        /* Fade In Animation */
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        .fade-in { animation: fadeInUp 0.8s ease-out; }
        [data-aos="fade-up"] { opacity: 0; }
        [data-aos="fade-up"].aos-animate { animation: fadeInUp 0.8s ease-out forwards; }
        
        /* Goals Card Styles */
        .goals-card {
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .goals-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(182, 51, 51, 0.2) !important;
        }
        .goals-card:hover .goals-img {
            transform: scale(1.1);
        }
        .goals-card:hover .goals-overlay {
            opacity: 0.8;
        }
        .goals-overlay {
            transition: opacity 0.3s ease;
            opacity: 0.6;
        }
        .goals-img {
            transition: transform 0.3s ease;
        }
    </style>
</head>
<body class="bg-light">
<header class="bg-secondary-custom shadow">
    <nav class="navbar navbar-expand-xl navbar-dark">
        <div class="container">
           <a class="nav-link text-light" href="{{ route('home') }}">
                <img src="{{ asset('storage/img/logo.png') }}" alt="Logo" class="img-fluid" style="max-height:54px;width:auto;">
           </a> 
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-auto tr" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-2 "><a class="nav-link text-light-custom " href="{{ route('gallery') }}">Gallery</a></li>
                    <li class="nav-item mx-2"><a class="nav-link text-light-custom" href="#" style="pointer-events: none; opacity: 0.6;">Personal Trainer</a></li>
                    <li class="nav-item mx-2"><a class="nav-link text-light-custom"  href="{{ route('store') }}">Store</a></li>
                    <li class="nav-item mx-2"><a class="nav-link text-light-custom" href="#" style="pointer-events: none; opacity: 0.6;">Terms and Condition</a></li>
                    
                </ul>
                @if(Auth::check())
                    <div class="dropdown ms-5">
                        <button class="btn btn-primary-custom dropdown-toggle fw-bold " type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-2"></i>{{ Auth::user()->nama }}
                        </button>
                        <ul class="dropdown-menu">
                            @if(Auth::user()->role === 'admin')
                                <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    <i class="fas fa-tachometer-alt me-2"></i>Admin Dashboard
                                </a></li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                    <i class="fas fa-home me-2"></i>Dashboard
                                </a></li>
                            @endif
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="dropdown-item p-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="{{ route('register') }}" class="btn btn-primary-custom ms-5 fw-bold">Pesan Sekarang</a>
                @endif
            </div>
        </div>
    </nav>
</header>
<main>
    {{-- Hero section --}}
    <section id="hero" class="hero-section">
        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-4">Mahasiswa Gak Cuma Harus Cerdas<br><span class="text-primary-custom">Tapi Juga Sehat</span></h1>
                    <p class="lead mb-4">Wujudkan tubuh ideal dan hidup sehat bersama UPIGYM Fitness Centre</p>
                    @if(!Auth::check())
                        <a href="{{ route('register') }}" class="btn btn-primary-custom btn-lg fw-bold">Mulai Sekarang</a>
                    @else
                        <a href="#about" class="btn btn-primary-custom btn-lg fw-bold">Jelajahi Lebih Lanjut</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- About Section --}}
    <section id="about" class="py-5 bg-white" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4">Gym Universitas Pendidikan Indonesia</h2>
                    <p class="fs-5 text-muted mb-3">GYMUPI adalah fasilitas olahraga modern yang dirancang khusus untuk mahasiswa UPI. Kami menyediakan peralatan gym berkualitas tinggi dan lingkungan yang mendukung untuk mencapai tujuan kebugaran Anda.</p>
                    <p class="fs-5 text-muted mb-3">Dengan instruktur berpengalaman dan program latihan yang terstruktur, kami siap membantu Anda membangun gaya hidup sehat sambil menjalani kehidupan kampus yang produktif.</p>
                </div>
                 <div class=" col-lg-6 position-relative overflow-hidden" style="height:400px;     ">
                            <img src="{{ asset('storage/img/landingpage/about.jpeg') }}" 
                                 class="img-fluid w-100 h-100 goals-img rounded-4 " 
                                 style="object-fit: cover;">
                 </div>
            </div>
        </div>
    </section>
    {{-- Pricing Section --}}
    <section id="pricing" class="py-5 gradient-red text-white" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="{{ asset('storage/img/landingpage/mahasiswaupi.jpeg') }}" alt="Pricing" class="img-fluid rounded-3 shadow-custom">
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <p class="fs-5 mb-1 opacity-90">Harga untuk umum: <span class="fw-bold bg-primary-custom p-1 rounded-2">Rp15.000/visit</span></p>
                    <h2 class="display-5 fw-bold mb-1">Khusus Mahasiswa UPI</h2>
                    <p class="display-5 fw-bold mb-5 bg-primary-custom p-2 rounded-2 shadow-custom">Rp5.000/Visit</p>
                    <button class="btn btn-light btn-lg fw-bold text-primary-custom">Lihat Galeri</button>
                </div>
            </div>
        </div>
    </section>
    {{-- Trainer Section --}}
    <section id="trainer" class="py-5 bg-secondary-custom text-white" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4">Personal Trainer Mulai Rp50.000</h2>
                    <p class="fs-5 text-light mb-4">Coba ngegym dengan bimbingan ahli yang berpengalaman. Dapatkan program latihan yang disesuaikan dengan kebutuhan dan tujuan fitness Anda.</p>
                    <button class="btn btn-primary-custom btn-lg fw-bold">Lihat Personal Trainer</button>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('storage/img/landingpage/personaltrainer.jpeg') }}" alt="Trainer" class="img-fluid rounded-3 shadow-custom">
                </div>
            </div>
        </div>
    </section>
    {{-- goals section --}}
    <section id="goals" class="py-5 bg-light" data-aos="fade-up">
        <div class="container">
            <h2 class="display-5 fw-bold text-center mb-5 text-dark">Tentukan Goals Mu</h2>
            <div class="row g-4 justify-content-center">
            @forelse($goals as $goal)
                <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-custom rounded-4 h-100 overflow-hidden goals-card">
                        <!-- Image Container dengan Fixed Height -->
                        <div class="position-relative overflow-hidden" style="height: 200px; background-color: #f0f0f0;">
                            <img src="{{ asset($goal['image']) }}" 
                                 alt="{{ $goal['title'] }}" 
                                 class="img-fluid w-100 h-100 goals-img" 
                                 style="object-fit: cover;">
                        </div>
                        
                        <!-- Card Body -->
                        <div class="card-body p-4 d-flex flex-column">
                            <div class="mb-3">
                                <i class="{{ $goal['icon'] }} fa-2x text-primary-custom"></i>
                            </div>
                            <h5 class="fs-5 fw-bold mb-2 text-dark">{{ $goal['title'] }}</h5>
                            <p class="fs-6 text-muted flex-grow-1">{{ $goal['description'] ?? 'Capai goals fitness Anda bersama kami' }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-muted">Belum ada goals tersedia. tes</p>
            @endforelse
            </div>
        </div>
    </section>
    {{-- motivation section --}}
    <section id="health" class="py-5 text-center health-motivation" data-aos="fade-up">
        <div class="container content-wrapper">
            <h2 class="display-5 fw-bold mb-4">Tentukan Hidup Sehat</h2>
            <p class="fs-5 mx-auto" style="max-width:60rem;">Kesehatan adalah investasi terbaik untuk masa depan. Mulai perjalanan fitness Anda hari ini dan rasakan perubahan positif dalam hidup Anda. Dengan dedikasi dan konsistensi, tubuh ideal dan hidup sehat bukan lagi impian.</p>
        </div>
    </section>
    <!-- CTA Section -->
    <section class="py-5 bg-light" data-aos="fade-up">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="gradient-red rounded-3 p-5 text-white shadow-custom">
                        <h3 class="fs-4 fw-bold mb-3"><i class="fa-solid fa-user-tie me-2"></i>Ragu Buat Latihan Sendiri?</h3>
                        <p class="fs-6 mb-4 opacity-90">Coba ngegym dengan personal trainer profesional kami yang berpengalaman</p>
                        <button class="btn btn-light fw-semibold"><i class="fa-solid fa-arrow-right me-2"></i>Lihat Personal Trainer</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-secondary-custom rounded-3 p-5 text-white shadow-custom">
                        <h3 class="fs-4 fw-bold mb-3"><i class="fa-solid fa-question-circle me-2"></i>Ingin Tahu Lebih Banyak?</h3>
                        <p class="fs-6 mb-4 opacity-90">Tentang GYM UPI - Hubungi kami untuk informasi lebih lengkap</p>
                        <button class="btn btn-primary-custom fw-semibold"><i class="fa-solid fa-phone me-2"></i>Hubungi Kami</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section -->
    <section id="faq" class="py-5 bg-white" data-aos="fade-up">
        <div class="container">
            <h2 class="display-5 fw-bold text-center mb-5 text-dark">Frequently Asked Questions</h2>
            <div class="mx-auto" style="max-width:45rem;">
                <div class="accordion" id="faqAccordion">
                   @forelse($faqs as $key => $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button {{ $key !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $faq['id'] }}">
                                <i class="{{ $faq['icon'] }} me-2 text-primary-custom"></i>{{ $faq['question'] }}
                            </button>
                        </h2>
                        <div id="faq{{ $faq['id'] }}" class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">{{ $faq['answer'] }}</div>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-muted">Belum ada FAQ tersedia.</p>
                    @endforelse
                </div>
            </div>
            <div class="text-center mt-5">
                <h3 class="fs-4 fw-semibold mb-3 text-dark">Gak Nemu Jawaban?</h3>
                <p class="text-muted mb-4">Tim support kami siap membantu Anda 24/7</p>
                <button class="btn btn-primary-custom btn-lg"><i class="fa-solid fa-comments me-2"></i>Hubungi Kami Sekarang</button>
            </div>
        </div>
    </section>
    <!-- Contact Form Section -->
    <section id="contact" class="py-5 gradient-dark text-white" data-aos="fade-up">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4">Hubungi kami</h2>
                    <p class="fs-5 text-light">Dapatkan informasi terbaru tentang program latihan, tips kesehatan, dan promo spesial langsung ke email Anda. Jangan lewatkan kesempatan untuk menjadi bagian dari komunitas GYMUPI yang terus berkembang.</p>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light bg-opacity-10 rounded-3 p-5" style="backdrop-filter:blur(10px);">
                        <form class="d-flex flex-column gap-3">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg text-white" placeholder="Nama Depan" style="background-color:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.2);color:#fff;">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control form-control-lg text-white" placeholder="Nama Belakang" style="background-color:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.2);color:#fff;">
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <input type="email" class="form-control form-control-lg text-white" placeholder="Email" style="background-color:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.2);color:#fff;">
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control form-control-lg text-white" placeholder="Nomor Telepon" style="background-color:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.2);color:#fff;">
                                </div>
                            </div>
                            <textarea class="form-control form-control-lg text-white" placeholder="Pesan (Opsional)" rows="4" style="background-color:rgba(255,255,255,0.1);border-color:rgba(255,255,255,0.2);color:#fff;"></textarea>
                            <button type="submit" class="btn btn-primary-custom btn-lg fw-semibold">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<!-- Footer -->
<footer class="bg-secondary-custom text-white">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <h5 class="fw-bold mb-3">About UPI GYM</h5>
                <p class="small text-secondary">Fasilitas gym modern untuk mahasiswa UPI yang ingin hidup sehat dan bugar.</p>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="fw-bold mb-3">Quick Links</h5>
                <ul class="list-unstyled small">
                    <li><a href="#about" class="text-secondary text-decoration-none">About</a></li>
                    <li><a href="#pricing" class="text-secondary text-decoration-none">Pricing</a></li>
                    <li><a href="#trainer" class="text-secondary text-decoration-none">Trainer</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="fw-bold mb-3">Services</h5>
                <ul class="list-unstyled small">
                    <li><a href="#" class="text-secondary text-decoration-none">Personal Training</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Group Class</a></li>
                    <li><a href="#" class="text-secondary text-decoration-none">Nutrition Plan</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3">
                <h5 class="fw-bold mb-3">Contact</h5>
                <ul class="list-unstyled small text-secondary">
                    <li>Email: info@gymupi.ac.id</li>
                    <li>Phone: (022) 1234-5678</li>
                    <li>Location: UPI Bandung</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="border-top border-secondary">
        <div class="container py-3">
            <p class="text-center small text-secondary mb-0">© 2025 GYMUPI - Muhamad Akbar Imron. All Rights Reserved.</p>
        </div>
    </div>
</footer>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS Library -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        easing: 'ease-out',
        offset: 100,
        delay: 200,
        once: true
    });
</script>
</body>
</html>
