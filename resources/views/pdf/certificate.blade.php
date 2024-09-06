{{-- <!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Certificado de Finalización</title>
  <style>
    * {
      font-family: 'Poppins', sans-serif;
      box-sizing: border-box;
    }
  </style>
</head>

<body class="bg-white">

  <div style="margin-left: auto; margin-right: auto;">
    <div style="width: 1300px; height: 900px; display: flex; margin-left: auto; margin-right: auto; margin-top: 2.5rem; margin-bottom: 2.5rem;">
        <div style="width: 180px; height: 100%; background-color: #CF072C; border-top-right-radius: 50px; background-size: cover; background-image: url({{asset('images/img/fondoizquierdo.png')}});">
        </div>
        <div style="width: 1120px; height: 100%; padding-left: 5rem; padding-right: 5rem; padding-top: 2.5rem; padding-bottom: 2.5rem; position: relative;">
            <div style="display: flex; flex-direction: column; gap: 3rem; align-items: flex-start; justify-content: center;">
                <div style="display: flex; flex-direction: row; justify-content: space-between; width: 100%; align-items: center;">
                    <div style="width: 270px;">
                        <img src="{{asset('images/img/logorojordiploma.png')}}" alt="logo" style="width: 100%;" />
                    </div>
                    <div style="width: 100px;">
                        <img src="{{asset('images/img/qrprueba.png')}}" alt="logo" style="width: 100%;" />
                    </div>
                </div>
                <div style="color: #CF072C; text-transform: uppercase; font-size: 2.25rem; text-align: center; font-weight: bold; margin-left: auto; margin-right: auto;">
                    DIPLOMADO EN {{ $attemp->evaluation->course->producto }}
                </div>
                <div style="font-size: 1.25rem; color: black; padding-left: 0.75rem; padding-right: 0.75rem; max-width: 700px; text-align: center; margin-left: auto; margin-right: auto;">
                    En mérito a su participación en nuestro <span style="text-transform: uppercase; font-style: italic; font-weight: bold; font-size: 1.875rem;">{{ $attemp->evaluation->course->producto }}.</span>
                    <br>Organizado por EGESPP, con una duracion de {{ $attemp->evaluation->course->duration / 60 }} horas lectivas del {{ date('Y') }}.
                </div>
                <div style="text-align: center; font-size: 1.875rem; font-weight: bold; width: 100%; margin-left: auto; margin-right: auto;">
                    {{ $attemp->user->name }} {{ $attemp->user->lastname }}
                </div>
                <div style="display: flex; flex-direction: row; gap: 5rem; margin-top: 4rem;">
                    <div style="text-align: center; color: black; font-size: 1.25rem; font-weight: bold; border-top: 1px solid black; width: 250px;">
                        Gerente General<br>
                        <span style="font-weight: normal; font-size: 1.125rem;">Patricia Heredia Olivera</span>
                    </div>
                    <div style="text-align: center; color: black; font-size: 1.25rem; font-weight: bold; border-top: 1px solid black; width: 250px;">
                        Sub. Gerente Académico<br>
                        <span style="font-weight: normal; font-size: 1.125rem;">Edwin Chichipe Salazar</span>
                    </div>
                    <div style="text-align: center; color: black; font-size: 1.25rem; font-weight: bold; border-top: 1px solid black; width: 250px;">
                        Sub. Gerente Académico<br>
                        <span style="font-weight: normal; font-size: 1.125rem;">Edwin Chichipe Salazar</span>
                    </div>
                </div>
                <div>
                    <h2 style="font-weight: 600; font-size: 1.125rem;">Nuestros Convenios</h2>
                    <div style="margin-top: 0.75rem; display: flex; flex-direction: row; gap: 1.25rem;">
                        <img src="{{asset('images/img/certif.png')}}" alt="certif_1" style="width: 5rem;" />
                        <img src="{{asset('images/img/certif.png')}}" alt="certif_1" style="width: 5rem;" />
                        <img src="{{asset('images/img/certif.png')}}" alt="certif_1" style="width: 5rem;" />
                    </div>
                </div>
            </div>
            <div style="position: absolute; top: 5rem; right: 0;">
                <img src="{{asset('images/img/puntosderecha.png')}}" alt="logo" style="width: 100%;" />
            </div>
        </div>
    </div>
</div>

</body>

</html> --}}

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Certificado de Finalización</title>
  <style>
    * {
      font-family: 'Poppins', sans-serif;
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      background-color: white;
    }

    .container {
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
    }

    .certificado {
      width: 1200px;
      height: 800px;
      display: flex;
      margin: auto;
      background-color: white;
      position: relative;
    }

    .certificado .sidebar {
      width: 180px;
      height: 100%;
      background-color: #CF072C;
      border-top-right-radius: 50px;
      background-image: url('{{ asset("images/img/fondoizquierdo.png") }}');
      background-size: cover;
    }

    .certificado .content {
      width: calc(100% - 180px);
      padding: 2.5rem;
      position: relative;
    }

    .logo-section {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo-section img {
      width: 270px;
    }

    .qr {
      width: 100px;
    }

    .titulo {
      color: #CF072C;
      text-transform: uppercase;
      font-size: 2.25rem;
      text-align: center;
      font-weight: bold;
      margin: 3rem 0;
    }

    .descripcion {
      font-size: 1.25rem;
      color: black;
      max-width: 700px;
      text-align: center;
      margin: 0 auto;
    }

    .nombre {
      text-align: center;
      font-size: 1.875rem;
      font-weight: bold;
      margin-top: 2rem;
    }

    .firmas {
      display: flex;
      justify-content: space-between;
      margin-top: 4rem;
    }

    .firma {
      text-align: center;
      font-size: 1.25rem;
      font-weight: bold;
      border-top: 1px solid black;
      padding-top: 1rem;
      width: 250px;
    }

    .certificaciones {
      margin-top: 2rem;
    }

    .certificaciones img {
      width: 5rem;
      margin-right: 1.25rem;
    }

    .decoracion {
      position: absolute;
      top: 5rem;
      right: 0;
      width: 200px;
    }
  </style>
</head>

<body>

  <div class="container">
    <div class="certificado">
      <div class="sidebar"></div>

      <div class="content">
        <div class="logo-section">
          <img src="{{ asset('images/img/logorojordiploma.png') }}" alt="Logo">
          <img class="qr" src="{{ asset('images/img/qrprueba.png') }}" alt="QR">
        </div>

        <div class="titulo">
          DIPLOMADO EN {{ $attemp->evaluation->course->producto }}
        </div>

        <div class="descripcion">
          En mérito a su participación en nuestro <span style="text-transform: uppercase; font-style: italic; font-weight: bold; font-size: 1.875rem;">{{ $attemp->evaluation->course->producto }}</span>.
          <br>Organizado por EGESPP, con una duración de {{ $attemp->evaluation->course->duration / 60 }} horas lectivas del {{ date('Y') }}.
        </div>

        <div class="nombre">
          {{ $attemp->user->name }} {{ $attemp->user->lastname }}
        </div>

        <div class="firmas">
          <div class="firma">
            Gerente General<br>
            <span style="font-weight: normal; font-size: 1.125rem;">Patricia Heredia Olivera</span>
          </div>
          <div class="firma">
            Sub. Gerente Académico<br>
            <span style="font-weight: normal; font-size: 1.125rem;">Edwin Chichipe Salazar</span>
          </div>
          <div class="firma">
            Sub. Gerente Académico<br>
            <span style="font-weight: normal; font-size: 1.125rem;">Edwin Chichipe Salazar</span>
          </div>
        </div>

        <div class="certificaciones">
          <h2 style="font-weight: 600; font-size: 1.125rem;">Nuestros Convenios</h2>
          <div>
            <img src="{{ asset('images/img/certif.png') }}" alt="certificación">
            <img src="{{ asset('images/img/certif.png') }}" alt="certificación">
            <img src="{{ asset('images/img/certif.png') }}" alt="certificación">
          </div>
        </div>

        <img class="decoracion" src="{{ asset('images/img/puntosderecha.png') }}" alt="decoración">
      </div>
    </div>
  </div>

</body>

</html>
