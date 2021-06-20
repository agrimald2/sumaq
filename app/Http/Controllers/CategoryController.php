<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\mae_category;

class CategoryController extends Controller
{
    public function GetCategories()
    {
        return mae_category::all();
    }

    public function PostCategories(Request $request){

       $images = $request->file('categories_image_url');
       
        $category=mae_category::create([
            'categories_name'=>$request['categories_name'],
        ]);
        $cont = 0;
        foreach($images as $img){

            $custom_name = 'category-'.$category->categories_id.'-'.Str::uuid()->toString().'.'.$img->getClientOriginalExtension();
            if  ($cont === 0){
                $category->categories_image_url = $custom_name;
            }else{
                break;
            }
            $img->move(public_path().'/img_category',$custom_name);
            $category->update();
            $cont++;
        }

        if ($category==true) {
            return [ "status" => "success", "message" => "Categoria Creada con Exito"];
        }else{
            return [ "status" => "error", "message" => "Error al Registrar la Categoria"];
        }
    }
}
