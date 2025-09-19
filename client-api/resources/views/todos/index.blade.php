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
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-clipboard-list me-2"></i>TodoApp
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-home me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-tasks me-1"></i>Mis Tareas
                        </a>
                    </li>
                </ul>
                <form method="POST" action="{{ route('logout') }}" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-outline-light">
                        <i class="fas fa-sign-out-alt me-1"></i>Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container my-4">
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
                        <h2 class="text-primary fw-bold mb-0" id="totalTasks">{{ count($todos) }}</h2>
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
                        <h2 class="text-warning fw-bold mb-0" id="pendingTasks">
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
                        <h2 class="text-success fw-bold mb-0" id="completedTasks">
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
                    <div class="card-header bg-white border-0 pb-0">
                        <h5 class="text-dark fw-medium mb-0">
                            <i class="fas fa-plus text-primary me-2"></i>Agregar Nueva Tarea
                        </h5>
                    </div>
                    <div class="card-body">
                        <form id="addTaskForm">
                            <div class="row">
                                <div class="col-md-8 mb-2">
                                    <input type="text" class="form-control form-control-lg border-light"
                                        id="newTask" placeholder="Escribe tu nueva tarea..." required>
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
                        <h5 class="text-dark fw-medium mb-0">
                            <i class="fas fa-table text-primary me-2"></i>Todas las Tareas
                        </h5>
                    </div>
                    <div class="card-body p-0">
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
                                <tbody id="tasksTable">
                                    @foreach($todos as $index => $todo)
                                    <tr>
                                        <td class="text-muted">{{ $todo['id'] ?? $index + 1 }}</td>
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
                                            <button class="btn btn-outline-primary btn-sm me-2"
                                                onclick="editTask({{ $todo['id'] ?? $index + 1 }}, '{{ $todo['todo'] }}', {{ $todo['completed'] ? 'true' : 'false' }})"
                                                data-bs-toggle="modal" data-bs-target="#editModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm"
                                                onclick="deleteTask({{ $todo['id'] ?? $index + 1 }})">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title text-dark fw-bold">
                        <i class="fas fa-edit text-primary me-2"></i>Editar Tarea
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="editTaskForm">
                        <input type="hidden" id="editTaskId">
                        <div class="mb-3">
                            <label for="editTaskText" class="form-label text-dark fw-medium">
                                <i class="fas fa-tasks text-primary me-1"></i>Descripción de la tarea
                            </label>
                            <textarea class="form-control border-light" id="editTaskText" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-dark fw-medium">
                                <i class="fas fa-check-square text-primary me-1"></i>Estado
                            </label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="editTaskStatus" id="statusPending" value="false">
                                    <label class="form-check-label text-warning" for="statusPending">
                                        <i class="fas fa-clock me-1"></i>Pendiente
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="editTaskStatus" id="statusCompleted" value="true">
                                    <label class="form-check-label text-success" for="statusCompleted">
                                        <i class="fas fa-check me-1"></i>Completado
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i>Cancelar
                    </button>
                    <button type="button" class="btn btn-primary" onclick="updateTask()">
                        <i class="fas fa-save me-1"></i>Guardar Cambios
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add new task
        document.getElementById('addTaskForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const taskText = document.getElementById('newTask').value.trim();

            if (taskText) {
                // Simulate API call
                showAlert('success', 'Tarea agregada exitosamente!');
                document.getElementById('newTask').value = '';

                // Here you would make the actual API call to add the task
                // fetch('https://dummyjson.com/todos/add', {...})
            }
        });

        // Edit task function
        function editTask(id, text, completed) {
            document.getElementById('editTaskId').value = id;
            document.getElementById('editTaskText').value = text;

            if (completed) {
                document.getElementById('statusCompleted').checked = true;
            } else {
                document.getElementById('statusPending').checked = true;
            }
        }

        // Update task function
        function updateTask() {
            const id = document.getElementById('editTaskId').value;
            const text = document.getElementById('editTaskText').value.trim();
            const completed = document.querySelector('input[name="editTaskStatus"]:checked').value === 'true';

            if (text) {
                // Simulate API call
                showAlert('info', `Tarea #${id} actualizada exitosamente!`);

                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                modal.hide();

                // Here you would make the actual API call to update the task
                // fetch(`https://dummyjson.com/todos/${id}`, {...})
            }
        }

        // Delete task function
        function deleteTask(id) {
            if (confirm('¿Estás seguro de que deseas eliminar esta tarea?')) {
                // Simulate API call
                showAlert('warning', `Tarea #${id} eliminada exitosamente!`);

                // Here you would make the actual API call to delete the task
                // fetch(`https://dummyjson.com/todos/${id}`, {method: 'DELETE'})
            }
        }

        // Show alert function
        function showAlert(type, message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
            alertDiv.style.top = '20px';
            alertDiv.style.right = '20px';
            alertDiv.style.zIndex = '9999';
            alertDiv.style.minWidth = '300px';
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            `;

            document.body.appendChild(alertDiv);

            // Auto remove after 3 seconds
            setTimeout(() => {
                if (alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 3000);
        }
    </script>
</body>

</html>