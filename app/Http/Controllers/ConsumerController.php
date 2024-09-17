<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class ConsumerController extends BasicController
{
    public $model = User::class;
    public $reactView = 'Admin/Consumers';

    public function setPaginationInstance(string $model)
    {
        return $model::select([
            'users.*',
        ])
            ->with([
                'courses',
                // 'certificates'
            ])
            // ->groupBy('users.id', 'users.name')
            ->join('model_has_roles AS mhr', 'mhr.model_id', 'users.id')
            ->where('mhr.role_id', 3);
    }
}
