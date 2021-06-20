<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_products;
use App\mae_providers;
use App\tbl_purchase_orders;
use App\purchase_order_details;
use Carbon\Carbon;

class ControllerPurchase_Orders extends Controller
{
    public function SearchProducto($products_name)
    {
        return tbl_products::where('products_name', 'LIKE', '%'.$products_name.'%')->get();
    }

    public function SearchProveedor($providers_name)
    {
        return mae_providers::where('providers_name', 'LIKE', '%'.$providers_name.'%')->get();
    }

    public function CreateListOrder(Request $request)
    {
        $data_order= $request->data_order_details;
        $purchase_orders=tbl_purchase_orders::create([
            'purchase_orders_solicited_by'=> $request['purchase_orders_solicited_by'],
            'purchase_orders_solicited_date'=> Carbon::parse($request['purchase_orders_solicited_date'])->format('d-m-Y'),
            'providers_id'=> $request['providers_id'],
            'preview_arrival_date'=> Carbon::parse($request['preview_arrival_date'])->format('d-m-Y'),
            'purchase_orders_confirmed_by'=> $request['purchase_orders_confirmed_by'],
            'purchase_orders_received_by'=> $request['purchase_orders_received_by'],
            'purchase_orders_observation'=> $request['purchase_orders_observation'],
            'purchase_orders_is_ok'=> $request['purchase_orders_is_ok'],
            'purchase_orders_complain'=> $request['purchase_orders_complain'],
            'purchase_orders_total_price'=> $request['purchase_orders_total_price'],
        ]);

        foreach($data_order as $data){ 
            $purchase_order_details=purchase_order_details::create([
                'purchase_orders_id'=>$purchase_orders->purchase_orders_id,
                'products_id'=>$data->products_id,
                'total_products'=> $data->total_products,
                'total_price'=>$data->products_price*$data->total_products,
            ]);
        }
        

        if ($purchase_orders==true && $purchase_order_details==true) {
            return ['status'=>'success', 'message'=>'Orden Registrada Exitosamente'];
        }else{
            return ['status'=>'error', 'message'=>'error al registrar la orden'];
        }
    }
}
