<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\mae_discounts;

class DiscountController extends Controller
{
    public function GetDiscounts()
    {
        return mae_discounts::all();
    }

    public function PostDiscounts(Request $request)
    {
        $user=\Auth::user();
       
        $discount=mae_discounts::create([
            'discounts_porcentaje' => $request['discounts_porcentaje'],
            'discounts_start_date' => $request['discounts_start_date'],
            'discounts_end_date' => $request['discounts_end_date'],
            'user_id' => $user->id,
            'discounts_stock_max' => $request['discounts_stock_max']

        ]);

        if ($discount==true) {
            return [ "status" => "success", "message" => "Descuento creado con Exito"];
        }else{
            return [ "status" => "error", "message" => "Error al Registrar el descuento"];
        }
    }
    
}
