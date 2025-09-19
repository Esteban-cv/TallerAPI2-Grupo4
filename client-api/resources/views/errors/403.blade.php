<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>403 - Acceso Denegado | TodoApp</title>
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
            <!-- Panel izquierdo con ilustración -->
            <div class="col-lg-6 d-none d-lg-flex bg-primary bg-gradient align-items-center justify-content-center position-relative">
                <div class="text-center text-white p-5">
                    <div class="mb-4">
                        <i class="fas fa-shield-alt fa-5x opacity-75"></i>
                    </div>
                    <h2 class="fw-bold mb-3">Área Protegida</h2>
                    <p class="lead mb-4">Esta sección requiere permisos especiales para acceder</p>
                    <div class="d-flex justify-content-center gap-4 text-white-50">
                        <div class="text-center">
                            <i class="fas fa-user-shield fa-2x mb-2"></i>
                            <p class="small">Seguridad</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-key fa-2x mb-2"></i>
                            <p class="small">Autorización</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-lock fa-2x mb-2"></i>
                            <p class="small">Protección</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Panel derecho con mensaje de error -->
            <div class="col-lg-6 d-flex align-items-center">
                <div class="container py-5">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-8">
                            <!-- Header -->
                            <div class="text-center mb-5">
                                <div class="mb-3">
                                    <i class="fas fa-ban text-danger fa-4x"></i>
                                </div>
                                <h1 class="display-1 fw-bold text-primary mb-0">403</h1>
                                <h2 class="h3 text-dark fw-bold mb-2">Acceso Denegado</h2>
                                <p class="text-muted lead">No tienes permisos para acceder a esta página</p>
                            </div>

                            <!-- Mensaje explicativo -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body p-4 text-center">
                                    <h5 class="text-dark fw-medium mb-3">
                                        <i class="fas fa-info-circle text-primary me-2"></i>
                                        ¿Por qué veo este mensaje?
                                    </h5>
                                    <ul class="list-unstyled text-muted mb-0">
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            Tu cuenta no tiene los permisos necesarios
                                        </li>
                                        <li class="mb-2">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            Esta función está restringida a ciertos usuarios
                                        </li>
                                        <li class="mb-0">
                                            <i class="fas fa-check-circle text-success me-2"></i>
                                            Contacta al administrador si necesitas acceso
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Botones de acción -->
                            <div class="text-center">
                                <a href="{{ url('/') }}" class="btn btn-primary btn-lg fw-medium me-3 mb-2">
                                    <i class="fas fa-home me-2"></i>Volver al Inicio
                                </a>
                                <button onclick="history.back()" class="btn btn-outline-primary btn-lg fw-medium mb-2">
                                    <i class="fas fa-arrow-left me-2"></i>Página Anterior
                                </button>
                            </div>

                            <!-- Información adicional -->
                            <div class="text-center mt-4">
                                <p class="text-muted mb-2">¿Necesitas ayuda?</p>
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    <span class="text-primary">Contactar Soporte</span>
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