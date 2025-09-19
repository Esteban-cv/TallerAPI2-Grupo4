<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - TodoApp</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid vh-100">
        <div class="row h-100">
            <!-- Panel izquierdo con imagen/branding -->
            <div class="col-lg-6 d-none d-lg-flex bg-primary bg-gradient align-items-center justify-content-center position-relative">
                <div class="text-center text-white p-5">
                    <div class="mb-4">
                        <i class="fas fa-tasks fa-5x opacity-75"></i>
                    </div>
                    <h2 class="fw-bold mb-3">Organiza tu día</h2>
                    <p class="lead mb-4">Gestiona tus tareas de manera eficiente y mantén el control de tus proyectos</p>
                    <div class="d-flex justify-content-center gap-4 text-white-50">
                        <div class="text-center">
                            <i class="fas fa-check-circle fa-2x mb-2"></i>
                            <p class="small">Tareas completadas</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-clock fa-2x mb-2"></i>
                            <p class="small">Recordatorios</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-users fa-2x mb-2"></i>
                            <p class="small">Colaboración</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel derecho con formulario -->
            <div class="col-lg-6 d-flex align-items-center">
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6">
                            <!-- Header -->
                            <div class="text-center mb-5">
                                <div class="mb-3">
                                    <i class="fas fa-clipboard-list text-primary fa-3x"></i>
                                </div>
                                <h1 class="h3 text-dark fw-bold mb-2">Bienvenido de vuelta</h1>
                                <p class="text-muted">Ingresa a tu cuenta para continuar</p>
                            </div>

                            <!-- Formulario de login -->
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <form action="{{ route('auth.login') }}" method="POST">
                                        @csrf
                                        
                                        <!-- Email -->
                                        <div class="mb-4">
                                            <label for="email" class="form-label text-dark fw-medium">
                                                <i class="fas fa-envelope text-primary me-2"></i>Correo electrónico
                                            </label>
                                            <input type="email" 
                                                   name="email" 
                                                   id="email" 
                                                   class="form-control form-control-lg border-light" 
                                                   placeholder="tu@email.com"
                                                   value="{{ old('email') }}"
                                                   required>
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-4">
                                            <label for="password" class="form-label text-dark fw-medium">
                                                <i class="fas fa-lock text-primary me-2"></i>Contraseña
                                            </label>
                                            <input type="password" 
                                                   name="password" 
                                                   id="password" 
                                                   class="form-control form-control-lg border-light" 
                                                   placeholder="••••••••"
                                                   required>
                                        </div>

                                        <!-- Remember me -->
                                        <div class="mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                                <label class="form-check-label text-muted" for="remember">
                                                    Recordar sesión
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Login button -->
                                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-medium mb-3">
                                            <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                                        </button>
                                    </form>
                                </div>
                            </div>

                            <!-- Footer links -->
                            <div class="text-center mt-4">
                                <p class="text-muted mb-2">¿No tienes una cuenta?</p>
                                <a href="{{ route('auth.register') }}" class="btn btn-outline-primary fw-medium">
                                    <i class="fas fa-user-plus me-2"></i>Crear cuenta nueva
                                </a>
                            </div>

                            <!-- Forgot password link -->
                            <div class="text-center mt-3">
                                <a href="#" class="text-muted text-decoration-none small">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>