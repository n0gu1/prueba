{{-- resources/views/productos/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <h1>{{ $producto->nombre }}</h1>

  @if($producto->imagen)
    <img src="{{ asset('storage/' . $producto->imagen) }}" 
         alt="{{ $producto->nombre }}" 
         style="max-width:300px; margin-bottom:20px;">
  @endif

  <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
  <p><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>

  <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection
