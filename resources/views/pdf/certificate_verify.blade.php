@php
  use SoDe\Extend\Math;
  $hours = Math::floor($attemp->course->duracion / 1);
  $minutes = $attemp->course->duracion % 1;

  $nota = ($attemp->score * 20) / $attemp->questions;
  $nota = round($nota * 100) / 100;

  $date_begin = $attemp->course->fecha_inicio ? date('d/m/Y', strtotime($attemp->course->fecha_inicio)) : '';
  $date_end = date('d/m/Y', strtotime($attemp->created_at));

@endphp

<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-100">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Verificación del Certificado</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
</head>

<body class="h-full">
  <div class="min-h-full">
    <header class="bg-white shadow">
      <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">Verificación del Certificado</h1>
      </div>
    </header>
    <main>
      <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-6">
          <!-- Tabla de datos -->
          <div class="md:w-1/2 lg:w-2/5 bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
              <h2 class="text-lg font-medium leading-6 text-gray-900">Información del Certificado</h2>
              <p class="mt-1 max-w-2xl text-sm text-gray-500">Detalles del estudiante y del diplomado.</p>
            </div>
            <div class="border-t border-gray-200">
              <dl>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Nombre completo</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$attemp->user->name}} {{$attemp->user->lastname}}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Número de DNI</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$attemp->user->dni}}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Nombre del diplomado</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $attemp->course->producto }}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Inicio del diplomado</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$date_begin}}</dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Fin del diplomado</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{$date_end}}</dd>
                </div>
                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Horas lectivas</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                    @if ($hours > 0)
                      {{ $hours }} horas
                      {{ $minutes > 0 ? ' y ' . $minutes . ' minutos' : '' }}
                    @else
                      {{ $minutes }} minutos
                    @endif
                    lectivas
                  </dd>
                </div>
                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                  <dt class="text-sm font-medium text-gray-500">Nota aprobatoria</dt>
                  <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">{{ $nota }}</dd>
                </div>
              </dl>
            </div>
          </div>
          <!-- Certificado embebido -->
          <div class="md:w-1/2 lg:w-3/5">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
              <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg font-medium leading-6 text-gray-900">Certificado</h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Vista previa del certificado.</p>
              </div>
              <div class="border-t border-gray-200">
                <iframe src="/api/certificate/{{ $attemp->id }}#toolbar=0"
                  class="w-full h-full object-cover rounded-b-lg aspect-[16/11]" frameborder="0" allowfullscreen></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</body>

</html>
