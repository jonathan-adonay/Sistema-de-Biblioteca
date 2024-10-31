@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lista de Libros</h1>
    <a href="/libros/create" class="btn btn-primary">Agregar Nuevo Libro</a>
    <a class="btn btn-danger btn-sm" href="/report5">Reporte</a>
    
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Género</th>
                <th>Autor id</th>
                <th>Editorial id</th>
                <th>Año publicación</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($libros as $libro)
            <tr id="libro-{{ $libro->id }}">
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->genero }}</td>
                <td>{{ $libro->autor_id }}</td>
                <td>{{ $libro->editorial_id }}</td>
                <td>{{ $libro->anio_publicacion }}</td>
                <td>{{ $libro->descripcion }}</td>
                <td>
                    <a href="{{ route('libros.show', $libro->id) }}" class="btn btn-info">Ver</a>
                    <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning">Editar</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" 
                        onclick="setDeleteForm('{{ route('libros.destroy', $libro->id) }}', '{{ $libro->id }}')">
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
                <p>¿Estás seguro de que deseas eliminar el libro con ID <strong id="libroId"></strong>?</p>
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
function setDeleteForm(action, libroId) {
    document.getElementById('deleteForm').action = action;
    document.getElementById('libroId').innerText = libroId;
}
</script>

@endsection

