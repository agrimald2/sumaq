<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\mae_collections;

class CollectionsController extends Controller
{
    public function GetCollections()
    {
        return mae_collections::all();
    }

    public function PostCollections(Request $request){

       $images = $request->file('collections_image_url');
       
        $colletion=mae_collections::create([
            'collections_name'=>$request['collections_name'],
        ]);
        $cont = 0;
        foreach($images as $img){

            $custom_name = 'colletion-'.$colletion->collections_id.'-'.Str::uuid()->toString().'.'.$img->getClientOriginalExtension();
            if  ($cont === 0){
                $colletion->collections_image_url = $custom_name;
            }else{
                break;
            }
            $img->move(public_path().'/img_collection',$custom_name);
            $colletion->update();
            $cont++;
        }

        if ($colletion==true) {
            return [ "status" => "success", "message" => "Categoria Creada con Exito"];
        }else{
            return [ "status" => "error", "message" => "Error al Registrar la Categoria"];
        }
    }
}
