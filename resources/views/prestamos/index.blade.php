{{-- Heredamos la estructura del archivo app.blade.php --}}
@extends('layouts.app')

{{-- Definimos el título --}}
@section('title', 'Listado de Préstamos')
{{-- Definimos el contenido --}}
@section('content')
<div class="container mt-4">
    <h1 class="text-center">Listado de Préstamos</h1>
    <a href="/prestamos/create" class="btn btn-primary mb-3">Crear Nuevo Préstamo</a>
    <a class="btn btn-danger btn-sm" href="/report6">Reporte</a>
    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Libro</th>
                <th>Usuario</th>
                <th>Fecha de Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($prestamos as $prestamo)
                <tr id="prestamo-{{ $prestamo->id }}">
                    <td>{{ $prestamo->id }}</td>
                    <td>{{ $prestamo->libro->titulo }}</td>
                    <td>{{ $prestamo->usuario->nombre }}</td>
                    <td>{{ $prestamo->fecha_prestamo }}</td>
                    <td>{{ $prestamo->fecha_devolucion }}</td>
                    <td>{{ $prestamo->estado }}</td>
                    <td>
                        <a href="{{ route('prestamos.show', $prestamo) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('prestamos.edit', $prestamo) }}" class="btn btn-warning btn-sm">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" 
                            onclick="setDeleteForm('{{ route('prestamos.destroy', $prestamo) }}', '{{ $prestamo->id }}')">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal de Confirmación -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar el préstamo con ID <strong id="prestamoId"></strong>?</p>
                <p class="text-warning">Esta acción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" action="" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
function setDeleteForm(action, prestamoId) {
    document.getElementById('deleteForm').action = action;
    document.getElementById('prestamoId').innerText = prestamoId;
}
</script>

@endsection
