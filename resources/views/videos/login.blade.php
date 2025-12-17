<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Balabala</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #000000;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            border: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            border-radius: 15px 15px 15px 15px;
        }
        .card-header {
            background-color: #5a1616;
            color: white;
            text-align: center;
            border-radius: 20px 20px 0 0;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="card login-card">
        <div class="card-header">
            <h4 class="mb-0">Masuk Website</h4>
        </div>
        <div class="card-body p-4">
            
            <!-- Notifikasi Error Jika Gagal Login -->
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Gagal Masuk!</strong>
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form Mengarah ke Route 'login.proses' -->
            <form action="{{ route('login.post') }}" method="POST">
                @csrf <!-- Token Keamanan Wajib -->

                <div class="mb-3">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" 
                           class="form-control" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           placeholder="admin@contoh.com"
                           required 
                           autofocus>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" 
                           class="form-control" 
                           id="password" 
                           name="password" 
                           placeholder="Masukkan password"
                           required>
                </div>

                <div class="d-grid gap-2 mt-4" style="background-color: #5a1616; border-radius: 10px;">
                    <button type="submit" class="btn btn-primary btn-lg" style="background-color: #5a1616; border-color: #5a1616; border-radius: 10px;">Login</button>
                </div>
            </form>
        <div class='mt-3' >
    <a href="{{route('register')}}">Register</a>
    </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>