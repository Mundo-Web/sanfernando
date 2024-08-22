<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mundo web</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
  </style>
</head>

<body>
  <main>
    <table
      style="
    width: 600px;
    margin: 0 auto;
    text-align: center;
    background-image: url('{{ asset('/mail/fondo.png') }}');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
"
      <thead>
      <tr>
        <th
          style="
                                display: flex;
                                flex-direction: row;
                                justify-content: center;
                                align-items: center;
                                margin: 40px;
                                padding: 0 200px;
                            ">
          <a href="' .
                $baseUrllink .
                '" target="_blank" style="text-align: center"><img
              src="{{ asset('/mail/logo.png') }}" alt="Gestion publica" /></a>
        </th>
      </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <p
              style="
            color: #ffffff;
            font-weight: 500;
            font-size: 40px;
            text-align: center;
            width: 500px;
            margin: 0 auto;
            padding: 20px 0;
            font-family: Montserrat, sans-serif;
        ">

              Gracias Por Registrarte!
            </p>
          </td>
        </tr>
        <tr>

          <td>
            <p
              style="
                                    color: #ffffff;
                                    font-weight: 400;
                                    font-size: 20px;
                                    text-align: center;
                                    width: 500px;
                                    margin: 0 auto;
                                    padding: 20px 0;
                                    font-family: Montserrat, sans-serif;
                                ">
              <span style="display: block">Hola ' . $name . '</span>
              <span style="display: block">En breve estaremos cominicandonos contigo </span>
            </p>
          </td>
        </tr>

        <tr>
          <td>
            <a target="_blank" href="' .
                $baseUrllink .
                '"
              style="
                                    text-decoration: none;
                                    background-color: #fdfefd;
                                    color: #254f9a;
                                    padding: 16px 20px;
                                    display: inline-flex;
                                    justify-content: center;
                                    border-radius: 10px;
                                    align-items: center;
                                    gap: 10px;
                                    font-weight: 600;
                                    font-family: Montserrat, sans-serif;
                                    font-size: 16px;
                                    margin-bottom: 350px;
                                ">
              <span>Visita nuestra web</span>
            </a>
          </td>
        </tr>
        <tr style="margin-top: 300px">
          <td>
            <a href="" target="_blank"
              style="   padding: 0 5px 30px 0;
                                    display: inline-block;
                                ">
              <img src="./mail/facebook.png" alt="facebook" /></a>

            <a href="" target="_blank"
              style="
                                    padding: 0 5px 30px 0;
                                    display: inline-block;
                                ">
              <img src="./mail/instagram.png" alt="instagram" /></a>



            <a href="" target="_blank"
              style="padding: 0 5px 30px 0;
                    display: inline-block;
                                ">
              <img src="./mail/linkedin.png" alt="linkedin" /></a>
            <a href="" target="_blank"
              style="padding: 0 5px 30px 0;
                    display: inline-block;
                                ">
              <img src="./mail/tiktok.png" alt="tiktok" /></a>
            <a href="" target="_blank"
              style="padding: 0 5px 30px 0;
                    display: inline-block;
                                ">
              <img src="./mail/whatsapp.png" alt="whastapp" /></a>


          </td>
        </tr>
      </tbody>
    </table>
  </main>
</body>

</html>
