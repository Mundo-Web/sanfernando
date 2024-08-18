<?php

namespace App\Http\Controllers;

use App\Models\Source;
use App\Http\Requests\StoreSourceRequest;
use App\Http\Requests\UpdateSourceRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Routing\ResponseFactory;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;
use SoDe\Extend\Crypto;
use SoDe\Extend\Response;

class SourceController extends BasicController
{
    public $model = Source::class;
    public $softDeletion = false;

    public function save(Request $request): HttpResponse|ResponseFactory
    {
        $response = Response::simpleTryCatch(function (Response $response) use ($request) {
            $sourceJpa = new Source();
            $sourceJpa->module_id = $request->module_id;
            if ($request->hasFile('source')) {
                $source = $request->file('source');
                $uuid = Crypto::randomUUID();
                $route = "storage/images/modules/";
                $name = "{$uuid}.{$source->getClientOriginalExtension()}";
                $manager = new ImageManager(new Driver());
                $image = $manager->read($source);
                if (!file_exists($route))     mkdir($route, 0777, true);
                $image->save($route . $name);

                $sourceJpa->name = $source->getClientOriginalName();
                $sourceJpa->ref = $route . $name;
                $sourceJpa->size = $source->getSize();
            }
            $sourceJpa->save();
        });
        return response($response->toArray(), $response->status);
    }
}
