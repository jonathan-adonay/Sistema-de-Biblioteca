@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Detalles de Préstamo</h2>
    <a href="{{ route('detalleprestamos.create') }}" class="btn btn-success">Agregar Detalle</a>
    <a class="btn btn-danger btn-sm" href="/report2">Reporte</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Préstamo</th>
                <th>Libro</th>
                <th>Cantidad</th>
                <th>Estado del Libro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detallePrestamos as $detalle)
                <tr>
                    <td>{{ $detalle->id }}</td>
                    <td>{{ $detalle->prestamo_id }}</td>
                    <td>{{ $detalle->libro_id }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>{{ $detalle->estado_libro }}</td>
                    <td>
                        <a href="{{ route('detalleprestamos.show', $detalle->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('detalleprestamos.edit', $detalle->id) }}" class="btn btn-warning">Editar</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" 
                            onclick="setDeleteForm('{{ route('detalleprestamos.destroy', $detalle->id) }}', '{{ $detalle->id }}')">
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
                <p>¿Estás seguro de que deseas eliminar el detalle con ID <strong id="detalleId"></strong>?</p>
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
function setDeleteForm(action, detalleId) {
    document.getElementById('deleteForm').action = action;
    document.getElementById('detalleId').innerText = detalleId;
}
</script>

@endsection
