<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Certificado de Finalización</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap'); */

    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>

<body class="bg-white">

  <div class="w-full max-w-6xl mx-auto p-12 bg-white border border-gray-200 shadow-2xl rounded-xl">
    <div class="text-center mb-8">
      <h1 class="text-5xl font-bold text-gray-900 tracking-wide uppercase">Certificado de Finalización</h1>
      <p class="text-2xl text-gray-500 mt-4">Se otorga a</p>
    </div>

    <div class="text-center mb-12">
      <h2 class="text-6xl font-semibold text-rose-600">{{ $attemp->user->name }}</h2>
      <p class="text-xl text-gray-600 mt-4">Por haber completado con éxito el curso</p>
      <h3 class="text-4xl font-bold text-gray-800 mt-6">{{ $attemp->evaluation->course->producto }}</h3>
    </div>

    <div class="flex justify-between items-center mt-16 mb-12 px-6">
      <div class="text-left">
        <p class="text-sm text-gray-500">Fecha de finalización</p>
        <p class="text-lg font-semibold text-gray-900">{{ $attemp->created_at->format('d/m/Y') }}</p>
      </div>
      <div class="w-32 h-32 border border-gray-300">
        {!! QrCode::size(128)->generate(env('APP_URL') . '/certificate/' . $attemp->id) !!}
      </div>
      <div class="text-right">
        <p class="text-sm text-gray-500">Instructor</p>
        <p class="text-lg font-semibold text-gray-900">{{ $attemp->evaluation->course->instructor }}</p>
      </div>
    </div>

    <div class="text-center border-t border-gray-300 pt-8">
      <p class="text-sm text-gray-500">Este certificado acredita la finalización exitosa del curso y el dominio de los
        conocimientos impartidos.</p>
    </div>
  </div>

</body>

</html>
