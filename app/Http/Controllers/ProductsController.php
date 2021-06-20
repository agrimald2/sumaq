<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tbl_products;
use App\mae_category;
use App\mae_materials;
use App\mae_collections;

class ProductsController extends Controller
{
    public function GetProducts()
    {        
        return  \DB::table('tbl_products')
                    ->select('tbl_products.*', 'mae_collections.*','mae_materials.*', 'mae_categories.*', 'mae_discounts.*')
                    ->join('mae_collections','mae_collections.collections_id', '=', 'tbl_products.collections_id')
                    ->join('mae_materials','mae_materials.materials_id', '=', 'tbl_products.material_id')
                    ->join('mae_categories','mae_categories.categories_id', '=', 'tbl_products.category_id')
                    ->join('mae_discounts','mae_discounts.discounts_id', '=', 'tbl_products.discounts_id')
                    ->get();
    }

    public function PostProducts(Request $request)
    {
        $products= tbl_products::create([

            'products_name' => $request['products_name'],
            'collections_id' => $request['collections_id'],
            'category_id' => $request['category_id'],
            'material_id' => $request['materials_id'],
            'products_caracts' => $request['products_caracts'],
            'products_size' => $request['products_size'],
            'products_price' => $request['products_price'],
            'products_net_price' => $request['products_net_price'],
            'discounts_id' => $request['discounts_id'],
            'products_is_active'=> $request['products_is_active'],

        ]);


        if ($products) {
            return ['success'=>'Producto Registrado'];
        }
    }

    public function GenerateQR($id)
    {
        $product = tbl_products::where('products_id', $id)->get();
        return view('generate_QR.product_qr', compact('product'));
    }
}
