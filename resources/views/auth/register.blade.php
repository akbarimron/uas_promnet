<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - GYM UPI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        :root {
            --primary: #B63333;
            --secondary: #181A1F;
        }
        body {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .register-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            max-width: 500px;
            width: 100%;
            padding: 40px;
        }
        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .register-header h1 {
            color: var(--primary);
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 10px;
        }
        .register-header p {
            color: #666;
            font-size: 14px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-label {
            color: var(--secondary);
            font-weight: 600;
            margin-bottom: 6px;
            display: block;
            font-size: 14px;
        }
        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            padding: 10px 12px;
            font-size: 14px;
            transition: all 0.3s;
        }
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.2rem rgba(182, 51, 51, 0.25);
        }
        .btn-register {
            background-color: var(--primary);
            border: none;
            color: white;
            font-weight: 600;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s;
            margin-top: 10px;
        }
        .btn-register:hover {
            background-color: #a02a2a;
            transform: scale(1.02);
        }
        .login-link {
            text-align: center;
            margin-top: 20px;
        }
        .login-link a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
        .alert {
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .row-2col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }
        @media (max-width: 576px) {
            .row-2col {
                grid-template-columns: 1fr;
            }
        }

         .divider {
            text-align: center;
            margin: 25px 0;
            position: relative;
        }
        .divider::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #e0e0e0;
        }
        .divider span {
            background: white;
            padding: 0 10px;
            position: relative;
            color: #999;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="register-header">
            <h1><i class="fas fa-dumbbell"></i> GYM UPI</h1>
            <p>Buat akun baru</p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong>
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf
            
            <div class="form-group">
                <label class="form-label" for="nama">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="role">Tipe Pengunjung</label>
                <select class="form-control @error('role') is-invalid @enderror" id="role" name="role" required onchange="toggleNim()">
                    <option value="">Pilih tipe</option>
                    <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa UPI</option>
                    <option value="umum" {{ old('role') == 'umum' ? 'selected' : '' }}>Umum</option>
                </select>
            </div>

            <div class="form-group" id="nim-group" style="display: none;">
                <label class="form-label" for="nim">NIM</label>
                <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ old('nim') }}" placeholder="Masukkan NIM">
            </div>

            <div class="row-2col">
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Min 8 karakter" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password" required>
                </div>
            </div>

            <button type="submit" class="btn btn-register">
                <i class="fas fa-user-plus me-2"></i> Daftar
            </button>
        </form>

         <div class="divider">
            <span>atau</span>
        </div>

        <div class="login-link">
            <p>Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>

        <div class="login-link">
            <p><a href="{{ route('home') }}">Kembali ke menu awal</a></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleNim() {
            const role = document.getElementById('role').value;
            const nimGroup = document.getElementById('nim-group');
            if (role === 'mahasiswa') {
                nimGroup.style.display = 'block';
                document.getElementById('nim').required = true;
            } else {
                nimGroup.style.display = 'none';
                document.getElementById('nim').required = false;
            }
        }
        // Trigger on page load if role is already selected
        window.addEventListener('load', toggleNim);
    </script>
</body>
</html>
