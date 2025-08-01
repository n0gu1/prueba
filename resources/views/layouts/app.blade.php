<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Prueba')</title>
  {{-- Si usas Vite: --}}
  @if (file_exists(public_path('build/manifest.json')))
    @vite(['resources/css/app.css','resources/js/app.js'])
  @else
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="{{ asset('js/app.js') }}"></script>
  @endif
</head>
<body>
  <nav>
    {{-- tu navbar --}}
  </nav>

  <main class="py-4">
    @yield('content')
  </main>

  @stack('scripts')
</body>
</html>
