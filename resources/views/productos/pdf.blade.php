<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: DejaVu Sans, sans-serif; }
    table { width: 100%; border-collapse: collapse; }
    th, td { border: 1px solid #444; padding: 6px; text-align: left; }
    th { background: #f0f0f0; }
  </style>
  <title>Listado de Productos</title>
</head>
<body>
  <h2 style="text-align:center;">Listado de Productos</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio (Q)</th>
        <th>Descripción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($productos as $p)
      <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->nombre }}</td>
        <td>Q{{ number_format($p->precio,2) }}</td>
        <td>{{ $p->descripcion }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</body>
</html>