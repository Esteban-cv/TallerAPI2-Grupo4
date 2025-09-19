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
                                    <form action="{{ url('login') }}" method="POST">
                                        @csrf
                                        
                                        <!-- Email -->
                                        <div class="mb-4">
                                            <label for="username" class="form-label text-dark fw-medium">
                                                <i class="fas fa-envelope text-primary me-2"></i>Nombre de usuario
                                            </label>
                                            <input type="username" 
                                                   name="username" 
                                                   id="username" 
                                                   class="form-control form-control-lg border-light" 
                                                   placeholder="emilys"
                                                   value="{{ old('username') }}"
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
                                                   placeholder="emilyspass"
                                                   required>
                                        </div>

                                        <!-- Login button -->
                                        <button type="submit" class="btn btn-primary btn-lg w-100 fw-medium mb-3">
                                            <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
                                        </button>
                                    </form>
                                </div>
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