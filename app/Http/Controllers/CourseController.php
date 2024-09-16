<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SoDe\Extend\Crypto;
use SoDe\Extend\Response;
use SoDe\Extend\Trace;

class CourseController extends BasicController
{
    public $model = Products::class;

    public function setPaginationInstance(string $model)
    {
        return $model::where('status', true);
    }

    public function assign(Request $request)
    {
        $response = Response::simpleTryCatch(function (Response $response) use ($request) {
            $user = User::select('users.*')
                ->join('model_has_roles AS mhr', 'mhr.model_id', 'users.id')
                ->where('mhr.role_id', 3)
                ->where('users.id', $request->user_id)
                ->first();

            if (!$user) throw new Exception('El usuario no existe o no es un estudiante');

            $courses = Products::whereIn('id', $request->courses)->get();
            if ($courses->count() == 0) throw new Exception('Escoge al menos un curso para asignar');

            $sale = new Sale();
            $sale->code = 'auto-' . Trace::getId(false) . '-' . Crypto::short();
            $sale->name = $user->name;
            $sale->lastname = $user->lastname ?? '';
            $sale->email = $user->email;
            $sale->phone = $user->phone ?? '';
            $sale->address_price = 0;
            $sale->total = 0;
            $sale->status_id = 3;
            $sale->status_message = 'Asignado';
            $sale->tipo_comprobante = 'Asignacion';
            $sale->save();

            $total_price = 0;

            foreach ($courses as $course) {
                $final_price = $course->descuento > 0 ? $course->descuento : $course->precio;
                $total_price += $final_price;

                $detail = new SaleDetail();
                $detail->sale_id = $sale->id;
                $detail->product_image = $course->imagen;
                $detail->product_name = $course->producto;
                $detail->quantity = 1;
                $detail->price = $final_price;
                $detail->user_id = $user->id;
                $detail->product_id = $course->id;
                $detail->save();
            }

            $sale->total = $total_price;
            $sale->save();

            $consumer = User::select([
                DB::raw('DISTINCT(users.id)'),
                'users.*'
            ])
                ->with([
                    'courses',
                    // 'certificates'
                ])
                ->join('model_has_roles AS mhr', 'mhr.model_id', 'users.id')
                ->where('mhr.role_id', 3)
                ->where('users.id', $request->user_id)
                ->first();

            return $consumer;
        });
        return response($response->toArray(), $response->status);
    }
}
