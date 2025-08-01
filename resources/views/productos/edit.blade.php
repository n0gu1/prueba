{{-- resources/views/productos/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Editar Producto</h1>

  <form action="{{ route('productos.update', $producto) }}" 
        method="POST" 
        enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="form-label">Nombre</label>
      <input type="text" 
             name="nombre" 
             class="form-control" 
             value="{{ old('nombre', $producto->nombre) }}">
      @error('nombre') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <textarea name="descripcion" class="form-control">{{ old('descripcion', $producto->descripcion) }}</textarea>
      @error('descripcion') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Precio</label>
      <input type="number" 
             step="0.01" 
             name="precio" 
             class="form-control" 
             value="{{ old('precio', $producto->precio) }}">
      @error('precio') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Imagen</label>
      <input type="file" 
             name="imagen" 
             id="imagen" 
             class="form-control">
      @error('imagen') <small class="text-danger">{{ $message }}</small> @enderror

      {{-- Previsualizar existente o nueva --}}
      <img id="preview" 
           src="{{ $producto->imagen ? asset('storage/'.$producto->imagen) : '' }}" 
           style="max-height:150px; display:{{ $producto->imagen ? 'block' : 'none' }}; margin-top:10px;">
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
  </form>
</div>

@push('scripts')
<script>
  document.getElementById('imagen')
    .addEventListener('change', function(e) {
      const [file] = e.target.files;
      if (file) {
        const reader = new FileReader();
        reader.onload = ev => {
          const img = document.getElementById('preview');
          img.src = ev.target.result;
          img.style.display = 'block';
        }
        reader.readAsDataURL(file);
      }
    });
</script>
@endpush
@endsection
