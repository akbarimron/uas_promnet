<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GYM UPI')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #B63333;
            --secondary: #181A1F;
        }
        body { font-family: 'Montserrat', sans-serif; }
        .navbar { background-color: var(--secondary) !important; }
        .sidebar { min-height: 100vh; background-color: #f8f9fa; padding-top: 20px; }
        .sidebar .nav-link { color: #333; transition: 0.3s; }
        .sidebar .nav-link:hover { color: var(--primary); background-color: #e9ecef; padding-left: 1.5rem; }
        .sidebar .nav-link.active { color: var(--primary); border-left: 3px solid var(--primary); }
        main { background-color: #ffffff; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark sticky-top shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">
                <i class="fas fa-dumbbell me-2"></i> GYM UPI
            </a>
            <div class="d-flex align-items-center gap-3">
                <span class="text-white small">{{ Auth::user()->nama ?? 'Guest' }}</span>
                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row g-0">
            <!-- Sidebar -->
            <nav class="col-md-2 d-md-block sidebar">
                <div class="sticky-top">
                    <ul class="nav flex-column">
                        @if(Auth::user() && Auth::user()->role === 'admin')
    
                            <li class="nav-item mb-2">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                                    <i></i> Admin dashboard
                                </a>
                            </li>
                        @endif
                    </ul>
                    <hr>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Home
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <div class="mb-4">
                    <h1 class="display-5 fw-bold">Admin Dashboard</h1>
                    <p class="text-muted">Selamat datang, {{ Auth::user()->nama }}</p>
                </div>

                <div class="row mt-4 g-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-question-circle me-2 text-primary"></i> Kelola FAQ
                                </h5>
                                <p class="card-text text-muted">Tambah, edit, atau hapus pertanyaan yang sering diajukan</p>
                                <button class="btn btn-secondary btn-sm" disabled>Coming Soon</button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="fas fa-chart-bar me-2 text-primary"></i> Statistik
                                </h5>
                                <p class="card-text text-muted">Lihat statistik sistem GYM UPI</p>
                                <button class="btn btn-secondary btn-sm" disabled>Coming Soon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>



