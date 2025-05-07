@extends('layouts.base')

@section('content')
<div class="container">
    <h2 class="mb-4">Gestión de Departamentos</h2>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Crear Departamento</button>

    <table id="departamentosTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($departamentos as $departamento)
                <tr>
                    <td>{{ $departamento->iddepar }}</td>
                    <td>{{ $departamento->depar_nombre }}</td>
                    <td>{{ $departamento->estado }}</td>
                    <td>{{ $departamento->fecha_registro }}</td>
                    <td>
                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $departamento->iddepar }}">Editar</button>
                        <form method="POST" action="{{ route('departamentos.destroy', $departamento->iddepar) }}" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar este departamento?')">Eliminar</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal editar -->
                <div class="modal fade" id="editModal{{ $departamento->iddepar }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form method="POST" action="{{ route('departamentos.update', $departamento->iddepar) }}">
                            @csrf @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Departamento</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="depar_nombre" class="form-control mb-2" value="{{ $departamento->depar_nombre }}" required>
                                    <select name="estado" class="form-select" required>
                                        <option value="Activo" {{ $departamento->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                        <option value="Inactivo" {{ $departamento->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal crear -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('departamentos.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Departamento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="depar_nombre" class="form-control mb-2" placeholder="Nombre" required>
                    <select name="estado" class="form-select" required>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('#departamentosTable').DataTable();
    });
</script>
@endsection
