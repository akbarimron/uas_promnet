<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">GYM UPI Dashboard</span>
            <form action="{{ route('logout') }}" method="POST" class="d-flex">
            </form>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>Welcome, {{ Auth::user()->nama }}!</h1>
                <p class="text-muted">Email: {{ Auth::user()->email }}</p>
                <p class="text-muted">Role: <span class="badge bg-primary">{{ Auth::user()->role }}</span></p>
                
                <hr>
                
                <div class="card">
                    <div class="card-header">
                        <h5>Informasi Akun </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td><strong>Nama:</strong></td>
                                <td>{{ Auth::user()->nama }}</td>
                            </tr>
                            <tr>
                                <td><strong>Email:</strong></td>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <td><strong>NIM:</strong></td>
                                <td>{{ Auth::user()->nim ?? 'Tidak ada' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Role:</strong></td>
                                <td>{{ ucfirst(Auth::user()->role) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Bergabung:</strong></td>
                                <td>{{ Auth::user()->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a class="nav-link" href="/">
                                <i class="fas fa-arrow-left me-2"></i> Kembali ke Home
                </a>
            </div>
             
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Quick Actions</h5>
                    </div>
                    <div class="card-body">
                       
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
