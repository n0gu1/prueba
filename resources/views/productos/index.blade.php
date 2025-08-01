@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
  {{-- Encabezado --}}
  <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
    <h1 class="text-2xl font-semibold text-gray-900 dark:text-gray-100 mb-4 sm:mb-0">
      Listado de Productos
    </h1>
    <div class="flex space-x-2">
      <a href="{{ route('productos.create') }}"
         class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded">
        Crear Producto
      </a>
      <a href="{{ route('productos.pdf') }}"
         class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded">
        Descargar PDF
      </a>
    </div>
  </div>

  {{-- Tabla en “card” --}}
  <div class="shadow ring-1 ring-black ring-opacity-5 overflow-hidden sm:rounded-lg">
    <table class="min-w-full divide-y divide-gray-300 dark:divide-gray-600">
      <thead class="bg-gray-50 dark:bg-gray-800">
        <tr>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">ID</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Nombre</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Precio</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Imagen</th>
          <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">Acciones</th>
        </tr>
      </thead>
      <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
        @foreach($productos as $producto)
        <tr class="hover:bg-gray-100 dark:hover:bg-gray-800">
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $producto->id }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">{{ $producto->nombre }}</td>
          <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">Q{{ number_format($producto->precio,2) }}</td>
          <td class="px-6 py-4 whitespace-nowrap">
            @if($producto->imagen)
            <img src="{{ asset('storage/'.$producto->imagen) }}"
                 alt="{{ $producto->nombre }}"
                 class="h-10 w-10 object-cover rounded">
            @else
            <span class="text-gray-500 dark:text-gray-400 text-sm">—</span>
            @endif
          </td>
          <td class="px-6 py-4 whitespace-nowrap">
            <div class="flex space-x-2">
              <a href="{{ route('productos.show', $producto) }}"
                 class="inline-flex items-center px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded">
                Ver
              </a>
              <a href="{{ route('productos.edit', $producto) }}"
                 class="inline-flex items-center px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-black text-sm font-medium rounded">
                Editar
              </a>
              <form action="{{ route('productos.destroy', $producto) }}"
                    method="POST"
                    class="inline-block"
                    onsubmit="return confirm('¿Eliminar este producto?')">
                @csrf @method('DELETE')
                <button type="submit"
                        class="inline-flex items-center px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded">
                  Eliminar
                </button>
              </form>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  {{-- Paginación --}}
  <div class="mt-6 flex justify-center">
    {{ $productos->links() }}
  </div>
</div>
@endsection
