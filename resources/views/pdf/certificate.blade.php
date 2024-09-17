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
      width: 100%;
      max-width: 800px; /* Limitar el ancho para tamaños de carta */
      min-height: 100vh;
      page-break-inside: avoid;
    }

    .first {
      width: 150px;
      background-color: red;
      min-height: 100vh;
      display: inline-block;
      vertical-align: top;
      page-break-inside: avoid;
    }

    .second {
      display: inline-block;
      vertical-align: top;
      width: calc(100% - 150px);
      min-height: 100vh;
      page-break-inside: avoid;
      padding: 20px;
      position: relative;
    }

    .image-container {
      display: flex;
      width: 100%;
      flex-direction: column;
      justify-content: center;
    }

    .image-wrapper {
      display: flex;
      width: 100%;
      margin: auto;
      align-items: center;
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
      width: 20%;
    }

    .logo-image {
      object-fit: contain;
      object-position: center;
      width: 10%;
    }

    .text-container {
      display: flex;
      width: 100%;
      flex-direction: column;
      align-items: center;
      margin-top: 0;
      color: rgba(15, 31, 56, 1);
      text-align: center;
      justify-content: center;
      font-size: 24px;
    }

    .title {
      color: rgba(207, 7, 44, 1);
      font-weight: 700;
      text-transform: uppercase;
      margin: 10px auto;
      font-size: 32px;
    }

    .description {
      margin: auto;
      font-size: 20px;
      font-weight: 400;
      line-height: 1.4;
    }

    .bold-italic {
      font-weight: 600;
    }

    .name {
      margin-top: 20px;
      font-weight: 600;
      font-size: 24px;
      line-height: 1.2;
    }

    .signature-section {
      display: flex;
      margin-top: 40px;
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
      align-self: stretch;
      display: flex;
      padding-top: 24px;
      flex-direction: column;
      justify-content: start;
      width: 217px;
    }

    .signature-name {
      margin-top: 10px;
      font-size: 18px;
      font-weight: 600;
      border-top: 1px solid #333;
      padding-top: 10px;
    }

    .agreements-section {
      display: flex;
      margin-top: 40px;
      max-width: 100%;
      flex-direction: column;
      justify-content: start;
    }

    .agreements-title {
      color: rgba(15, 31, 56, 1);
      font-weight: 600;
      font-size: 12px;
    }

    .agreements-logos {
      display: flex;
      margin-top: 8px;
      align-items: start;
      gap: 16px;
      justify-content: start;
    }

    .agreements-logo {
      object-fit: contain;
      object-position: center;
      width: 67px;
    }

    @media (max-width: 991px) {
      .container-row {
        width: 100%;
      }

      .second {
        width: calc(100% - 80px);
        padding: 15px;
      }

      .title,
      .description,
      .name,
      .agreements-section {
        margin-top: 20px;
      }
    }
  </style>
</head>

<body>
  <section class="container-row">
    <section class="first"></section>
    <section class="second">
      <div class="image-container">
        <table style="width: 100%">
          <tbody>
            <tr>
              <td align="left" style="vertical-align: middle">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/72318f99933ec24f075e143dfcf0d49da68332f7946bcaabdec7f2c94e46db8a"
                  alt="Main Visual" style="width: 100%; max-width: 400px;" />
              </td>
              <td align="right" style="vertical-align: middle">
                <img src="https://api.qrserver.com/v1/create-qr-code/?data={{ rawurlencode(env('APP_NAME') . '/certificate/' . $attemp->id) }}"
                  alt="QR" class="logo-image" style="width: 90px;" />
              </td>
            </tr>
          </tbody>
        </table>
        <div class="text-container">
          <h4 class="title">DIPLOMADO EN {{ $attemp->course->producto }}</h4>
          <p class="description">En mérito a su participación en nuestro <span class="bold-italic">DIPLOMADO DE {{ $attemp->course->producto }}</span>,
            organizado por <b>EGESPP</b>, con una duración de {{ $attemp->course->duration / 60 }} horas lectivas del {{ date('Y') }}.</p>
          <p class="name">{{ $attemp->user->name }} {{ $attemp->user->lastname }}</p>
        </div>
      </div>
      <section class="signature-section">
        <table style="margin: auto; text-align: center; margin-top: 40px;">
          <tbody>
            <tr>
              <td align="center" style="padding: 0 40px;">
                <p class="signature-name">Patricia Heredia Olivera</p>
                <p class="signature-title">Gerente General</p>
              </td>
              <td align="center" style="padding: 0 40px;">
                <p class="signature-name">Edwin Chichipe Salazar</p>
                <p class="signature-title">Sub. Gerente Académico</p>
              </td>
            </tr>
          </tbody>
        </table>
      </section>
      <section class="agreements-section">
        <p class="agreements-title">Nuestros convenios</p>
        <div class="agreements-logos">
          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/2e035b51907acddd8242408a9668baf54b544831e1aab26c57344b33ee99cfa8"
            alt="Convenio Logo 1" class="agreements-logo" />
          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/cbcff7432f010eec9ed530d9243dffda70b428a0940a30a17632b7fa756a47fe"
            alt="Convenio Logo 2" class="agreements-logo" />
          <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/29505368281a22ff9bf6d085f2e30040108fbe8d3c3cc2819e4404a9987a47d9"
            alt="Convenio Logo 3" class="agreements-logo" />
        </div>
      </section>
    </section>
  </section>
</body>

</html>
