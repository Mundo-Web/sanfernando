<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SignController extends BasicController
{
    public $model = Sign::class;
    public $reactView = 'Admin/Signs';

    public function setReactViewProperties()
    {
        $signs = Sign::all();
        return [
            'signs' => $signs
        ];
    }

    public function saveImg($file, $route, $name)
    {
        $manager = new ImageManager(new Driver());
        $img =  $manager->read($file);
        $img->coverDown(340, 340, 'center');

        if (!file_exists($route)) {
            mkdir($route, 0777, true); // Se crea la ruta con permisos de lectura, escritura y ejecución
        }

        $img->save($route . $name);
        return $route.$name;
    }

    public function beforeSave(Request $request)
    {
        $body = $request->all();
        $sign = Sign::where('correlative', $request->correlative)->first();
        if (!$sign) throw new Exception('No se pueden crear nuevas firmas');

        $body['id'] = $sign->id;
        if ($request->hasFile('sign')) {
            $file = $request->file('sign');
            $sign_path = $this->saveImg($file, 'storage/images/signs/', $request->correlative . '.' . $file->getClientOriginalExtension());
            $body['sign_path'] = $sign_path;
        } else {
            unset($body['sign_path']);
        }

        return $body;
    }
}
