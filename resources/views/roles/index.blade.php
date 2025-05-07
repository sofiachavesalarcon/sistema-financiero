@extends('layouts.base')

@section('content')
<div class="container">
    <h2 class="mb-4">Gestión de Roles</h2>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Crear Rol</button>

    <table id="rolesTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $rol)
                <tr>
                    <td>{{ $rol->idrol }}</td>
                    <td>{{ $rol->rol_descripcion }}</td>
                    <td>{{ $rol->estado }}</td>
                    <td>{{ $rol->fecha_registro }}</td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $rol->idrol }}">Editar</button>
                        <form action="{{ route('roles.destroy', $rol) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este rol?')">Eliminar</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Editar -->
                <div class="modal fade" id="editModal{{ $rol->idrol }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form method="POST" action="{{ route('roles.update', $rol) }}">
                            @csrf @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Rol</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="rol_descripcion" class="form-control mb-2" value="{{ $rol->rol_descripcion }}" required>
                                    <select name="estado" class="form-select" required>
                                        <option value="Activo" {{ $rol->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                        <option value="Inactivo" {{ $rol->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
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

<!-- Modal Crear -->
<div class="modal fade" id="createModal" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Rol</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="rol_descripcion" class="form-control mb-2" placeholder="Descripción" required>
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
        $('#rolesTable').DataTable();
    });
</script>
@endsection
