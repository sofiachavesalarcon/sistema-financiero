@extends('layouts.dashboard')

@section('content')
    <div class="p-4">
        <h2 class="text-2xl font-bold mb-4">Gestión de Usuarios</h2>

        <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4"
            onclick="document.getElementById('createModal').showModal()">Crear Usuario</button>

        <div class="overflow-x-auto bg-white rounded shadow">
            <table id="usuariosTable" class="min-w-full table-auto border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Rol</th>
                        <th class="px-4 py-2">Municipio</th>
                        <th class="px-4 py-2">Departamento</th>
                        <th class="px-4 py-2">Estado</th>
                        <th class="px-4 py-2">Fecha Registro</th>
                        <th class="px-4 py-2">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $usuario->idusu }}</td>
                            <td class="px-4 py-2">{{ $usuario->usua_nombre }}</td>
                            <td class="px-4 py-2">{{ $usuario->rol->rol_descripcion ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $usuario->municipio->muni_nombre ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $usuario->departamento->depar_nombre ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $usuario->estado }}</td>
                            <td class="px-4 py-2">{{ $usuario->fecha_registro }}</td>
                            <td class="px-4 py-2 space-x-2">
                                <button
                                    onclick="editUsuario({{ $usuario->idusu }}, '{{ $usuario->usua_nombre }}', '{{ $usuario->rol_idrol }}', '{{ $usuario->muni_idmuni }}', '{{ $usuario->depar_iddepar }}', '{{ $usuario->estado }}')"
                                    class="text-sm text-white bg-indigo-600 px-2 py-1 rounded hover:bg-indigo-700">Editar</button>
                                <form method="POST" action="{{ route('usuarios.destroy', $usuario->idusu) }}"
                                    class="inline">
                                    @csrf @method('DELETE')
                                    <button onclick="return confirm('¿Seguro?')"
                                        class="text-sm text-white bg-red-600 px-2 py-1 rounded hover:bg-red-700">Eliminar</button>

                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <dialog id="createModal" class="rounded-md shadow-lg backdrop:bg-black/40 w-full max-w-lg">
        <form method="POST" action="{{ route('usuarios.store') }}" class="p-6 bg-white rounded">
            @csrf
            <h3 class="text-lg font-semibold mb-4">Crear Usuario</h3>
            <div class="mb-4"><label>Nombre</label><input type="text" name="usua_nombre"
                    class="w-full border rounded p-2" required></div>
            <div class="mb-4">
                <label>Rol</label>
                <select name="rol_idrol" class="w-full border rounded p-2" required>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->idrol }}">{{ $rol->rol_descripcion }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Municipio</label>
                <select name="muni_idmuni" class="w-full border rounded p-2" required>
                    @foreach ($municipios as $muni)
                        <option value="{{ $muni->idmuni }}">{{ $muni->muni_nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Departamento</label>
                <select name="depar_iddepar" class="w-full border rounded p-2" required>
                    @foreach ($departamentos as $depar)
                        <option value="{{ $depar->iddepar }}">{{ $depar->depar_nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Estado</label>
                <select name="estado" class="w-full border rounded p-2" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
                <button type="button" onclick="document.getElementById('createModal').close()"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Cerrar</button>
            </div>
        </form>
    </dialog>

    <dialog id="editModal" class="rounded-md shadow-lg backdrop:bg-black/40 w-full max-w-lg">
        <form id="editForm" method="POST" class="p-6 bg-white rounded">
            @csrf @method('PUT')
            <h3 class="text-lg font-semibold mb-4">Editar Usuario</h3>
            <input type="hidden" id="edit_id" name="idusu">
            <div class="mb-4"><label>Nombre</label><input type="text" name="usua_nombre" id="edit_nombre"
                    class="w-full border rounded p-2" required></div>
            <div class="mb-4">
                <label>Rol</label>
                <select name="rol_idrol" id="edit_rol" class="w-full border rounded p-2" required>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->idrol }}">{{ $rol->rol_descripcion }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Municipio</label>
                <select name="muni_idmuni" id="edit_muni" class="w-full border rounded p-2" required>
                    @foreach ($municipios as $muni)
                        <option value="{{ $muni->idmuni }}">{{ $muni->muni_nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Departamento</label>
                <select name="depar_iddepar" id="edit_depar" class="w-full border rounded p-2" required>
                    @foreach ($departamentos as $depar)
                        <option value="{{ $depar->iddepar }}">{{ $depar->depar_nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label>Estado</label>
                <select name="estado" id="edit_estado" class="w-full border rounded p-2" required>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <div class="flex justify-end space-x-2">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Actualizar</button>
                <button type="button" onclick="document.getElementById('editModal').close()"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded">Cancelar</button>
            </div>
        </form>
    </dialog>

    <script>
        function editUsuario(id, nombre, rol, muni, depar, estado) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nombre').value = nombre;
            document.getElementById('edit_rol').value = rol;
            document.getElementById('edit_muni').value = muni;
            document.getElementById('edit_depar').value = depar;
            document.getElementById('edit_estado').value = estado;
            document.getElementById('editForm').action = `/usuarios/${id}`;
            document.getElementById('editModal').showModal();
        }

        document.addEventListener("DOMContentLoaded", function() {
            if (window.$) {
                $('#usuariosTable').DataTable();
            }
        });
    </script>
@endsection
