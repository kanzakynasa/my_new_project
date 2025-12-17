<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body class="bg-black">

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh; padding: 0">
        <div class="card shadow" style="width: 40vh; border-radius:  25px 25px 15px 15px; border: none;">
            <div class ="card-header mb-4" style="background-color: #5a1616; border-radius: 20px 20px 0 0; text-align: center; 
            color: white; width:100%; padding: 15px; border-color: #5a1616;  border-width: 5px; border-style: solid;">
                <h4 class="mb-0">Register Website</h4>
            </div>
            {{-- <h3 class="text-center mb-3">Register</h3> --}}

            <!-- Success Message -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $item)
                            <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div style="width: 80%; margin-left: auto; margin-right: auto;">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <button class="btn btn-primary w-100" type="submit" style="background-color: #5a1616">Register</button>
                </div>
            </form>

            <div class="mt-3 text-center" style="padding-bottom:20px">
                    <a href="{{ route('login') }}">Login</a>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
