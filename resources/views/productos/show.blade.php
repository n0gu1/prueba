@extends('layouts.app')

@section('content')
<div class="container py-4">
  <div class="card">
    <div class="card-header">
      <h2>{{ $producto->nombre }}</h2>
    </div>
    <div class="card-body">
      @if($producto->imagen)
        <img
          src="{{ asset('storage/'.$producto->imagen) }}"
          alt="{{ $producto->nombre }}"
          class="img-fluid mb-3"
          style="max-height:300px;"
        >
      @endif

      <p><strong>Precio:</strong> Q{{ number_format($producto->precio,2) }}</p>
      <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>

      <a href="{{ route('productos.index') }}" class="btn btn-primary">
        Volver al listado
      </a>
    </div>
  </div>
</div>
@endsection
