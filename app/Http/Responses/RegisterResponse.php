<?php

namespace App\Http\Responses;

use App\Helpers\EmailConfig;
use App\Models\General;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;


class RegisterResponse implements RegisterResponseContract
{

  public function toResponse($request)
  {
    $role = Auth::user()->roles->pluck('name');
    $usuario = Auth::user();

    if ($request->wantsJson()) {
      return response()->json(['two_factor' => false]);
    }

    switch ($role[0]) {
      case 'Admin':
        return redirect()->intended(config('fortify.home'));
      case 'Customer':
        $this->envioCorreo($usuario);
        return redirect()->intended(config('fortify.home_public'));
      default:
        return redirect()->intended(config('fortify.home_public'));
    }
  }



  private function envioCorreo($data)
  {

    $appUrl = env('APP_URL');
    $name = $data['name'];
    $mensaje = "Gracias por registrarse en " . env('APP_NAME');
    $mail = EmailConfig::config($name, $mensaje);
    $datosGenerales = General::first();
    try {
      $mail->addAddress($data['email']);
      $mail->Body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mundo web</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
    <!--[if !mso]><!-- -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i" rel="stylesheet">
    <!--<![endif]-->
</head>

<body>
    <main>
        <table style="
                width: 600px;
                margin: 0 auto;
                text-align: center;
                background-image: url(https://egespp.mundoweb.pe/mail/fondo.png);
                background-repeat: no-repeat;
                background-position: center;
                background-size: cover;
            ">
            <thead>
                <tr>
                    <th style="
                                            display: flex;
                                            flex-direction: row;
                                            justify-content: center;
                                            align-items: center;
                                            margin: 40px;
                                            padding: 0 200px;
                                        "><a href="' .
        $appUrl .
        '" target="_blank" style="text-align: center"><img src="https://egespp.mundoweb.pe/mail/logo.png" alt="Gestion publica"></a></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="esd-text">
                        <p style="
                        color: #ffffff;
                        font-weight: 500;
                        font-size: 40px;
                        text-align: center;
                        width: 500px;
                        margin: 0 auto;
                        padding: 20px 0;
                        font-family: Montserrat, sans-serif;
                    "> !Gracias Por Registrarte! </p>
                    </td>
                </tr>
                <tr>
                    <td class="esd-text">
                        <p style="
                                                color: #ffffff;
                                                font-weight: 400;
                                                font-size: 20px;
                                                text-align: center;
                                                width: 500px;
                                                margin: 0 auto;
                                                padding: 20px 0;
                                                font-family: Montserrat, sans-serif;
                                            "><span style="display: block">Hola ' . $name . '</span><span style="display: block">En breve estaremos comunicandonos contigo </span></p>
                    </td>
                </tr>
                <tr>
                    <td><a target="_blank" href="' .
        $appUrl .
        '" style="
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
                                            "><span>Visita nuestra web</span></a></td>
                </tr>
                <tr style="margin-top: 300px">
                    <td><a href="' . $datosGenerales->facebook . '" target="_blank" style="   padding: 0 5px 30px 0;
                                                display: inline-block;
                                            "><img src="https://egespp.mundoweb.pe/mail/facebook.png" alt="facebook"></a><a href="' . $datosGenerales->instagram . '" target="_blank" style="
                                                padding: 0 5px 30px 0;
                                                display: inline-block;
                                            "><img src="https://egespp.mundoweb.pe/mail/instagram.png" alt="instagram"></a><a href="' . $datosGenerales->linkedin . '" target="_blank" style="padding: 0 5px 30px 0;
                                display: inline-block;
                                            "><img src="https://egespp.mundoweb.pe/mail/linkedin.png" alt="linkedin"></a><a href="' . $datosGenerales->tiktok . '" target="_blank" style="padding: 0 5px 30px 0;
                                display: inline-block;
                                            "><img src="https://egespp.mundoweb.pe/mail/tiktok.png" alt="tiktok"></a><a href="https://api.whatsapp.com/send?phone=' . $datosGenerales->whatsapp . '&text=' . $datosGenerales->mensaje_whatsapp . '" target="_blank" style="padding: 0 5px 30px 0;
                                display: inline-block;
                                            "><img src="https://egespp.mundoweb.pe/mail/whatsapp.png" alt="whastapp"></a></td>
                </tr>
            </tbody>
        </table>
    </main>
</body>

</html>

          ';
      $mail->isHTML(true);
      $mail->send();
    } catch (\Throwable $th) {
      //throw $th;
    }
  }
}
