@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1 class="mb-4">Listado de Productos</h1>

  <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">
    <i class="bi bi-plus-lg"></i> Crear Producto
  </a>

  <div class="table-responsive">
    <table class="table table-striped table-hover align-middle">
      <thead class="table-dark">
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
          <td>Q{{ number_format($producto->precio,2) }}</td>
          <td>
            @if($producto->imagen)
              <img
                src="{{ asset('storage/'.$producto->imagen) }}"
                alt="{{ $producto->nombre }}"
                class="img-thumbnail"
                style="max-height:50px;"
              >
            @endif
          </td>
          <td>
            <a href="{{ route('productos.show',$producto) }}" class="btn btn-sm btn-info">
              Ver
            </a>
            <a href="{{ route('productos.edit',$producto) }}" class="btn btn-sm btn-warning">
              Editar
            </a>
            <form
              action="{{ route('productos.destroy',$producto) }}"
              method="POST"
              class="d-inline"
              onsubmit="return confirm('¿Eliminar este producto?');"
            >
              @csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{ $productos->links() }}
</div>
@endsection
