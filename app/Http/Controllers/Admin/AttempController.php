<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BasicController;
use App\Models\Attemp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SoDe\Extend\Response;

class AttempController extends BasicController
{
    public $model = Attemp::class;

    public function assign(Request $request)
    {
        $response = Response::simpleTryCatch(function ($response) use ($request) {
            foreach ($request->courses as $courseId) {
                Attemp::updateOrCreate([
                    'course_id' => $courseId,
                    'user_id' => $request->user_id,
                    'evaluation_id' => null
                ],[
                    'finished' => true,
                    'course_id' => $courseId,
                    'user_id' => $request->user_id,
                    'questions' => 10,
                    'score' => 10
                ]);
            }
            $consumer = User::select([
                DB::raw('DISTINCT(users.id)'),
                'users.*'
            ])
                ->with([
                    'courses',
                    'certificates'
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
