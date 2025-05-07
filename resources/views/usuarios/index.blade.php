@extends('layouts.base')

@section('content')
<div class="container mt-4">
    <h2>Gestión de Usuarios</h2>
    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createModal">Crear Usuario</button>

    <table class="table table-bordered" id="usuariosTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Municipio</th>
                <th>Departamento</th>
                <th>Estado</th>
                <th>Fecha Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->idusu }}</td>
                <td>{{ $usuario->usua_nombre }}</td>
                <td>{{ $usuario->rol->rol_descripcion ?? '-' }}</td>
                <td>{{ $usuario->municipio->muni_nombre ?? '-' }}</td>
                <td>{{ $usuario->departamento->depar_nombre ?? '-' }}</td>
                <td>{{ $usuario->estado }}</td>
                <td>{{ $usuario->fecha_registro }}</td>
                <td>
                    <button class="btn btn-sm btn-info" 
                            onclick="editUsuario({{ $usuario->idusu }}, '{{ $usuario->usua_nombre }}', '{{ $usuario->rol_idrol }}', '{{ $usuario->muni_idmuni }}', '{{ $usuario->depar_iddepar }}', '{{ $usuario->estado }}')">
                        Editar
                    </button>
                    <form method="POST" action="{{ route('usuarios.destroy', $usuario->idusu) }}" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Crear -->
<div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('usuarios.store') }}">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3"><label>Nombre</label><input type="text" name="usua_nombre" class="form-control" required></div>
          <div class="mb-3">
            <label>Rol</label>
            <select name="rol_idrol" class="form-select" required>
              @foreach($roles as $rol)
              <option value="{{ $rol->idrol }}">{{ $rol->rol_descripcion }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label>Municipio</label>
            <select name="muni_idmuni" class="form-select" required>
              @foreach($municipios as $muni)
              <option value="{{ $muni->idmuni }}">{{ $muni->muni_nombre }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label>Departamento</label>
            <select name="depar_iddepar" class="form-select" required>
              @foreach($departamentos as $depar)
              <option value="{{ $depar->iddepar }}">{{ $depar->depar_nombre }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label>Estado</label>
            <select name="estado" class="form-select" required>
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editForm" method="POST">
      @csrf @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar Usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="edit_id" name="idusu">
          <div class="mb-3"><label>Nombre</label><input type="text" name="usua_nombre" id="edit_nombre" class="form-control" required></div>
          <div class="mb-3">
            <label>Rol</label>
            <select name="rol_idrol" id="edit_rol" class="form-select" required>
              @foreach($roles as $rol)
              <option value="{{ $rol->idrol }}">{{ $rol->rol_descripcion }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label>Municipio</label>
            <select name="muni_idmuni" id="edit_muni" class="form-select" required>
              @foreach($municipios as $muni)
              <option value="{{ $muni->idmuni }}">{{ $muni->muni_nombre }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label>Departamento</label>
            <select name="depar_iddepar" id="edit_depar" class="form-select" required>
              @foreach($departamentos as $depar)
              <option value="{{ $depar->iddepar }}">{{ $depar->depar_nombre }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label>Estado</label>
            <select name="estado" id="edit_estado" class="form-select" required>
              <option value="Activo">Activo</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Actualizar</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
  function editUsuario(id, nombre, rol, muni, depar, estado) {
    $('#edit_id').val(id);
    $('#edit_nombre').val(nombre);
    $('#edit_rol').val(rol);
    $('#edit_muni').val(muni);
    $('#edit_depar').val(depar);
    $('#edit_estado').val(estado);
    $('#editForm').attr('action', '/usuarios/' + id);
    $('#editModal').modal('show');
  }

  $(document).ready(function () {
    $('#usuariosTable').DataTable();
  });
</script>
@endsection
