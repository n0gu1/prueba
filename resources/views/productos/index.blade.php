{{-- resources/views/productos/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Listado de Productos</h1>

  <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">
    Crear Producto
  </a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Imagen</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($productos as $producto)
        <tr>
          <td>{{ $producto->id }}</td>
          <td>{{ $producto->nombre }}</td>
          <td>${{ number_format($producto->precio, 2) }}</td>
          <td>
            @if($producto->imagen)
              <img src="{{ asset('storage/' . $producto->imagen) }}" 
                   alt="{{ $producto->nombre }}" 
                   style="height:50px;">
            @endif
          </td>
          <td>
            <a href="{{ route('productos.show', $producto) }}" class="btn btn-sm btn-info">
              Ver
            </a>
            <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-warning">
              Editar
            </a>
            <form action="{{ route('productos.destroy', $producto) }}" 
                  method="POST" 
                  style="display:inline-block;"
                  onsubmit="return confirm('¿Eliminar este producto?');">
              @csrf
              @method('DELETE')
              <button class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {{-- Paginación --}}
  <div>
    {{ $productos->links() }}
  </div>
</div>
@endsection
