<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\mae_sucursals;

class SucursalController extends Controller
{
    public function GetSucursals()
    {
        return mae_sucursals::all();
    }

    public function PostSucursals(Request $request)
    {
        
        $category=mae_sucursals::create([
            'sucursals_name' => $request['sucursals_name'],
            'sucursals_address' => $request['sucursals_address'],
            'sucursals_is_active' => $request['sucursals_is_active']
        ]);

        return ['status'=>'success'];

    }
}
