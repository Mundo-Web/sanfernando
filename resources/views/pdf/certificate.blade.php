@php
  use SoDe\Extend\Math;
  $hours = Math::floor($attemp->course->duracion / 1);
  $minutes = $attemp->course->duracion % 1;

@endphp

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

    .container-row {

      width: 1000px;
      min-height: 100vh;
      page-break-inside: avoid;
      /* Evitar quiebre de página */

    }

    .first {
      width: 150px;
      background-color: red;
      min-height: 100vh;
      height: 100%;
      display: inline;
      vertical-align: top;
      /* Alinear al inicio si hay problemas de altura */
      page-break-inside: avoid;
      /* Evitar quiebre de página */
    }


    .second {

      vertical-align: top;
      /* Alinear al inicio */
      width: 850px;
      min-height: 100vh;
      page-break-inside: avoid;
      /* Evitar quiebre de página */
      position: relative;
      height: 100%;
      display: flex;
      flex-direction: column;
      justify-items: center;
      align-items: center;
    }

    .image-container {
      display: flex;
      width: 100%;
      flex-direction: column;
      justify-content: center;
    }

    .image-wrapper {
      display: flex;
      width: 95vw;
      margin: auto;
      align-items: center;
      /* gap: 40px 100px; */
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .image-wrapper img {
      align-self: stretch;
      margin: auto 0;
      height: 95px;
      width: auto;
    }

    .main-image {
      object-fit: contain;
      object-position: center;
      width: 200px;
    }

    .logo-image {
      object-fit: contain;
      object-position: center;
      width: 90px;
    }

    /*  .text-container {
      display: flex;
      width: 100%;
      flex-direction: column;
      align-items: start;
      margin-top: 0;
      color: rgba(15, 31, 56, 1);
      text-align: center;
      justify-content: start;
      font-size: 40px;
    } */

    .title {
      color: rgba(207, 7, 44, 1);
      font-weight: 700;
      text-transform: uppercase;
      margin: auto;
    }

    .description {
      margin: auto;
      font-size: 24px;
      font-weight: 400;
      line-height: 26px;
      text-align: center;
    }

    .bold-italic {
      font-weight: 600;
      /* font-style: italic; */
    }

    .name {
      margin: auto;
      font-weight: 600;
      /* line-height: 1.2; */
      margin-top: 40px;
    }

    .signature-section {
      display: flex;
      margin-top: 60px;
      width: 95vw;
      flex-direction: column;
      justify-content: center;
    }

    .signature-container {
      display: flex;
      width: 100%;
      align-items: center;
      gap: 40px 100px;
      color: rgba(15, 31, 56, 1);
      text-align: center;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .signature-card {
      border-color: rgba(15, 31, 56, 1);
      border-top-width: 1px;
      align-self: stretch;
      display: flex;
      padding-top: 24px;
      flex-direction: column;
      justify-content: start;
      width: 217px;
    }

    .signature-title {
      font-size: 16px;
      font-weight: 400;
      line-height: 2;
    }

    .signature-name {
      font-size: 18px;
      font-weight: 600;
      line-height: 1;
    }

    .agreements-section {
      display: flex;
      margin-top: 64px;
      width: 232px;
      max-width: 100%;
      flex-direction: column;
      justify-content: start;
    }

    .agreements-title {
      color: rgba(15, 31, 56, 1);
      font-weight: 600;
      font-size: 12px;
      line-height: 1.2;
    }

    .agreements-logos {
      display: flex;
      margin-top: 8px;
      align-items: start;
      gap: 16px;
      justify-content: start;
    }

    .agreements-logo {
      aspect-ratio: 0.84;
      object-fit: contain;
      object-position: center;
      width: 67px;
      border-radius: 2px;
    }

    @media (max-width: 991px) {

      .image-container,
      .image-wrapper,
      .text-container,
      .signature-section {
        max-width: 100%;
      }

      .main-image,
      .title,
      .description,
      .name,
      .signature-section,
      .agreements-section {
        margin-top: 40px;
      }
    }

    /*
    table.grid {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    table.grid td {
      border: 1px solid #000;
      padding: 8px;
    } */
    .text-container {
      position: relative;
      height: 220px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      /* align-items: start; */
      text-align: center;


      width: 100%;


      margin-top: 0;
      color: rgba(15, 31, 56, 1);
      text-align: center;
      justify-content: start;
      font-size: 40px;
    }

    .text-container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      /* background: url('/images/icongest.png') center/contain no-repeat; */
      opacity: 0.1;
      /* Ajusta la opacidad aquí */
      z-index: -1;
    }

    .title,
    .description,
    .name {
      position: relative;
      z-index: 1;
    }

    body {
      margin: 0;
      padding: 0;
    }
  </style>
</head>

<body class="bg-white">


  <table style="width: 100%;  display: flex;">
    <tbody style="display: flex; width: 100%;">
      <tr style="display: flex; width: 100%;">
        <td style="
          /* border: 1px solid #000; */
            flex: 1; position: relative;">
          <img src="https://gestionpublica.edu.pe/images/franja_roja_sinmapa.png" alt="linea"
            style="
             position: absolute; 
               top: 0;
               /* padding-left: 10%; */
           left: 0%; 
           width: 140%; 
           height: 100%; 
           /* background-color: #cf072c;  */
            /* border-top-right-radius: 70px;  */
            /* border-bottom-right-radius: 100px; */
          ">
          </div>
        </td>
        <td style="
       /*  border: 1px solid #000; */
         flex: 5;
         
         height:100%">
          <section class="container-row">
            <section class="first">
            </section>
            <section class="second"
              style="position:relative; padding-left: 10%; width: 1000px; margin-top: 10px;
  margin-bottom: 6px;">
              <img src="https://gestionpublica.edu.pe/images/icongest.png" alt='logo'
                style="width: 90%; height: 90%; object-fit: contain; object-position: center; position: absolute; top: 50%; left: 54%; transform: translate(-50%, -50%); z-index: 0; opacity: 0.08;">
              {{-- <img style="position: absolute; z-index: 0; background-image: linear-gradient(white 50%, #cf072c 50%); height: 100vh; object-fit: contain; object-position: top" src="{{ asset('/images/pdf/tab.svg') }}" width="100px"> --}}
              <div class="image-container" style="position: relative; z-index: 1;">
                <table style="width: 100%">
                  <tbody>
                    <tr>
                      <td align="left" valign="middle" style="vertical-align: middle; padding: 15px">
                        <img
                          src="https://cdn.builder.io/api/v1/image/assets/TEMP/72318f99933ec24f075e143dfcf0d49da68332f7946bcaabdec7f2c94e46db8a?placeholderIfAbsent=true&apiKey=0f2111aa112942eda6dda1d2ced51822"
                          alt="Main Visual" style="width:400px;
" />
                      </td>
                      <td align="right" valign="middle" style="vertical-align: middle; padding: 15px">
                        <img
                          src="https://api.qrserver.com/v1/create-qr-code/?data={{ rawurlencode(env('APP_URL') . '/certificate/' . $attemp->id) }}"
                          alt="Logo" class="logo-image"
                          style="width:100px" />
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="text-container" id="text-container" style="position: relative ; margin-top:20px;">


                  <h4 class="title" style="text-transform: uppercase">
                    ESCUELA DE GESTION PUBLICA Y NEGOCIOS DEL PERU
                  </h4>
                  <p class="description " style="padding-left: 5%; padding-right: 5%; margin-top: 10px">En mérito a su participación
                    en nuestro <i class="bold-italic" style="text-transform: uppercase ;">{{ $attemp->course->producto }}.</i> Organizado por <b>EGESPP</b>, con una
                    duración de
                    @if ($hours > 0)
                      {{ $hours }} horas
                      {{ $minutes > 0 ? ' y ' . $minutes . ' minutos' : '' }}
                    @else
                      {{ $minutes }} minutos
                    @endif
                    lectivas
                    del {{ date('Y') }}.
                  </p>
                  <p class="name" style="padding-top: 10px;">{{ $attemp->user->name }} {{ $attemp->user->lastname }}
                  </p>
                </div>
              </div>
              <section class="signature-section">
                <table style="margin: auto; text=align: center; margin-top: 20px">
                  <tbody>
                    <tr>
                      @foreach ($signs as $item)
                        <td align="center" valign="middle" style="padding: 0 40px" style="position: relative;">
                          <img src="{{ asset($item->sign_path) }}" alt=""
                            style=" width:180px; height: 150px;  object-fit: contain; object-position: center; margin-bottom: -30px">
                        </td>
                      @endforeach



                      {{-- <td align="center" style="padding: 0 40px">
                        <img src="https://gestionpublica.edu.pe/images/firma2.png" alt=""
                          style=" width:130px;  object-fit: contain; object-position: center;">
                      </td> --}}
                    </tr>
                    <tr>

                      @foreach ($signs as $item)
                        <td align="center" style="padding: 0 40px" style="position: relative;">

                          <p class="signature-name" style="margin: 0; border-top: 1px solid #333; padding-top: 10px">
                            {{ $item->name }} </p>
                          <p class="signature-title" style="margin: 0">{{ $item->occupation }}</p>
                        </td>
                      @endforeach

                      {{-- 
                      <td align="center" style="padding: 0 40px">
                        <p class="signature-name" style="margin: 0; border-top: 1px solid #333; padding-top: 10px">Edwin
                          Chichipe
                          Salazar</p>
                        <p class="signature-title" style="margin: 0">Sub. Gerente Académico</p>
                      </td> --}}
                    </tr>
                  </tbody>
                </table>
              </section>
              <section class="agreements-section" style="margin-top: 5px; width:100%">
                <p class="agreements-title" style="margin-bottom: 10px">Convenio con</p>
                <div class="agreements-logos">
                  @foreach ($convenios as $item)
                    <img src="{{ asset($item->url_image) }}" alt="Convenio Logo 1" class="agreements-logo" />
                  @endforeach

                  {{-- <img
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/cbcff7432f010eec9ed530d9243dffda70b428a0940a30a17632b7fa756a47fe?placeholderIfAbsent=true&apiKey=0f2111aa112942eda6dda1d2ced51822"
                    alt="Convenio Logo 2" class="agreements-logo" /> --}}

                </div>
              </section>
            </section>
          </section>
        </td>
      </tr>

    </tbody>
  </table>


</body>

</html>
