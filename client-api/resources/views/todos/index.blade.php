<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - TodoApp</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-light">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">
                <i class="fas fa-clipboard-list me-2"></i>TodoApp
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">
                        <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-4">
        <!-- Alertas -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="h3 text-dark fw-bold mb-1">
                    <i class="fas fa-tasks text-primary me-2"></i>Lista de Tareas
                </h1>
                <p class="text-muted">Gestiona y organiza tus actividades diarias</p>
            </div>
        </div>

        <!-- Dashboard Cards -->
        <div class="row mb-4">
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="text-primary mb-2">
                            <i class="fas fa-list-ul fa-2x"></i>
                        </div>
                        <h5 class="card-title text-dark fw-medium">Total de Tareas</h5>
                        <h2 class="text-primary fw-bold mb-0">{{ count($todos) }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="text-warning mb-2">
                            <i class="fas fa-clock fa-2x"></i>
                        </div>
                        <h5 class="card-title text-dark fw-medium">Pendientes</h5>
                        <h2 class="text-warning fw-bold mb-0">
                            {{ count(array_filter($todos, function($todo) { return !$todo['completed']; })) }}
                        </h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body text-center">
                        <div class="text-success mb-2">
                            <i class="fas fa-check-circle fa-2x"></i>
                        </div>
                        <h5 class="card-title text-dark fw-medium">Completadas</h5>
                        <h2 class="text-success fw-bold mb-0">
                            {{ count(array_filter($todos, function($todo) { return $todo['completed']; })) }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add Task Form -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <form method="POST" action="{{ route('todos.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-8 mb-2">
                                    <input type="text" class="form-control form-control-lg border-light"
                                        name="todo" placeholder="Escribe tu nueva tarea..." required>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-medium">
                                        <i class="fas fa-plus me-2"></i>Agregar Tarea
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Table -->
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0 pb-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="text-dark fw-medium mb-0">
                                <i class="fas fa-table text-primary me-2"></i>Todas las Tareas
                            </h5>
                            <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-sync-alt me-1"></i>Actualizar
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        @if(!empty($todos))
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="border-0 text-dark fw-medium">#</th>
                                        <th class="border-0 text-dark fw-medium">Tarea</th>
                                        <th class="border-0 text-dark fw-medium">Estado</th>
                                        <th class="border-0 text-dark fw-medium text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($todos as $todo)
                                    <tr>
                                        <td class="text-muted">{{ $todo['id'] }}</td>
                                        <td class="text-dark">{{ $todo['todo'] }}</td>
                                        <td>
                                            @if($todo['completed'])
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>Completado
                                            </span>
                                            @else
                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-clock me-1"></i>Pendiente
                                            </span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            <!-- Toggle Status Button -->
                                            <form method="POST" action="{{ route('todos.toggle', $todo['id']) }}" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="_method" value="PATCH">
                                                <button type="submit" class="btn btn-outline-success btn-sm me-1" title="Cambiar estado">
                                                    <i class="fas fa-{{ $todo['completed'] ? 'undo' : 'check' }}"></i>
                                                </button>
                                            </form>

                                            <!-- Edit Button -->
                                            <button class="btn btn-outline-primary btn-sm me-1"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $todo['id'] }}"
                                                title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Delete Button -->
                                            <form method="POST" action="{{ route('todos.destroy', $todo['id']) }}"
                                                class="d-inline"
                                                onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta tarea?')">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-outline-danger btn-sm" title="Eliminar">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Edit Modal for each todo -->
                                    <div class="modal fade" id="editModal{{ $todo['id'] }}" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content border-0 shadow">
                                                <div class="modal-header border-0 pb-0">
                                                    <h5 class="modal-title text-dark fw-bold">
                                                        <i class="fas fa-edit text-primary me-2"></i>Editar Tarea
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <form method="POST" action="{{ route('todos.update', $todo['id']) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="PUT">
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="todo{{ $todo['id'] }}" class="form-label text-dark fw-medium">
                                                                <i class="fas fa-tasks text-primary me-1"></i>Descripción de la tarea
                                                            </label>
                                                            <textarea class="form-control border-light"
                                                                id="todo{{ $todo['id'] }}"
                                                                name="todo"
                                                                rows="3"
                                                                required>{{ $todo['todo'] }}</textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label text-dark fw-medium">
                                                                <i class="fas fa-check-square text-primary me-1"></i>Estado
                                                            </label>
                                                            <div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input"
                                                                        type="radio"
                                                                        name="completed"
                                                                        id="statusPending{{ $todo['id'] }}"
                                                                        value="0"
                                                                        {{ !$todo['completed'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label text-warning" for="statusPending{{ $todo['id'] }}">
                                                                        <i class="fas fa-clock me-1"></i>Pendiente
                                                                    </label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input class="form-check-input"
                                                                        type="radio"
                                                                        name="completed"
                                                                        id="statusCompleted{{ $todo['id'] }}"
                                                                        value="1"
                                                                        {{ $todo['completed'] ? 'checked' : '' }}>
                                                                    <label class="form-check-label text-success" for="statusCompleted{{ $todo['id'] }}">
                                                                        <i class="fas fa-check me-1"></i>Completado
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer border-0">
                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                            <i class="fas fa-times me-1"></i>Cancelar
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-save me-1"></i>Guardar Cambios
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @else
                        <div class="text-center py-4">
                            <i class="fas fa-tasks fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No hay tareas disponibles. ¡Agrega tu primera tarea!</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
