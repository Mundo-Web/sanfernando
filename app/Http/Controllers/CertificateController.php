<?php

namespace App\Http\Controllers;

use App\Models\Attemp;
use App\Models\ClientLogos;
use App\Models\Sign;
use Illuminate\Http\Request;
use Spatie\Browsershot\Browsershot;
use Barryvdh\DomPDF\Facade\Pdf as PDF;



class CertificateController extends Controller
{
    public function generateCertificate(Request $request , string $attempId)
    {
        // Ruta del archivo HTML
        
        $attemp = Attemp::with(['evaluation', 'course'])->find($attempId);
        $convenios = ClientLogos::where("status", "=", true)->get();
        $signs = Sign::where('name' , '!=', null)->where('occupation', '!=', null )->get();
        $htmlPath = resource_path('views/pdf/certificate.blade.php');

        // Generar la imagen a partir del HTML
        // resources\views\pdf\certificate.blade.php
        $imagePath = storage_path('/public/certificate.png');
        Browsershot::html(view('pdf.certificate', compact('attemp', 'convenios', 'signs'))->render())
        // ->setNodeBinary('C:\Program Files\nodejs\node.exe') // Ajusta la ruta a tu instalación de Node.js
        // ->setNpmBinary('C:\Program Files\nodejs\npm.cmd') // Ajusta la ruta a tu instalación de npm
        ->setNodeBinary('/usr/bin/node') // Ajusta la ruta a tu instalación de Node.js
        ->setNpmBinary('/usr/bin/npm') // Ajusta la ruta a tu instalación de npm
        
            ->windowSize(1200, 800)
            // ->waitForFunction('document.querySelector("img[src=\'http://127.0.0.1:8000/images/icongest.png\']").complete')
            ->waitUntilNetworkIdle()
            ->save($imagePath);

            

        // Generar el PDF a partir de la imagen
        $pdf = PDF::loadView('pdf.certificate_image', ['imagePath' => $imagePath])
        ->setPaper('a4', 'landscape');
        
        return $pdf->download('certificate.pdf');
    }
}