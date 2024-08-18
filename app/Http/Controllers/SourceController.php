<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use SoDe\Extend\Crypto;

class SourceController extends BasicController
{
    public $model = Source::class;
    public $softDeletion = false;

    public function get(Request $request, string $source)
    {
        try {
            $content = Storage::get('sources/' . $source);
            if (!$content) throw new Exception('Perfil no encontrado');
            return response($content, 200, [
                'Content-Type' => 'application/octet-stream'
            ]);
        } catch (\Throwable $th) {
            return response(null, 404);
        }
    }

    public function beforeSave(Request $request)
    {
        $body = $request->all();
        $source = $request->file('source');

        $route = 'sources/';
        $name = Crypto::randomUUID() . '.' . $source->getClientOriginalExtension();
        if (!file_exists($route)) {
            mkdir($route, 0777, true);
        }
        Storage::put($route . $name, file_get_contents($source));

        $body['name'] = $source->getClientOriginalName();
        $body['size'] = $source->getSize();
        $body['ref'] = $name;

        return $body;
    }

    public function afterSave(Request $request, object $jpa)
    {
        return $jpa;
    }
}
