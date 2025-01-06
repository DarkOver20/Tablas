<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Gestión de Inventario</h2>

        <!-- Formulario para agregar un nuevo libro -->
        <form action="{{ route('inventario.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" name="titulo" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor</label>
                <input type="text" class="form-control" name="autor" required>
            </div>
            <div class="form-group">
                <label for="año">Año</label>
                <input type="date" class="form-control" name="año" required>
            </div>
            <div class="form-group">
                <label for="editorial">Editorial</label>
                <input type="text" class="form-control" name="editorial" required>
            </div>
            <div class="form-group">
                <label for="unidades">Unidades</label>
                <input type="number" class="form-control" name="unidades" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Libro</button>
        </form>

        <!-- Tabla para mostrar los libros -->
        <table id="inventarioTable" class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Año</th>
                    <th>Editorial</th>
                    <th>Unidades</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->id_libro }}</td>
                    <td>{{ $inventario->titulo }}</td>
                    <td>{{ $inventario->autor }}</td>
                    <td>{{ $inventario->año }}</td>
                    <td>{{ $inventario->editorial }}</td>
                    <td>{{ $inventario->unidades }}</td>
                    <td>
                        <form action="{{ route('inventario.destroy', $inventario->id_libro) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                        <a href="{{ route('inventario.update', $inventario->id_libro) }}" class="btn btn-warning">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#inventarioTable').DataTable();
        });
    </script>
</body>
</html>