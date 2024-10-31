@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editoriales</h1>
    <a href="/editoriales/create" class="btn btn-primary">Crear Editorial</a>
    <a class="btn btn-danger btn-sm" target="_blank" href="/report4">Reporte</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($editoriales as $editorial)
                <tr>
                    <td>{{ $editorial->id }}</td>
                    <td>{{ $editorial->nombre }}</td>
                    <td>{{ $editorial->direccion }}</td>
                    <td>{{ $editorial->telefono }}</td>
                    <td>{{ $editorial->email }}</td>
                    <td>
                        <a href="{{ route('editoriales.show', $editorial->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('editoriales.edit', $editorial->id) }}" class="btn btn-warning">Editar</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" 
                            onclick="setDeleteForm('{{ route('editoriales.destroy', $editorial->id) }}', '{{ $editorial->id }}')">
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
                <p>¿Estás seguro de que deseas eliminar la editorial con ID <strong id="editorialId"></strong>?</p>
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
function setDeleteForm(action, editorialId) {
    document.getElementById('deleteForm').action = action;
    document.getElementById('editorialId').innerText = editorialId;
}
</script>

@endsection
