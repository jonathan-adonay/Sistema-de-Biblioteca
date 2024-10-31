@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Recordatorios</h1>

    <a href="/recordatorios/create" class="btn btn-success mb-3">Crear Nuevo Recordatorio</a>
    <a class="btn btn-danger btn-sm" href="/report7">Reporte</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Libro</th>
                <th>Mensaje</th>
                <th>Fecha del Recordatorio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recordatorios as $recordatorio)
                <tr id="recordatorio-{{ $recordatorio->id }}">
                    <td>{{ $recordatorio->id }}</td>
                    <td>{{ $recordatorio->usuario->nombre }}</td>
                    <td>{{ $recordatorio->libro ? $recordatorio->libro->titulo : 'N/A' }}</td>
                    <td>{{ $recordatorio->mensaje }}</td>
                    <td>{{ $recordatorio->fecha_recordatorio }}</td>
                    <td>
                        <a href="{{ route('recordatorios.show', $recordatorio->id) }}" class="btn btn-info btn-sm">Ver</a>
                        <a href="{{ route('recordatorios.edit', $recordatorio->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" 
                            onclick="setDeleteForm('{{ route('recordatorios.destroy', $recordatorio->id) }}', '{{ $recordatorio->id }}')">
                            Eliminar
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $recordatorios->links() }} <!-- Paginación -->
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
                <p>¿Estás seguro de que deseas eliminar el recordatorio con ID <strong id="recordatorioId"></strong>?</p>
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
function setDeleteForm(action, recordatorioId) {
    document.getElementById('deleteForm').action = action;
    document.getElementById('recordatorioId').innerText = recordatorioId;
}
</script>

@endsection
