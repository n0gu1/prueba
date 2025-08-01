@extends('layouts.app')

@section('content')
<div class="container py-4">
  <h1 class="mb-4">{{ isset($producto) ? 'Editar Producto' : 'Crear Producto' }}</h1>

  <form
    action="{{ isset($producto) ? route('productos.update',$producto) : route('productos.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="row g-3"
  >
    @csrf
    @isset($producto) @method('PUT') @endisset

    <div class="col-md-6">
      <label class="form-label">Nombre</label>
      <input
        type="text"
        name="nombre"
        class="form-control @error('nombre') is-invalid @enderror"
        value="{{ old('nombre',$producto->nombre ?? '') }}"
      >
      @error('nombre')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <label class="form-label">Precio</label>
      <input
        type="number"
        step="0.01"
        name="precio"
        class="form-control @error('precio') is-invalid @enderror"
        value="{{ old('precio',$producto->precio ?? '') }}"
      >
      @error('precio')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-12">
      <label class="form-label">Descripción</label>
      <textarea
        name="descripcion"
        class="form-control @error('descripcion') is-invalid @enderror"
        rows="3"
      >{{ old('descripcion',$producto->descripcion ?? '') }}</textarea>
      @error('descripcion')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <label class="form-label">Imagen</label>
      <input
        type="file"
        name="imagen"
        id="imagen"
        class="form-control @error('imagen') is-invalid @enderror"
      >
      @error('imagen')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="col-md-6">
      <label class="form-label">Previsualización</label><br>
      <img
        id="preview"
        src="{{ isset($producto) && $producto->imagen ? asset('storage/'.$producto->imagen) : '' }}"
        class="img-fluid img-thumbnail"
        style="{{ isset($producto) && $producto->imagen ? '' : 'display:none;' }}"
      >
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-success">
        {{ isset($producto) ? 'Actualizar' : 'Crear' }}
      </button>
      <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </div>
  </form>
</div>

@push('scripts')
<script>
  document.getElementById('imagen').addEventListener('change', function(e) {
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
