@extends('layouts.base')

@section('content')
<div class="container">
    <h2 class="mb-4">Gestión de Municipios</h2>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Crear Municipio</button>

    <table id="municipiosTable" class="table table-bordered">
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
            @foreach ($municipios as $municipio)
                <tr>
                    <td>{{ $municipio->idmuni }}</td>
                    <td>{{ $municipio->muni_nombre }}</td>
                    <td>{{ $municipio->estado }}</td>
                    <td>{{ $municipio->fecha_registro }}</td>
                    <td>
                        <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editModal{{ $municipio->idmuni }}">Editar</button>
                        <form action="{{ route('municipios.destroy', $municipio) }}" method="POST" style="display:inline-block;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este municipio?')">Eliminar</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal Editar -->
                <div class="modal fade" id="editModal{{ $municipio->idmuni }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form method="POST" action="{{ route('municipios.update', $municipio) }}">
                            @csrf @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Editar Municipio</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="text" name="muni_nombre" class="form-control mb-2" value="{{ $municipio->muni_nombre }}" required>
                                    <select name="estado" class="form-select" required>
                                        <option value="Activo" {{ $municipio->estado == 'Activo' ? 'selected' : '' }}>Activo</option>
                                        <option value="Inactivo" {{ $municipio->estado == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
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
        <form method="POST" action="{{ route('municipios.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear Municipio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="muni_nombre" class="form-control mb-2" placeholder="Nombre del municipio" required>
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
        $('#municipiosTable').DataTable();
    });
</script>
@endsection
