<?php

namespace App\Http\Controllers;

use App\Helpers\EmailConfig;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\General;
use App\Models\Message;
use Illuminate\Http\Request;


class MessageController extends BasicController
{
    public $model = Message::class;
    public function index()
    {
        $mensajes = Message::where('status' , '=', 1 )->orderBy('created_at', 'DESC')->get();
        return view('pages.message.index', compact('mensajes'));
    }

    function storePublic(Request $request)
    {
        $mensaje = new Message();

        $mensaje->full_name = $request-> nombre; 
        $mensaje->email = $request-> email; 
        $mensaje->phone = $request-> phone; 
        $mensaje->source = $request-> textoSeleccionado; 
        $mensaje->service_product = $request-> textoMeet; 

        $mensaje->save();

        $this->envioCorreo($mensaje);

        return response()->json(['message' => 'Solicitud enviada Correctamente']);
    }

    public function show($id)
    {
        //
        $message = Message::findOrFail($id);

        $message->is_read = 1; 
        $message->save();

        return view('pages.message.show', compact('message'));
    }

    public function borrar(Request $request)
    {

        $mensaje = Message::find($request->id);
        $mensaje->status = 0; 
        $mensaje->save();

        return response()->json(['success' => true]);

    }

    private function envioCorreo($data)
    {
        $appUrl = env('APP_URL');
        $name = $data['full_name'];
        $mensaje = "Gracias por comunicarte con " . env('APP_NAME');
        $mail = EmailConfig::config($name, $mensaje);
        $datosGenerales = General::first();
        try {
        $mail->addAddress($data['email']);
        $mail->Body = '
            <html lang="en">
            <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <title>Dimensión Lider</title>
            <link rel="preconnect" href="https://fonts.googleapis.com" />
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link
                href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
                rel="stylesheet"
            />
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
                    background-image: url(' .
                        $appUrl .
                        '/mail/fondo.png);
                    background-repeat: no-repeat;
                    background-position: center;
                    background-size: cover;
                "
                >
                <thead>
                    <tr>
                    <th
                        style="
                        display: flex;
                        flex-direction: row;
                        justify-content: center;
                        align-items: center;
                        margin-top: 40px;
                        padding: 0 200px;
                        "
                    >
                        <a href="' .
                        $appUrl .
                        '" target="_blank" style="text-align:center" ><img src="' .
                        $appUrl .
                        '/mail/logo.png" alt="hpi" /></a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>
                        <p
                        style="
                            color: #ffffff;
                            font-size: 40px;
                            line-height: normal;
                            font-family: Google Sans;
                            font-weight: bold;
                        "
                        >
                        ¡Gracias
                        <span style="color: #ffffff">por escribirnos!</span>
                        </p>
                    </td>
                    </tr>

                    <tr>
                    <td>
                        <p
                        style="
                            color: #ffffff;
                            font-weight: 500;
                            font-size: 18px;
                            text-align: center;
                            width: 500px;
                            margin: 0 auto;
                            padding: 20px 0 5px 0;
                            font-family: Google Sans;
                        "
                        >
                        <span style="display: block">Hola ' . $name . '</span>
                        </p>
                    </td>
                    </tr>
                    
                    <tr>
                    <td>
                        <p
                        style="
                            color: #ffffff;
                            font-weight: 500;
                            font-size: 18px;
                            text-align: center;
                            width: 500px;
                            margin: 0 auto;
                            padding: 0px 10px 5px 0px;
                            font-family: Google Sans;
                        "
                        >
                        En breve estaremos comunicandonos contigo.
                        </p>
                    </td>
                    </tr>
                    <tr>
                    <td>
                        <a
                        target="_blank"
                        href="' .
                        $appUrl .
                        '"
                        style="
                            text-decoration: none;
                            background-color: #59C402;
                            color: #ffffff;
                            padding: 13px 20px;
                            display: inline-flex;
                            justify-content: center;
                            border-radius: 32px;
                            align-items: center;
                            gap: 10px;
                            font-weight: 600;
                            font-family: Google Sans;
                            font-size: 16px;
                            margin-bottom: 350px;
                        "
                        >
                        <span>Visita nuestra web</span>
                        </a>
                    </td>
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
