<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .login-card {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            background-color: #ffffff;
        }

        .card-header {
            background-color: #f05340;
            /* Laravel Red */
            color: white;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            text-align: center;
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
        }

        .btn-primary {
            border-radius: 8px;
            background-color: #f05340;
            /* Laravel Red */
            border: none;
        }

        .btn-primary:hover {
            background-color: #d94734;
            /* Darker Laravel Red */
        }

        .card-footer {
            background-color: transparent;
            text-align: center;
            padding-bottom: 1rem;
        }

        .small-text {
            color: #6c757d;
        }

        a {
            color: #f05340;
            /* Laravel Red */
            text-decoration: none;
        }

        a:hover {
            color: #d94734;
            /* Darker Laravel Red */
        }

        .notification {
            background-color: #28a745;
            /* Hijau untuk sukses */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            z-index: 1000;
            opacity: 1;
            transition: opacity 3s ease-in-out;
            animation: fadeOut 3s forwards;
            /* Animasi untuk menghilangkan notifikasi */
        }

        .error-message {
            background-color: #dc3545;
            /* Merah */
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            text-align: center;
        }

        @keyframes fadeOut {
            0% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card login-card">
                    <div class="card-header">
                        <h3>Welcome Back</h3>
                        <p>Please login to your account</p>
                    </div>
                    <div class="card-body">

                        <!-- Menampilkan error global jika ada -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Notifikasi sukses -->
                        @if (session('success'))
                            <div class="notification">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Notifikasi error -->
                        @if (session('error'))
                            <div class="error-message">
                                {{ session('error') }}
                            </div>
                        @endif

                        <!-- Form login -->
                        <form action="/auth/login" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Enter your username" required>
                                @error('username')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Enter your password" required>
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <p class="small-text">Don't have an account? <a href="{{ route('auth.register') }}">Sign up</a></p>
                        <p class="small-text">Forgot your password? <a href="{{ route('auth.forgot') }}">Reset it here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
