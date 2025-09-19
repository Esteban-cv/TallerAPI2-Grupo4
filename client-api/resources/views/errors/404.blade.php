<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - Página No Encontrada | TodoApp</title>
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
                        <i class="fas fa-search fa-5x opacity-75"></i>
                    </div>
                    <h2 class="fw-bold mb-3">Página Perdida</h2>
                    <p class="lead mb-4">Parece que la página que buscas se ha extraviado en el espacio digital</p>
                    <div class="d-flex justify-content-center gap-4 text-white-50">
                        <div class="text-center">
                            <i class="fas fa-map fa-2x mb-2"></i>
                            <p class="small">Navegación</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-compass fa-2x mb-2"></i>
                            <p class="small">Orientación</p>
                        </div>
                        <div class="text-center">
                            <i class="fas fa-route fa-2x mb-2"></i>
                            <p class="small">Ruta correcta</p>
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
                                    <i class="fas fa-exclamation-triangle text-warning fa-4x"></i>
                                </div>
                                <h1 class="display-1 fw-bold text-primary mb-0">404</h1>
                                <h2 class="h3 text-dark fw-bold mb-2">Página No Encontrada</h2>
                                <p class="text-muted lead">La página que buscas no existe o ha sido movida</p>
                            </div>

                            <!-- Buscador -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body p-4">
                                    <h5 class="text-dark fw-medium mb-3">
                                        <i class="fas fa-search text-primary me-2"></i>
                                        ¿Qué estabas buscando?
                                    </h5>
                                    <div class="input-group input-group-lg">
                                        <input type="text" class="form-control border-light" placeholder="Buscar en TodoApp...">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Sugerencias -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-body p-4">
                                    <h5 class="text-dark fw-medium mb-3">
                                        <i class="fas fa-lightbulb text-primary me-2"></i>
                                        Páginas populares
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ url('/') }}" class="text-decoration-none d-block p-2 rounded hover-bg-light mb-2">
                                                <i class="fas fa-home text-primary me-2"></i>
                                                <span class="text-dark">Inicio</span>
                                            </a>
                                            <a href="#" class="text-decoration-none d-block p-2 rounded hover-bg-light mb-2">
                                                <i class="fas fa-tasks text-primary me-2"></i>
                                                <span class="text-dark">Mis Tareas</span>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="#" class="text-decoration-none d-block p-2 rounded hover-bg-light mb-2">
                                                <i class="fas fa-plus text-primary me-2"></i>
                                                <span class="text-dark">Nueva Tarea</span>
                                            </a>
                                            <a href="#" class="text-decoration-none d-block p-2 rounded hover-bg-light mb-2">
                                                <i class="fas fa-user text-primary me-2"></i>
                                                <span class="text-dark">Mi Perfil</span>
                                            </a>
                                        </div>
                                    </div>
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

                            <!-- Footer -->
                            <div class="text-center mt-4">
                                <p class="text-muted mb-2">¿El problema persiste?</p>
                                <a href="#" class="text-decoration-none">
                                    <i class="fas fa-bug text-primary me-2"></i>
                                    <span class="text-primary">Reportar problema</span>
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