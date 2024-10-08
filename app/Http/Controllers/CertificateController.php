<?php

namespace App\Http\Controllers;

use App\Models\Attemp;
use App\Models\ClientLogos;
use App\Models\Sign;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use SoDe\Extend\Fetch;

class CertificateController extends Controller
{
    public function generateCertificate(Request $request, string $attempId)
    {
        try {
            $attemp = Attemp::with(['evaluation', 'course'])->findOrFail($attempId);
            $convenios = ClientLogos::where("status", "=", true)->get();
            $signs = Sign::where('name', '!=', null)->where('occupation', '!=', null)->get();

            // Generar el HTML del certificado
            $html = view('pdf.certificate', compact('attemp', 'convenios', 'signs'))->render();

            // echo (htmlentities(str_replace('"', '\"', $html)));

            $response = new Fetch('https://whatsapp.atalaya.pe/api/utils/html2image', [
                'method' => 'POST',
                'headers' => [
                    'Accept' => 'image/png',
                    'Content-Type' => 'application/json'
                ],
                'body' => [
                    'html' => $html,
                    'imageType' => 'jpeg',
                    'width' => 1200,
                    'height' => 800
                ]
            ]);

            if (!$response->ok) {
                throw new \Exception('La API no pudo generar la imagen del certificado. Código de estado: ' . $response->status);
            }

            // La respuesta es la imagen PNG
            $imageContent = $response->blob();

            if (strlen($imageContent) == 0) {
                throw new \Exception('La API devolvió una imagen vacía.');
            }

            // Guardar la imagen PNG temporalmente
            $imagePath = storage_path('app/certificates/certificate_' . $attempId . '.png');
            if (file_put_contents($imagePath, $imageContent) === false) {
                throw new \Exception('No se pudo guardar la imagen temporal.');
            }

            // Generar el PDF a partir de la imagen PNG
            $pdf = PDF::loadView('pdf.certificate_image', ['imagePath' => $imagePath])
                ->setPaper('a4', 'landscape');

            // Eliminar la imagen temporal
            // unlink($imagePath);

            return $pdf->download('certificate_' . $attempId . '.pdf');
        } catch (\Exception $e) {

            // Si ya se creó la imagen temporal, intentamos eliminarla
            if (isset($imagePath) && file_exists($imagePath)) {
                // unlink($imagePath);
            }

            return response()->json([
                'error' => 'No se pudo generar el certificado',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
