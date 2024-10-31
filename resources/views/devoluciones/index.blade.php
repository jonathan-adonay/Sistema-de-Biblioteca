@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Devoluciones</h1>
    <a href="/devoluciones/create" class="btn btn-primary mb-3">Agregar Devolución</a>
    <a class="btn btn-danger btn-sm" href="/report3">Reporte</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Préstamo</th>
                <th>Fecha de Devolución</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($devoluciones as $devolucion)
            <tr>
                <td>{{ $devolucion->id }}</td>
                <td>{{ $devolucion->prestamo->id ?? 'No asignado' }}</td>
                <td>{{ $devolucion->fecha_devolucion }}</td>
                <td>{{ $devolucion->estado }}</td>
                <td>
                    <a href="{{ route('devoluciones.show', $devolucion->id) }}" class="btn btn-info btn-sm">Ver</a>
                    <a href="{{ route('devoluciones.edit', $devolucion->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmDeleteModal" 
                        onclick="setDeleteForm('{{ route('devoluciones.destroy', $devolucion->id) }}', '{{ $devolucion->id }}')">
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
                <p>¿Estás seguro de que deseas eliminar la devolución con ID <strong id="devolucionId"></strong>?</p>
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
function setDeleteForm(action, devolucionId) {
    document.getElementById('deleteForm').action = action;
    document.getElementById('devolucionId').innerText = devolucionId;
}
</script>

@endsection

