<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Calendar SANTIK</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon -->
    <link rel="icon" href="{{ asset('assets/images/santik-logo.png') }}" type="image/png">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #1e69de;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
        }

        .login-container {
            background: linear-gradient(135deg, #1e69de, #6db3f2);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            color: white;
            z-index: 1;
            position: relative;
        }

        .login-container h2 {
            margin-bottom: 30px;
            font-weight: bold;
            text-align: center;
            color: white;
        }

        .form-control {
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.2);
            color: white;
            border: 1px solid white;
        }

        .form-control::placeholder {
            color: #ffffffcc;
        }

        .btn-primary {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            background-color: #004085;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary:hover {
            background-color: #002753;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }

        .form-label {
            color: white;
        }

        .password-toggle {
            position: relative;
        }

        .password-toggle .toggle-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            color: white;
        }

        .snowflake {
            position: absolute;
            top: -10px;
            color: white;
            font-size: 1.2rem;
            animation: fall 10s linear infinite;
            z-index: 0;
        }

        @keyframes fall {
            0% {
                top: -10px;
                transform: translateX(0);
            }

            100% {
                top: 100vh;
                transform: translateX(100px);
            }
        }

        /* Salju animasi */
        .snowflake:nth-child(odd) {
            animation-duration: 8s;
            font-size: 1.5rem;
        }

        .snowflake:nth-child(even) {
            animation-duration: 12s;
            font-size: 0.8rem;
        }
    </style>
</head>

<body>
    <!-- Salju animasi -->
    <div class="snowflake">❄️</div>
    <div class="snowflake">❅</div>
    <div class="snowflake">❆</div>
    <div class="snowflake">❄️</div>
    <div class="snowflake">❅</div>
    <div class="snowflake">❆</div>

    <div class="login-container">
        <h2>Login</h2>

        <!-- Form login -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email"
                    required>
            </div>

            <div class="mb-3 password-toggle">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                    placeholder="Enter your password" required>
                <i class="fa fa-eye toggle-icon" id="togglePassword"></i>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script untuk toggle visibility password -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        // Generate salju secara acak
        const snowflakes = document.querySelectorAll('.snowflake');
        snowflakes.forEach(snowflake => {
            snowflake.style.left = `${Math.random() * window.innerWidth}px`;
            snowflake.style.animationDuration = `${Math.random() * 5 + 5}s`;
        });
    </script>

    <!-- Font Awesome untuk icon -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>
